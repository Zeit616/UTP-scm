from flask import Flask, request, jsonify
from selenium import webdriver
from selenium.webdriver.chrome.service import Service as ChromeService
from selenium.webdriver.chrome.options import Options
import time

app = Flask(__name__)

def iniciar_driver():
    chrome_options = Options()
    chrome_options.add_argument("--headless")
    chrome_options.add_argument("--no-sandbox")
    chrome_options.add_argument("--disable-dev-shm-usage")
    
    driver = webdriver.Chrome(service=ChromeService('C:/chromedriver.exe'), options=chrome_options)
    return driver

@app.route('/extraer_opiniones', methods=['POST'])
def extraer_opiniones():
    url = request.json.get('url')
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
    return jsonify({"opiniones": opiniones})

if __name__ == '__main__':
    app.run(port=5001)