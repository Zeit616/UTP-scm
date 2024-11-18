from flask import Flask, request, jsonify
from selenium import webdriver
from selenium.webdriver.chrome.service import Service as ChromeService
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.common.by import By
import time

app = Flask(__name__)

def iniciar_driver():
    chrome_options = Options()
    chrome_options.add_argument("--headless")
    chrome_options.add_argument("--no-sandbox")
    chrome_options.add_argument("--disable-dev-shm-usage")
    
    driver = webdriver.Chrome(service=ChromeService('C:/chromedriver.exe'), options=chrome_options)
    return driver

def extraer_opiniones_pagina(driver):
    """Extrae opiniones de una sola página."""
    opiniones = []
    bloques = driver.find_elements(By.CSS_SELECTOR, 'blockquote.messageText.SelectQuoteContainer.ugc.baseHtml')
    for bloque in bloques:
        opinion = bloque.text.strip()
        if opinion:
            opiniones.append(opinion)
    return opiniones

@app.route('/extraer_opiniones', methods=['POST'])
def extraer_opiniones():
    url = request.json.get('url')
    driver = iniciar_driver()
    driver.get(url)
    time.sleep(5)

    opiniones_totales = []
    while True:
        # Extrae opiniones de la página actual
        opiniones = extraer_opiniones_pagina(driver)
        opiniones_totales.extend(opiniones)

        # Verifica si hay un botón de "siguiente" y haz clic para avanzar a la siguiente página
        try:
            next_button = driver.find_element(By.CSS_SELECTOR, '.PageNav a.PageNavNext')
            next_button.click()
            time.sleep(5)  # Espera a que la nueva página cargue
        except:
            # Si no encuentra el botón, está en la última página
            break

    driver.quit()
    return jsonify({"opiniones": opiniones_totales})

if __name__ == '__main__':
    app.run(port=5001)
