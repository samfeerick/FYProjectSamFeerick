#!/usr/bin/env python
# -*- coding: utf-8 -*-

import time  #import the real time
from pyfingerprint.pyfingerprint import PyFingerprint
import mysql.connector as mariadb  #connect the mysql database
from datetime import datetime



## Tries to initialize the sensor
try:
    f = PyFingerprint('/dev/ttyUSB0', 57600, 0xFFFFFFFF, 0x00000000)
    mariadb_connection = mariadb.connect(user='root', password='root', database='attendancesystem')
    cursor = mariadb_connection.cursor()

    if ( f.verifyPassword() == False ):
        raise ValueError('The given fingerprint sensor password is wrong!')   #wrong password entered

except Exception as e:
    print('The fingerprint sensor could not be initialized!')  #error message
    print('Exception message: ' + str(e))
    exit(1)

## Gets some sensor information
print('Currently used templates: ' + str(f.getTemplateCount()) +'/'+ str(f.getStorageCapacity())) #how many templates are used

try:
    var = raw_input("Please enter your name:")      #enter employees name
    print('Waiting for finger...')           

    
    while ( f.readImage() == False ):        #place finger on sensor
        pass

    ## Converts read image to characteristics and stores it in charbuffer 1
    f.convertImage(0x01)

    ## Checks if finger is already enrolled
    result = f.searchTemplate()
    positionNumber = result[0]

    if ( positionNumber >= 0 ):
        print('Template already exists at position #' + str(positionNumber))   #person already registered on the database
        exit(0)

    print('Remove finger...')
    time.sleep(2)

    print('Waiting for same finger again...')

    ## Wait that finger is read again
    while ( f.readImage() == False ):
        pass

    ## Converts read image to characteristics and stores it in charbuffer 2
    f.convertImage(0x02)

    ## Compares the charbuffers
    if ( f.compareCharacteristics() == 0 ):
        raise Exception('Fingers do not match')

    ## Creates a template
    f.createTemplate()

    ## Saves template at new position number
    positionNumber = f.storeTemplate()
    print('Finger enrolled successfully!')
    now = datetime.now()
    formatted_date = now.strftime('%Y-%m-%d %H:%M:%S')
    cursor.execute('insert into record_table(Name, TimeStamp) values(%s, %s)', (var, formatted_date))
    mariadb_connection.commit()

    print('DB record added!')

    print('New template position #' + str(positionNumber))

except Exception as e:
    print('Operation failed!')
    print('Exception message: ' + str(e))
    exit(1)
