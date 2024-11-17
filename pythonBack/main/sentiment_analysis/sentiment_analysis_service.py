from flask import Flask, request, jsonify
from transformers import pipeline

app = Flask(__name__)

classifier = pipeline("sentiment-analysis", model="nlptown/bert-base-multilingual-uncased-sentiment")

@app.route('/analizar_sentimiento', methods=['POST'])
def analizar_sentimiento():
    opinion = request.json.get('opinion')
    resultado = classifier(opinion)[0]
    
    if '5' in resultado['label'] or '4' in resultado['label']:
        sentimiento = 'Positivo'
    elif '3' in resultado['label']:
        sentimiento = 'Neutro'
    elif '2' in resultado['label'] or '1' in resultado['label']:
        sentimiento = 'Negativo'
    else:
        sentimiento = 'Neutro'
    
    return jsonify({"sentimiento": sentimiento})

if __name__ == '__main__':
    app.run(port=5003)