from selenium import webdriver
from selenium.webdriver.edge.service import Service as EdgeService
from selenium.webdriver.edge.options import Options
from textblob import TextBlob
import pandas as pd
import time

# Configuración de Selenium para usar Microsoft Edge
def iniciar_driver():
    edge_options = Options()
    edge_options.add_argument("--headless") 
    edge_options.add_argument("--no-sandbox")
    edge_options.add_argument("--disable-dev-shm-usage")
    
    driver = webdriver.Edge(service=EdgeService('C:/msedgedriver.exe'), options=edge_options)
    return driver

# Función para extraer opiniones de la página
def extraer_opiniones(url):
    driver = iniciar_driver()
    driver.get(url)
    
    time.sleep(5) 

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

# Función para analizar el sentimiento de una opinión
def analizar_sentimiento(opinion):
    blob = TextBlob(opinion)
    polaridad = blob.sentiment.polarity  # Valor de -1 (negativo) a 1 (positivo) (falta mejorar el rango de sensibilidad)
    if polaridad > 0:
        return 'Positivo'
    elif polaridad < 0:
        return 'Negativo'
    else:
        return 'Neutral'

# Guardar los resultados en un archivo CSV
def guardar_en_csv(opiniones, sentimientos, archivo):
    df = pd.DataFrame({
        'Opinion': opiniones,
        'Sentimiento': sentimientos
    })
    df.to_csv(archivo, index=False)
    print(f"Archivo CSV guardado como {archivo}")

# URL del foro
url = "https://www.forosperu.net/temas/que-tal-es-la-utp-en-psicologia-organizacional.1382857/"

# Extraer opiniones
opiniones = extraer_opiniones(url)

# Analizar el sentimiento de cada opinión
sentimientos = [analizar_sentimiento(opinion) for opinion in opiniones]

# Guardar en CSV
guardar_en_csv(opiniones, sentimientos, 'opiniones_utp_psicologia.csv')
