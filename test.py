from selenium import webdriver
from selenium.webdriver.edge.service import Service as EdgeService
from selenium.webdriver.edge.options import Options
import pandas as pd
import time
import re
import nltk
from nltk.corpus import stopwords
from transformers import pipeline  # Importamos el pipeline de Hugging Face

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
    # Eliminar URLs
    texto = re.sub(r'http\S+', '', texto)
    # Eliminar caracteres especiales y números
    texto = re.sub(r'[^A-Za-záéíóúñÁÉÍÓÚÑ\s]', '', texto)
    # Convertir a minúsculas
    texto = texto.lower()
    # Eliminar stopwords
    palabras = texto.split()
    palabras = [palabra for palabra in palabras if palabra not in stop_words]
    return ' '.join(palabras)

# Función para extraer opiniones de la página
def extraer_opiniones(url):
    driver = iniciar_driver()
    driver.get(url)
    
    time.sleep(5)  # Esperar a que la página cargue

    # Extraer todas las opiniones
    opiniones = []
    bloques = driver.find_elements("css selector", 'blockquote.messageText.SelectQuoteContainer.ugc.baseHtml')

    for bloque in bloques:
        opinion = bloque.text.strip()  
        if opinion:  
            opiniones.append(opinion)
            print(opinion) 
    
    driver.quit()
    return opiniones

# Función para analizar el sentimiento con transformers
def analizar_sentimiento_transformers(opinion):
    # Usamos el clasificador para predecir el sentimiento
    resultado = classifier(opinion)[0]
    # Hugging Face devuelve etiquetas como '1 estrella', '5 estrellas', etc.
    if '5' in resultado['label']:
        return 'Muy Positivo'
    elif '4' in resultado['label']:
        return 'Positivo'
    elif '1' in resultado['label']:
        return 'Muy Negativo'
    else:
        return 'Neutro'

# Guardar los resultados en un archivo CSV
def guardar_en_csv(opiniones, sentimientos, archivo):
    df = pd.DataFrame({
        'Opinion': opiniones,
        'Sentimiento': sentimientos
    })
    df.to_csv(archivo, index=False)
    print(f"Archivo CSV guardado como {archivo}")

# URL del foro
url = "https://www.forosperu.net/temas/que-opinan-de-la-utp.1421819/"

# Extraer opiniones
opiniones = extraer_opiniones(url)

# Limpiar las opiniones
opiniones_limpias = [limpiar_texto(opinion) for opinion in opiniones]

# Analizar el sentimiento de cada opinión usando transformers
sentimientos = [analizar_sentimiento_transformers(opinion) for opinion in opiniones_limpias]

# Guardar en CSV
guardar_en_csv(opiniones, sentimientos, 'opiniones_utp_transformers.csv')
