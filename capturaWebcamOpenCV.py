#!/usr/opt/anaconda3/bin/env python
import cv2 as cv
import time as tm
from datetime import datetime
import pytz
from requests import (post, get)

URL = "http://127.0.0.1/TI-ProjFase1/upload.php"

def datahora():
    my_date = datetime.now(pytz.timezone('Europe/London'))
    h = my_date.strftime("%Y/%d/%m %H:%M:%S")
    return h

def send_to_api( arr ):
    r = post('http://127.0.0.1/TI-ProjFase1/api/api.php', data = arr)
    if r.status_code == 200:
        print("Ok: POST realizado com sucesso")
        print(r.status_code)
    else:
        print("Erro: Não foi possível realizar o pedido")
        print(r.status_code)

def send_file():
    r = post(URL, files={'imagem': ('webcam.jpg',
             open('webcam.jpg', 'rb'), 'image/jpg')})
    print(r.status_code, "--", r.text)

try:
    while True:
        r = get('http://127.0.0.1/TI-ProjFase1/api/api.php?nome=webcam')
        if r.status_code == 200:
            if float(r.text) == 1.0:
                cap = cv.VideoCapture(0)
                tm.sleep(5)
                ret, frame = cap.read()
                cv.imwrite('webcam.jpg', frame)
                cap.release()
                send_file()
                array = {'nome': 'webcam' , 'valor': 0, 'hora': datahora()}
                send_to_api(array)
                print("\nFoto tirada, a desligar camera...")
            else:
                print("Aceda à dashboard para tirar foto...")
        else:
            print("Erro na comunicação com a API")
        tm.sleep(5)
except:
    print("Error")

