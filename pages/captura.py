import cv2
import requests
import datetime

cap = cv2.VideoCapture(0)
ret, frame = cap.read()

if not ret:
    print("Erro ao capturar a foto.")
    cap.release()
    cv2.destroyAllWindows()
    exit()

cv2.imwrite("../images/webcam.jpg", frame)

current_time = datetime.datetime.now().strftime("%Y/%m/%d %H:%M")
data = {"nome": "webcam", "hora": current_time, "valor": "0"}

url = "http://127.0.0.1/TI-ProjFase1/api/api.php"

response = requests.post(url, data=data)
if response.status_code == 200:
    print("Dados enviados com sucesso!")
else:
    print(f"Erro ao enviar os dados. Código de resposta: {response.status_code}")

cap.release()
cv2.destroyAllWindows()
