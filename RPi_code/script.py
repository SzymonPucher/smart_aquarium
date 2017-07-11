#!/usr/bin/python
# Import required libraries
import sys
import urllib.request
import time
import RPi.GPIO as GPIO
import datetime

from Server_data import get_config
from Ultrasonic_sensor import sensor
from stepper_motor import feed
from blue_motor import change_temp
from Buzzer import buzzer

GPIO.setmode(GPIO.BCM)


def feeding_interval(feed_interval, last_feeding_time):
  if time.time() - last_feeding_time > feed_interval * 60:
    feed()
    last_feeding_time = time.time()
  return feed_interval, last_feeding_time

  
def isDay():
  hour = int(time.strftime("%H"))
  print('Hour: ', hour)
  if hour > 8 or hour < 20:
    return 1
  else:
    return 0
  

def main():
  GPIO.setwarnings(False)
  params = get_config()
  last_feeding_time = time.time()

  if isDay():
    change_temp(params[0])
  else:
    change_temp(params[1])

  last_is_day = isDay()  
  
  while 1:
    data = get_config()
    
    if data[0] != params[0] and isDay():
      change_temp(data[0])

    if data[1] != params[1] and isDay() == 0:
      change_temp(data[1])
    
    if data[3] > params[3]:
      while data[3] - params[3]:
        feed()
        params[3] = params[3] + 1
    
    params = data
    
    params[2], last_feeding_time = feeding_interval(params[2],last_feeding_time)

    if last_is_day != isDay():
      if isDay():
        change_temp(data[0])

      if isDay() == 0:
        change_temp(data[1])
      last_is_day = isDay()
    
    sensor()
   
    time.sleep(0.1)


main()
GPIO.cleanup()
