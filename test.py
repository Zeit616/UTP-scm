from selenium import webdriver
from selenium.webdriver.edge.service import Service as EdgeService
from selenium.webdriver.edge.options import Options
import re
import time
import nltk
from nltk.corpus import stopwords
from transformers import pipeline
import mysql.connector
from datetime import datetime

# Descargar stopwords la primera vez
nltk.download('stopwords')
stop_words = set(stopwords.words('spanish'))

# Inicializar el clasificador de transformers para análisis de sentimiento
classifier = pipeline("sentiment-analysis", model="nlptown/bert-base-multilingual-uncased-sentiment")

# Configuración de Selenium para usar Microsoft Edge
def iniciar_driver():
    edge_options = Options()
    edge_options.add_argument("--headless")
    edge_options.add_argument("--no-sandbox")
    edge_options.add_argument("--disable-dev-shm-usage")
    
    driver = webdriver.Edge(service=EdgeService('C:/msedgedriver.exe'), options=edge_options)
    return driver

# Función para limpiar el texto
def limpiar_texto(texto):
    texto = re.sub(r'http\S+', '', texto)
    texto = re.sub(r'[^A-Za-záéíóúñÁÉÍÓÚÑ\s]', '', texto)
    texto = texto.lower()
    palabras = texto.split()
    palabras = [palabra for palabra in palabras if palabra not in stop_words]
    return ' '.join(palabras)

# Función para extraer opiniones de la página
def extraer_opiniones(url):
    driver = iniciar_driver()
    driver.get(url)
    time.sleep(5)

    opiniones = []
    bloques = driver.find_elements("css selector", 'blockquote.messageText.SelectQuoteContainer.ugc.baseHtml')

    for bloque in bloques:
        opinion = bloque.text.strip()  
        if opinion:  
            opiniones.append(opinion)
            #print(opinion) 
    
    driver.quit()
    return opiniones

# Función para analizar el sentimiento con transformers
def analizar_sentimiento_transformers(opinion):
    resultado = classifier(opinion)[0]
    if '5' in resultado['label'] or '4' in resultado['label']:
        return 'Positivo'
    elif '3' in resultado['label']:
        return 'Neutro'
    elif '2' in resultado['label'] or '1' in resultado['label']:
        return 'Negativo'
    else:
        return 'Neutro'

# Conexión a la base de datos
def conectar_db():
    return mysql.connector.connect(
        host="localhost",
        user="root",  
        password="",  
        database="scm"  
    )

# Generar código de noticia
def generar_cod_noticia():
    conn = conectar_db()
    cursor = conn.cursor()
    
    cursor.execute("SELECT CodPerteneciente, CodAlmacenado FROM contenedordecodigos WHERE CodPerteneciente = 'CodMedio'")
    resultado = cursor.fetchone()
    CodPerteneciente, CodAlmacenado = resultado[0], int(resultado[1])
    nuevo_cod_almacenado = CodAlmacenado + 1
    CodMedio = CodPerteneciente + str(nuevo_cod_almacenado)
    
    cursor.execute("UPDATE contenedordecodigos SET CodAlmacenado = %s WHERE CodPerteneciente = 'CodMedio'", (nuevo_cod_almacenado,))
    conn.commit()
    
    cursor.close()
    conn.close()
    
    return CodMedio

# Guardar cada registro en la tabla MySQL
def guardar_en_db(opiniones, sentimientos):
    conn = conectar_db()
    cursor = conn.cursor()
    fecha_actual = datetime.now().strftime('%Y-%m-%d')

    for opinion, sentimiento in zip(opiniones, sentimientos):
        cod_noticia = generar_cod_noticia()
        query = """
            INSERT INTO noticia (CodNoticia, FechaNoticia, Medio, Espacio, Impacto)
            VALUES (%s, %s, %s, %s, %s)
        """
        valores = (cod_noticia, fecha_actual, 'Foros', opinion, sentimiento)
        cursor.execute(query, valores)
    
    conn.commit()
    cursor.close()
    conn.close()
    #print("Opiniones guardadas en la base de datos.")

# URL del foro
url = "https://www.forosperu.net/temas/que-opinan-de-la-utp.1421819/"

# Extraer opiniones
opiniones = extraer_opiniones(url)

# Limpiar las opiniones
opiniones_limpias = [limpiar_texto(opinion) for opinion in opiniones]

# Analizar el sentimiento de cada opinión usando transformers
sentimientos = [analizar_sentimiento_transformers(opinion) for opinion in opiniones_limpias]

# Guardar en base de datos
guardar_en_db(opiniones, sentimientos)
