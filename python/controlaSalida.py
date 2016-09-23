# Modules.
import RPi.GPIO as GPIO
import time
import datetime
import _mysql
import sys
import os
import MySQLdb

salidaValor = 0
#Prepara la conexion a la base de datos


#Configura el pin de salida
GPIO.setmode(GPIO.BOARD)
outRegadera = 13
GPIO.setup(outRegadera, GPIO.OUT)

def obtieneEstado():
    global salidaValor
    DB_Location = 'localhost'
    DB_User = 'root'
    DB_Pass = '12345'
    DB_Name = 'regabot'
    DB_con = None
    db = MySQLdb.connect(DB_Location,DB_User,DB_Pass,DB_Name )
    cursor = db.cursor()
    sql = "SELECT * FROM salidas WHERE id = 1"
    cursor.execute(sql)
    results = cursor.fetchall()
    for row in results:
        salidaValor = row[2]
    db.close()


try:
    while 1:
        obtieneEstado()
        GPIO.output(outRegadera, salidaValor)
        print "Regadera "+str(salidaValor)
        time.sleep(1)

except (KeyboardInterrupt, SystemExit): #when you press ctrl+c
    print "\n"
    print "Shutting Down Service"
