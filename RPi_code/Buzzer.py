'''
import RPi.GPIO as GPIO
import time
b = 15
GPIO.setmode(GPIO.BOARD)
GPIO.setup(b, GPIO.OUT)

GPIO.output(b,GPIO.HIGH)
print('on')
time.sleep(5)
GPIO.output(b,GPIO.LOW)
print('off')
'''
import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)

def buzz():
  GPIO.setup(12, GPIO.OUT)

  p = GPIO.PWM(12, 2000)  # channel=12 frequency=2000Hz

  p.start(0)
  k = 900
  startTime = time.time()
  while startTime + 1 > time.time():
      if(k < 1000):
          for dc in range(0, 101, 5):
              p.ChangeDutyCycle(dc)
              time.sleep(0.1)
          for dc in range(100, -1, -5):
              p.ChangeDutyCycle(dc)
              time.sleep(0.1)

  p.stop()
  GPIO.setup(12, GPIO.IN)

