from flask import Flask, request, jsonify
import re
import unicodedata
import nltk
from nltk.corpus import stopwords
from nltk.stem.snowball import SnowballStemmer

# Descargar recursos necesarios
nltk.download('stopwords')

# Configuración inicial
app = Flask(__name__)
stop_words = set(stopwords.words('spanish'))
stemmer = SnowballStemmer('spanish')

def limpiar_y_procesar_texto(texto, eliminar_tildes=True, aplicar_stemming=False):
    """
    Limpia y procesa un texto dado.
    :param texto: Texto a procesar.
    :param eliminar_tildes: Si se deben eliminar tildes del texto.
    :param aplicar_stemming: Si se debe aplicar stemming.
    :return: Texto limpio y procesado.
    """
    # Eliminar URLs, menciones y hashtags
    texto = re.sub(r'http\S+', '', texto)  # URLs
    texto = re.sub(r'@\w+', '', texto)    # Menciones
    texto = re.sub(r'#\w+', '', texto)    # Hashtags
    
    # Eliminar caracteres no alfabéticos
    texto = re.sub(r'[^A-Za-záéíóúñÁÉÍÓÚÑ\s]', '', texto)
    
    # Convertir a minúsculas
    texto = texto.lower()
    
    # Normalización opcional (eliminar tildes)
    if eliminar_tildes:
        texto = unicodedata.normalize('NFD', texto)
        texto = ''.join(c for c in texto if unicodedata.category(c) != 'Mn')
    
    # Dividir en palabras
    palabras = texto.split()
    
    # Eliminar stopwords
    palabras = [palabra for palabra in palabras if palabra not in stop_words]
    
    # Aplicar stemming si es necesario
    if aplicar_stemming:
        palabras = [stemmer.stem(palabra) for palabra in palabras]
    
    # Unir palabras procesadas
    texto_procesado = ' '.join(palabras)
    return texto_procesado

@app.route('/limpiar_texto', methods=['POST'])
def limpiar_texto():
    data = request.json
    texto = data.get('texto', '')
    eliminar_tildes = data.get('eliminar_tildes', True)
    aplicar_stemming = data.get('aplicar_stemming', False)
    
    if not texto:
        return jsonify({"error": "El texto no puede estar vacío"}), 400
    
    texto_limpio = limpiar_y_procesar_texto(texto, eliminar_tildes, aplicar_stemming)
    return jsonify({"texto_limpio": texto_limpio})

if __name__ == '__main__':
    app.run(port=5002)
