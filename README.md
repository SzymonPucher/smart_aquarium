# Smart Aquarium
  A small project done with my friend at Wrocław University of Science and Technology.
  
## Goal of the project.
Creating a system automatically takes care of your aquarium controlled using a smartphone. User defines temperature and time of feeding  via Android application which send the data to Raspberry Pi board that monitors and changes parameters of the aquarium.

### Using this application you will be able to:
See and control temperature of water in the aquarium with different temperature for day and night.
Set time intervals in which fishes will be fed.
Feed fishes instantly.
Scare a cat trying to get into aquarium.

## My contribution to project.

Building the device attached to aquarium, writing code for sensors and actuators and test client on server, for development purposes.
Only my contribution to project is published in this repository. (My friend wrote mobile application and adjusted server code.)

### Raspberry Pi side of the project:
In order to build device connected to aquarium, I collected the hardware, bought Raspberry Pi 3 B and electric water heater. Here the first problem appeared. I wanted to an electric heater that is just on and off, but those aren’t sold. Only ones on the market are with thermostat, which holds set temperature. So I figured out how to control temperature using stepper motor instead of on/off functionality based on current temperature of water.
    For changing the temperature I used special motor (Tower SG90 Servo) which based on the amount of the current going into it, changes to different angle. Thanks to that we don’t need to know current position to which the stepper motor is at, we are giving it only temperature we want to set our heater to and it changes thermostat to a position at angle that represents temperature sent by user. 
    Feeding the fishes on hardware side was done by using stepper motor (28BYJ-48 with L293D driver) which rotates container 360 degrees in 15 seconds which allows small amount fish food to drop into aquarium each time it rotates. The prototype of container is done from cottage cheese container, which modification was inspired by other devices for feeding fishes which pictures were found on internet. The refilling of the container is done by taking of the lid of.
    Stepper motor 28BYJ-48 works very different to Tower SG90 Servo used for temperature changing. This one uses 8-phase sequence of inputs from Raspberry Pi in order to rotate, and needs information about current position to set different one relative current one.
    Ultrasonic sensor and buzzer are used to scare cats from disturbing fishes in the aquarium. If cat tries to get into the aquarium (distance from the sensor will decrease), the cat scare beeper will go off, getting the cat away from the aquarium.
    All components work at the same time, getting configuration from the file on the server, which is modified via mobile application. It is done by infinite loop that downloads configuration from the server and then performs series of operations to apply changes into device components.
    
### Raspberry Pi side of the project:
In order to build device connected to aquarium, I collected the hardware, bought Raspberry Pi 3 B and electric water heater. Here the first problem appeared. I wanted to an electric heater that is just on and off, but those aren’t sold. Only ones on the market are with thermostat, which holds set temperature. So I figured out how to control temperature using stepper motor instead of on/off functionality based on current temperature of water.
    For changing the temperature I used special motor (Tower SG90 Servo) which based on the amount of the current going into it, changes to different angle. Thanks to that we don’t need to know current position to which the stepper motor is at, we are giving it only temperature we want to set our heater to and it changes thermostat to a position at angle that represents temperature sent by user. 
    Feeding the fishes on hardware side was done by using stepper motor (28BYJ-48 with L293D driver) which rotates container 360 degrees in 15 seconds which allows small amount fish food to drop into aquarium each time it rotates. The prototype of container is done from cottage cheese container, which modification was inspired by other devices for feeding fishes which pictures were found on internet. The refilling of the container is done by taking of the lid of.
    Stepper motor 28BYJ-48 works very different to Tower SG90 Servo used for temperature changing. This one uses 8-phase sequence of inputs from Raspberry Pi in order to rotate, and needs information about current position to set different one relative current one.
    Ultrasonic sensor and buzzer are used to scare cats from disturbing fishes in the aquarium. If cat tries to get into the aquarium (distance from the sensor will decrease), the cat scare beeper will go off, getting the cat away from the aquarium.
    All components work at the same time, getting configuration from the file on the server, which is modified via mobile application. It is done by infinite loop that downloads configuration from the server and then performs series of operations to apply changes into device components.
    
    ### Server side of the project
    Server handles one configuration of the Raspberry Pi and components connected to it. The most important part of the server is the configuration file which is accessed and changed by mobile application and Raspberry Pi. All communication between devices is done with this file. 
    Client written in php was created only for to test connection between server and Raspberry Pi, and used until mobile appliation (Android) was created.
    Server side was later adjusted by Baris to work with his mobile application.

## Authors
* **Szymon Pucher** - *Initial work* - https://github.com/SzymonPucher
* **Baris Durgun** - *His work is not included in this repository*

