from selenium import webdriver
from selenium.webdriver.chrome.service import Service as ChromeService
from selenium.webdriver.chrome.options import Options
import re
import time
import nltk
from nltk.corpus import stopwords
from transformers import pipeline
import sqlite3
from datetime import datetime

# Descargar stopwords (solo la primera vez)
nltk.download('stopwords')
stop_words = set(stopwords.words('spanish'))

# Inicializar el clasificador de transformers para análisis de sentimiento
classifier = pipeline("sentiment-analysis", model="nlptown/bert-base-multilingual-uncased-sentiment")

# Configuración de Selenium para usar Google Chrome en modo headless
def iniciar_driver():
    chrome_options = Options()
    chrome_options.add_argument("--headless")
    chrome_options.add_argument("--no-sandbox")
    chrome_options.add_argument("--disable-dev-shm-usage")
    
    driver = webdriver.Chrome(service=ChromeService('C:/chromedriver.exe'), options=chrome_options)
    return driver

# Función de prueba para simular la extracción de opiniones
def extraer_opiniones_simuladas():
    return [
        "La universidad tiene un buen enfoque en tecnología.",
        "No me gusta mucho la organización.",
        "Los profesores son excelentes, pero las instalaciones podrían mejorar.",
        "Es cara para lo que ofrece.",
        "Buena educación, pero falta más apoyo al estudiante."
    ]

# Función para limpiar el texto
def limpiar_texto(texto):
    texto = re.sub(r'http\S+', '', texto)
    texto = re.sub(r'[^A-Za-záéíóúñÁÉÍÓÚÑ\s]', '', texto)
    texto = texto.lower()
    palabras = texto.split()
    palabras = [palabra for palabra in palabras if palabra not in stop_words]
    return ' '.join(palabras)

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

# Conexión a una base de datos de prueba en memoria
def conectar_db_prueba():
    conn = sqlite3.connect(":memory:")  # Base de datos en memoria
    cursor = conn.cursor()
    cursor.execute("""
        CREATE TABLE IF NOT EXISTS noticia (
            CodNoticia TEXT,
            FechaNoticia TEXT,
            Medio TEXT,
            Espacio TEXT,
            Impacto TEXT
        )
    """)
    conn.commit()
    return conn

# Generar código de noticia de prueba
def generar_cod_noticia_prueba():
    # Genera un código de noticia ficticio
    return "CodPrueba123"

# Guardar cada registro en la base de datos de prueba
def guardar_en_db_prueba(opiniones, sentimientos):
    conn = conectar_db_prueba()
    cursor = conn.cursor()
    fecha_actual = datetime.now().strftime('%Y-%m-%d')

    for opinion, sentimiento in zip(opiniones, sentimientos):
        cod_noticia = generar_cod_noticia_prueba()
        query = """
            INSERT INTO noticia (CodNoticia, FechaNoticia, Medio, Espacio, Impacto)
            VALUES (?, ?, ?, ?, ?)
        """
        valores = (cod_noticia, fecha_actual, 'Foros', opinion, sentimiento)
        cursor.execute(query, valores)
    
    conn.commit()

    # Recuperar y retornar resultados para verificación
    cursor.execute("SELECT * FROM noticia")
    resultados = cursor.fetchall()
    cursor.close()
    conn.close()
    
    return resultados

# Extraer opiniones simuladas
opiniones = extraer_opiniones_simuladas()

# Limpiar las opiniones
opiniones_limpias = [limpiar_texto(opinion) for opinion in opiniones]

# Analizar el sentimiento de cada opinión usando transformers
sentimientos = [analizar_sentimiento_transformers(opinion) for opinion in opiniones_limpias]

# Guardar en la base de datos de prueba y recuperar resultados
resultados = guardar_en_db_prueba(opiniones, sentimientos)

# Mostrar los resultados de la prueba
for resultado in resultados:
    print(resultado)
