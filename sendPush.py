"""Funcion para enviar pushNotifications Android"""
import urllib.parse
import urllib.request
import json
import sys
MY_API_KEY = "AQUÍ VA LA LLAVE QUE OBTIENES AL MOMENTO DE SACAR LA CUENTA EN FIREBASE"
MTITLE = sys.argv[1]
MBODY = sys.argv[2]
DATA = {
    "to":"/topics/MyEvents",
    "notification":{
        "body":MBODY,
        "title":MTITLE
    }
}
DATAASJSON = json.dumps(DATA)
LIGA = 'https://gcm-http.googleapis.com/gcm/send'
AUTH = {
    "Authorization":"key="+MY_API_KEY,
    "Content-type":"application/json"
    }
AUTHENCODE = urllib.parse.urlencode(AUTH)
AUTHENCODE = AUTHENCODE.encode('ascii')
DATAENCODE = urllib.parse.urlencode(DATA)
DATAENCODE = DATAENCODE.encode('ascii')
DATAENCODE = DATAASJSON.encode('ascii')
REQ = urllib.request.Request(LIGA, DATAENCODE, AUTH)
try:
    urllib.request.urlopen(REQ)
    print(urllib.request.urlopen(REQ).read())
except urllib.error.HTTPError as err:
    print("Errores HTTP")
    print(err.code)
    print(err.reason)
except urllib.error.URLError as urlerror:
    print("Errorres URL")
    print(urlerror.reason)
