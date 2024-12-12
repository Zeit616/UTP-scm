from flask import Flask, request, jsonify
from transformers import AutoTokenizer, AutoModelForSequenceClassification, pipeline

app = Flask(__name__)

# Configuración del modelo
model_name = "pysentimiento/robertuito-sentiment-analysis"
tokenizer = AutoTokenizer.from_pretrained(model_name)
model = AutoModelForSequenceClassification.from_pretrained(model_name)

# Crear el pipeline de análisis
classifier = pipeline("sentiment-analysis", model=model, tokenizer=tokenizer)

def preprocesar_texto(texto):
    # Limpieza básica del texto
    import re
    texto = re.sub(r'[^\w\s]', '', texto)  # Eliminar caracteres especiales
    texto = texto.lower()  # Convertir a minúsculas
    return texto

@app.route('/analizar_sentimiento', methods=['POST'])
def analizar_sentimiento():
    # Extraer y procesar la opinión
    opinion = request.json.get('opinion', '')
    if not opinion:
        return jsonify({"error": "La opinión no puede estar vacía"}), 400

    opinion_preprocesada = preprocesar_texto(opinion)

    # Análisis de sentimiento
    resultado = classifier(opinion_preprocesada)[0]
    
    # Mapear etiquetas a términos más comprensibles
    etiqueta = resultado['label']
    sentimiento = {
        "POS": "Positivo",
        "NEG": "Negativo",
        "NEU": "Neutral"
    }.get(etiqueta, "Indeterminado")

    return jsonify({
        "opinion": opinion,
        "sentimiento": sentimiento,
        "confianza": resultado['score']
    })

if __name__ == '__main__':
    app.run(port=5003)
