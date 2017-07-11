import RPi.GPIO as GPIO
import time

from Buzzer import buzzer

def sensor():
  
  GPIO.setmode(GPIO.BCM)

  TRIG = 25
  ECHO = 24

  GPIO.setup(TRIG,GPIO.OUT)
  GPIO.setup(ECHO,GPIO.IN)
  
  GPIO.output(TRIG,False)
  time.sleep(2)

  GPIO.output(TRIG,True)
  time.sleep(0.00001)
  GPIO.output(TRIG, False)
  startTime = time.time()
  pulse_start = 0
  pulse_end = 0
  while GPIO.input(ECHO)==0:
    pulse_start = time.time()
    if time.time() - startTime > 5:
      break
      
  while GPIO.input(ECHO)==1:
    pulse_end = time.time()
    if time.time() - startTime > 5:
      break

  distance = (pulse_end - pulse_start) * 17150
  distance = round(distance,2)
  print('Distance from ultrasonic sensor: ', distance, ' cm')
  if distance < 10 and distance > 0:
    buzzer()
