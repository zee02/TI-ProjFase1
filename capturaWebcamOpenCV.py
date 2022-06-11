import cv2 as cv
import time as tm
from requests import (post, get)
URL = "http://127.0.0.1/TI-ProjFase1/upload.php"


def send_file():
    r = post(URL, files={'imagem': ('webcam.jpg',
             open('webcam.jpg', 'rb'), 'image/jpg')})
    print(r.status_code, "--", r.text)

r = get('http://127.0.0.1/TI-ProjFase1/api/api.php?nome=temperatura')

try:
    while True:
        if r.status_code == 200:
            if float(r.text) > 20.00:
                cap = cv.VideoCapture(0)
                tm.sleep(5)
                ret, frame = cap.read()
                cv.imwrite('webcam.jpg', frame)
                cap.release()
                send_file()
            else:
                print("Temperatura abaixo de 20")
        else:
            print("Erro na comunicação com a API")
        tm.sleep(5)
except:
    print("Error")
