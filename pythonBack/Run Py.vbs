Set objShell = CreateObject("WScript.Shell")

' Ejecutar el primer script
objShell.Run "cmd /c python C:\xampp\htdocs\UTP-scm\pythonBack\main\db_service\db_service.py", 0, False

' Ejecutar el segundo script
objShell.Run "cmd /c python C:\xampp\htdocs\UTP-scm\pythonBack\main\scrapping\scraping_service.py", 0, False

' Ejecutar el tercer script (corregido)
objShell.Run "cmd /c python C:\xampp\htdocs\UTP-scm\pythonBack\main\sentiment_analysis\sentiment_analysis_service.py", 0, False

' Ejecutar el cuarto script
objShell.Run "cmd /c python C:\xampp\htdocs\UTP-scm\pythonBack\main\text_processing\text_processing_service.py", 0, False

' Ejecutar el quinto script
objShell.Run "cmd /c python C:\xampp\htdocs\UTP-scm\pythonBack\main\app.py", 0, False
