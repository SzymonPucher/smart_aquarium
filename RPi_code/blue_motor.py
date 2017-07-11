import RPi.GPIO as GPIO
import time
GPIO.setmode(GPIO.BCM)

def change_temp(temp):
  '''
  range 2-11
  temp 20-30
  
  '''
  print('Changing temperature ... ')
  GPIO.setup(23,GPIO.OUT)
  temp = temp + 18
  temp = temp - 50
  temp = temp * -1
  pwm = GPIO.PWM(23,40)
  time.sleep(0.1)
  pwm.start(temp)
  time.sleep(5)

  GPIO.setup(23,GPIO.IN)


