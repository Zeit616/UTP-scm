import requests

# URLs de los microservicios
scraping_url = "http://localhost:5001/extraer_opiniones"
text_processing_url = "http://localhost:5002/limpiar_texto"
sentiment_analysis_url = "http://localhost:5003/analizar_sentimiento"
db_service_url = "http://localhost:5004/guardar_en_db"

# Lista de URLs de foros
urls = [
    "https://www.forosperu.net/temas/denuncian-que-gloria-y-nestle-estafan-a-ganaderos-en-cajamarca-les-pagan-s-0-80-por-litro-de-leche.1099068/",
    "https://www.forosperu.net/temas/grupo-gloria-acepta-que-su-producto-pura-vida-no-es-leche-ha-estafado-a-millones-de-consumidores.1097098/",
    "https://www.forosperu.net/temas/pura-vida-dueno-de-gloria-llora-y-pide-que-dejen-donar-leche-a-ninos-pobre.1119506/",
    "https://www.forosperu.net/temas/grupo-gloria-reconoce-que-vendera-en-eeuu-leche-pura-de-vaca-y-en-peru-no.1356513/",
    "https://www.forosperu.net/temas/aspec-gloria-y-nestle-no-deben-vender-en-peru-sus-productos-como-leche-ev.1097447/"
]
#url de prueba
#urls = [
#    "https://www.forosperu.net/temas/aspec-gloria-y-nestle-no-deben-vender-en-peru-sus-productos-como-leche-ev.1097447/"
#]

# Recorrer cada URL para extraer, limpiar, analizar y guardar las opiniones
for url in urls:
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

print("Proceso completado para todas las URLs.")
