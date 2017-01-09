# docker_appointments

This installs Appointments web app

To **build** the image :

  * sudo docker build -t lcbruit/appointments_install:v1.2 .
  
To **run** the docker container :
 
  * sudo docker run -v /share:/share -itd -p 81:80 lcbruit/appointments_install:v1.2
  
To **connect** to container :

  * sudo docker ps -a
  * sudo docker exec -i -t [CONTAINER ID] /bin/bash
  
To complete install

  * http://XXXXXXXXXXXXXX.xuhl-tr.nhs.uk/appointments
