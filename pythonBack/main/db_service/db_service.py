from flask import Flask, request, jsonify
import mysql.connector
import requests  # Para realizar solicitudes HTTP al microservicio
from datetime import datetime

app = Flask(__name__)

# Función para conectar a la base de datos
def conectar_db():
    return mysql.connector.connect(
        host="bg5hkgpf7xqkv4sukieo-mysql.services.clever-cloud.com",
        user="ufmob2qfxcjv2h7y",  
        password="CrvkjMmwSBlHCmaspRKy",  
        database="bg5hkgpf7xqkv4sukieo"
    )

# Generar código único para la noticia
def generar_cod_noticia(cursor):
    cursor.execute("SELECT CodPerteneciente, CodAlmacenado FROM contenedordecodigos WHERE CodPerteneciente = 'CodMedio'")
    resultado = cursor.fetchone()
    CodPerteneciente, CodAlmacenado = resultado[0], int(resultado[1])
    nuevo_cod_almacenado = CodAlmacenado + 1
    CodMedio = CodPerteneciente + str(nuevo_cod_almacenado)
    
    cursor.execute("UPDATE contenedordecodigos SET CodAlmacenado = %s WHERE CodPerteneciente = 'CodMedio'", (nuevo_cod_almacenado,))
    return CodMedio

# Función para analizar el sentimiento usando el microservicio
def analizar_sentimiento(opinion):
    url = "http://localhost:5003/analizar_sentimiento"  # URL del microservicio
    try:
        response = requests.post(url, json={"opinion": opinion})
        response.raise_for_status()  # Lanza una excepción si la respuesta no es 200
        return response.json().get("sentimiento")
    except requests.exceptions.RequestException as e:
        raise Exception(f"Error al comunicarse con el microservicio: {str(e)}")

@app.route('/guardar_en_db', methods=['POST'])
def guardar_en_db():
    data = request.json
    opiniones = data.get('opiniones', [])
    fecha_actual = datetime.now().strftime('%Y-%m-%d')

    # Conectar a la base de datos
    conn = conectar_db()
    cursor = conn.cursor()

    try:
        for opinion in opiniones:
            sentimiento = analizar_sentimiento(opinion)  # Llama al microservicio para analizar el sentimiento
            cod_noticia = generar_cod_noticia(cursor)
            query = """
                INSERT INTO noticia (CodNoticia, FechaNoticia, Medio, Espacio, Impacto)
                VALUES (%s, %s, %s, %s, %s)
            """
            valores = (cod_noticia, fecha_actual, 'Digital', opinion, sentimiento)
            cursor.execute(query, valores)

        # Commit después de todas las inserciones
        conn.commit()
        return jsonify({"message": "Datos guardados correctamente"})
    except Exception as e:
        conn.rollback()  # Deshacer cambios en caso de error
        return jsonify({"error": str(e)}), 500
    finally:
        # Cerrar la conexión de forma segura
        cursor.close()
        conn.close()

if __name__ == '__main__':
    app.run(port=5004)
