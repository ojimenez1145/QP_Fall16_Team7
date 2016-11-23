import RPi.GPIO as GPIO
import time

buttonPin = 15

def setup():
        ''' One time set up configurations'''
        GPIO.setmode(GPIO.BOARD)       # Numbers GPIOs by physical location
        GPIO.setup(buttonPin, GPIO.IN)

def loop():
  db = connectMonog()
  buttons = db.button
  
  entry_num_button = buttons.count()+1;
  
  while True:
    button = GPIO.input(buttonPin)
    
    if button == 0 and state == 0:
      state = 1
    if button == 1 and state == 1:
      buttton_dict = {'test': 1145, 'val': button}
      buttons.insert_one(button_dict)
      entry_num_button += 1;
      state = 0     

def connectMong():
  connection = pymongo.MongoClient(""mongodb://admin:admin@ds019746.mlab.com:19746/qpfallteam7)
  db = connection.qpfallteam7
  return db

def destroy():
        GPIO.output(LedPin, GPIO.HIGH)     # led off
        GPIO.cleanup()                     # Release resource

if __name__ == '__main__':     # Program start from here
        setup()
        try:
                loop()
        except KeyboardInterrupt:  # When 'Ctrl+C' is pressed, the child program destroy() will be  executed.
                destroy()
