import unittest
from selenium import webdriver
from selenium.webdriver.chrome.service import Service as ChromeService
from selenium.webdriver.chrome.options import Options
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
stop_words.add("visita")

# Inicializar el clasificador de transformers para análisis de sentimiento
classifier = pipeline("sentiment-analysis", model="nlptown/bert-base-multilingual-uncased-sentiment")

def iniciar_driver():
    """Inicializa el controlador de Selenium con Chrome en modo headless."""
    chrome_options = Options()
    chrome_options.add_argument("--headless")
    chrome_options.add_argument("--no-sandbox")
    chrome_options.add_argument("--disable-dev-shm-usage")
    driver = webdriver.Chrome(service=ChromeService('C:/chromedriver.exe'), options=chrome_options)
    return driver

def limpiar_texto(texto):
    """Limpia un texto eliminando URLs, caracteres especiales y stopwords en español."""
    texto = re.sub(r'http\S+', '', texto)
    texto = re.sub(r'[^A-Za-záéíóúñÁÉÍÓÚÑ\s]', '', texto)
    texto = texto.lower()
    palabras = texto.split()
    palabras = [palabra for palabra in palabras if palabra not in stop_words]
    return ' '.join(palabras)

def extraer_opiniones(url):
    """Extrae opiniones de un foro especificado por la URL."""
    driver = iniciar_driver()
    driver.get(url)
    time.sleep(5)
    opiniones = []
    bloques = driver.find_elements("css selector", 'blockquote.messageText.SelectQuoteContainer.ugc.baseHtml')
    for bloque in bloques:
        opinion = bloque.text.strip()
        if opinion:
            opiniones.append(opinion)
    driver.quit()
    return opiniones

def analizar_sentimiento_transformers(opinion):
    """Analiza el sentimiento de una opinión usando un modelo de Transformers."""
    resultado = classifier(opinion)[0]
    if '5' in resultado['label'] or '4' in resultado['label']:
        return 'Positivo'
    elif '3' in resultado['label']:
        return 'Neutro'
    elif '2' in resultado['label'] or '1' in resultado['label']:
        return 'Negativo'
    else:
        return 'Neutro'

def conectar_db():
    """Establece la conexión a la base de datos MySQL."""
    return mysql.connector.connect(
        host="bg5hkgpf7xqkv4sukieo-mysql.services.clever-cloud.com",
        user="ufmob2qfxcjv2h7y",  
        password="CrvkjMmwSBlHCmaspRKy",  
        database="bg5hkgpf7xqkv4sukieo" 
    )

def generar_cod_noticia():
    """Genera un nuevo código de noticia."""
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

def guardar_en_db(opiniones, sentimientos):
    """Guarda las opiniones y sus sentimientos en la base de datos."""
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

class TestFunciones(unittest.TestCase):
    """Clase de pruebas unitarias para funciones del script."""

    def test_limpiar_texto(self):
        """Prueba de limpieza de texto."""
        texto = "Hola, esto es un test! Visita https://example.com."
        resultado = limpiar_texto(texto)
        self.assertEqual(resultado, "hola test")

    def test_analizar_sentimiento_transformers(self):
        """Prueba de análisis de sentimiento."""
        opinion = "Me encanta este producto, es muy bueno."
        sentimiento = analizar_sentimiento_transformers(opinion)
        self.assertIn(sentimiento, ["Positivo", "Neutro", "Negativo"])

    def test_generar_cod_noticia(self):
        """Prueba de generación de código de noticia."""
        cod_noticia = generar_cod_noticia()
        self.assertTrue(cod_noticia.startswith("CodMedio"))

    def test_conectar_db(self):
        """Prueba de conexión a la base de datos."""
        conn = conectar_db()
        self.assertIsNotNone(conn)
        conn.close()

if __name__ == "__main__":
    # Ejecutar pruebas
    suite = unittest.TestLoader().loadTestsFromTestCase(TestFunciones)
    runner = unittest.TextTestRunner(verbosity=2)
    runner.run(suite)
