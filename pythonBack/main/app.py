import time
import requests

# URLs de los microservicios
scraping_url = "http://localhost:5001/extraer_opiniones"
text_processing_url = "http://localhost:5002/limpiar_texto"
sentiment_analysis_url = "http://localhost:5003/analizar_sentimiento"
db_service_url = "http://localhost:5004/guardar_en_db"

# Lista inicial de URLs
urls = [
    "https://www.forosperu.net/temas/denuncian-que-gloria-y-nestle-estafan-a-ganaderos-en-cajamarca-les-pagan-s-0-80-por-litro-de-leche.1099068/",
    "https://www.forosperu.net/temas/grupo-gloria-acepta-que-su-producto-pura-vida-no-es-leche-ha-estafado-a-millones-de-consumidores.1097098/"
]

# Proceso en bucle infinito
while True:
    for url in urls:
        try:
            # Extraer opiniones
            response = requests.post(scraping_url, json={"url": url})
            opiniones = response.json().get("opiniones", [])

            # Limpiar opiniones
            opiniones_limpias = []
            for opinion in opiniones:
                response = requests.post(text_processing_url, json={"texto": opinion})
                opiniones_limpias.append(response.json().get("texto_limpio", ""))

            # Analizar sentimiento
            sentimientos = []
            for opinion in opiniones_limpias:
                response = requests.post(sentiment_analysis_url, json={"opinion": opinion})
                sentimientos.append(response.json().get("sentimiento", ""))

            # Guardar en base de datos
            requests.post(db_service_url, json={"opiniones": opiniones, "sentimientos": sentimientos})

            print(f"Procesamiento completado para: {url}")
        except Exception as e:
            print(f"Error procesando la URL {url}: {e}")

    #print("Esperando 60 segundos antes de la próxima iteración...")
    time.sleep(60)  # Esperar 60 segundos antes de repetir
