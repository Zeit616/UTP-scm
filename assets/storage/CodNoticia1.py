import speech_recognition as sr

def transcribe_audio_with_sphinx(audio_file_path):
    # Crear un reconocedor de voz
    recognizer = sr.Recognizer()

    # Cargar el archivo de audio
    with sr.AudioFile(audio_file_path) as source:
        # Leer el audio del archivo
        audio_data = recognizer.record(source)

        try:
            # Mostrar mensaje de inicio
            print("Transcripción en progreso...")

            # Utilizar Sphinx para transcribir el audio a texto
            text = recognizer.recognize_sphinx(audio_data)

            # Mostrar mensaje de finalización
            print("Transcripción completada.")
            
            return text
        except sr.UnknownValueError:
            # Mostrar mensaje si no se pudo entender el audio
            print("No se pudo entender el audio.")
            return ""
        except sr.RequestError as e:
            # Mostrar mensaje de error al obtener resultados
            print(f"Error al obtener resultados; {e}")
            return ""

# Ruta del archivo de audio que deseas transcribir
audio_file_path = 'audio2.wav'

# Llamar a la función para obtener el texto transcrit
transcribed_text = transcribe_audio_with_sphinx(audio_file_path)

# Imprimir el texto transcrit
print(transcribed_text)
