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

scale_percent = 100
width = int(frame.shape[1] * scale_percent / 100)
height = int(frame.shape[0] * scale_percent / 100)
dim = (width, height)
resized_frame = cv2.resize(frame, dim, interpolation=cv2.INTER_AREA)

# Cria um nome de arquivo com base na data e hora atual
current_time = datetime.datetime.now().strftime("%Y%m%d_%H%M%S")
filename = f"../images/camImages/webcam_{current_time}.jpg"

cv2.imwrite(filename, resized_frame, [cv2.IMWRITE_JPEG_QUALITY, 90])

data = {"nome": "webcam", "hora": current_time, "valor": "0"}

url = "http://127.0.0.1/TI-ProjFase1/api/api.php"

response = requests.post(url, data=data)
if response.status_code == 200:
    print("Dados enviados com sucesso!")
else:
    print(f"Erro ao enviar os dados. Código de resposta: {response.status_code}")

cap.release()
cv2.destroyAllWindows()
