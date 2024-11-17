from flask import Flask, request, jsonify
import re
import nltk
from nltk.corpus import stopwords

nltk.download('stopwords')
stop_words = set(stopwords.words('spanish'))

app = Flask(__name__)

@app.route('/limpiar_texto', methods=['POST'])
def limpiar_texto():
    texto = request.json.get('texto')
    texto = re.sub(r'http\S+', '', texto)
    texto = re.sub(r'[^A-Za-záéíóúñÁÉÍÓÚÑ\s]', '', texto)
    texto = texto.lower()
    palabras = texto.split()
    palabras = [palabra for palabra in palabras if palabra not in stop_words]
    texto_limpio = ' '.join(palabras)
    
    return jsonify({"texto_limpio": texto_limpio})

if __name__ == '__main__':
    app.run(port=5002)