from flask import Flask, request, jsonify
import mysql.connector
from datetime import datetime

app = Flask(__name__)

def conectar_db():
    return mysql.connector.connect(
        host="bg5hkgpf7xqkv4sukieo-mysql.services.clever-cloud.com",
        user="ufmob2qfxcjv2h7y",  
        password="CrvkjMmwSBlHCmaspRKy",  
        database="bg5hkgpf7xqkv4sukieo"
    )

def generar_cod_noticia():
    conn = conectar_db()
    cursor = conn.cursor()
    cursor.execute("SELECT CodPerteneciente, CodAlmacenado FROM contenedordecodigos WHERE CodPerteneciente = 'CodMedio'")
    resultado = cursor.fetchone()
    CodPerteneciente, CodAlmacenado = resultado[0], int(resultado[1])
    nuevo_cod_almacenado = CodAlmacenado + 1
    CodMedio = CodPerteneciente + str(nuevo_cod_almacenado)
    
    cursor.execute("UPDATE contenedordecodigos SET CodAlmacenado = %s WHERE CodPerteneciente = 'CodMedio'", (nuevo_cod_almacenado,))
    conn.commit()
    cursor.close()
    conn.close()
    
    return CodMedio

@app.route('/guardar_en_db', methods=['POST'])
def guardar_en_db():
    data = request.json
    opiniones = data.get('opiniones')
    sentimientos = data.get('sentimientos')
    fecha_actual = datetime.now().strftime('%Y-%m-%d')

    conn = conectar_db()
    cursor = conn.cursor()

    for opinion, sentimiento in zip(opiniones, sentimientos):
        cod_noticia = generar_cod_noticia()
        query = """
            INSERT INTO noticia (CodNoticia, FechaNoticia, Medio, Espacio, Impacto)
            VALUES (%s, %s, %s, %s, %s)
        """
        valores = (cod_noticia, fecha_actual, 'Foros', opinion, sentimiento)
        cursor.execute(query, valores)
    
    conn.commit()
    cursor.close()
    conn.close()

    return jsonify({"message": "Datos guardados correctamente"})

if __name__ == '__main__':
    app.run(port=5004)