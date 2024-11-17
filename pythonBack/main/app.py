import requests

# URL de los microservicios
scraping_url = "http://localhost:5001/extraer_opiniones"
text_processing_url = "http://localhost:5002/limpiar_texto"
sentiment_analysis_url = "http://localhost:5003/analizar_sentimiento"
db_service_url = "http://localhost:5004/guardar_en_db"

# URL del foro
url = "https://www.forosperu.net/temas/que-opinan-de-la-utp.1421819/"

# Extraer opiniones
response = requests.post(scraping_url, json={"url": url})
opiniones = response.json().get("opiniones")

# Limpiar opiniones
opiniones_limpias = []
for opinion in opiniones:
    response = requests.post(text_processing_url, json={"texto": opinion})
    opiniones_limpias.append(response.json().get("texto_limpio"))

# Analizar sentimiento
sentimientos = []
for opinion in opiniones_limpias:
    response = requests.post(sentiment_analysis_url, json={"opinion": opinion})
    sentimientos.append(response.json().get("sentimiento"))

# Guardar en base de datos
requests.post(db_service_url, json={"opiniones": opiniones, "sentimientos": sentimientos})