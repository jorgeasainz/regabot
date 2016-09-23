# regabot
A robot to automate your shower

Using an electromagnetic water valve, a raspberry PI controls a shower faucet, by a time frame or a web application's button.
It works over the wifi network.

What you need on your RaspberryPi:
- raspbian.
- LAMPP (Apache/PHP/MySQL)
- python
- RPi.GPIO

The hardware:
- Raspberry Pi B Rev 2 https://www.raspberrypi.org/
- 12V Solenoid Valve - 3/4" https://www.sparkfun.com/products/10456
- Opto22 DC60S3 Solid state relay http://www.opto22.com/site/pr_details.aspx?cid=4&item=DC60S3
- WIPI wireless Lan Module http://www.newark.com/element14/wipi/wlan-module-for-the-raspberry/dp/07W8938
- 12V 1A power source.
- 5V .5A USB power source for the RBP
- 

Instructions:
1.- Set up raspbian
2.- Connect your rpi to the network.
3.- Install RPi.GPIO
4.- Install Apache / PHP / mySQL
5.- Clone into /opt/var/htdocs

Setup cron job for timer.php (mine is set every 5 minutes)

Now, to install the python script add the following line to /etc/local.rc
sudo python /opt/var/htdocs/python/controlSalida.py &

install the database located at 
/opt/var/htdocs/mysql/regabot.sql

Enjoy!

Let me know what you think:
@jorgeasainz
jorgeasainz.xyz

Regards!


