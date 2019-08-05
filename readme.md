

FEATURES:

    Read temp 1-wire sensors from DS18b20 over GPIO4
    Read temp 1-wire sensors from DS18b20 over DS2482 (I2C)
    Read humidity DHT11, DHT22 over GPIO
    Read servers temperature over SNMP
    Read value from BMP180, TSL2561, HTU21D, HIH6130, TMP102, MPL3115A2 over I2C - thanks to ro-an nad kamami.pl
    Read temperatures form lm-sensors
    Read internal temperature from Raspberry Pi, Banana Pi
    View charts with temeratures and humidity
    Send mail notofication when temperature is to high or to low, You can set value.
    Set gpio on/off, gpio temperature on/off, gpio time on/off
    You can connect APC UPS over USB and recieve notification form UPS
    OpenVPN server. User + Pass + CRT
    Radius server 802.1x EAP TLS
    Firewall function
    System stats


Debian, RaspberryPi:

	download and run like root, script will install all requirements like php, www.
	
	sudo apt-get update
	sudo apt-get -y install git
	
	mkdir -p /var/www/nettemp && cd /var/www
	git clone https://github.com/filippawinski/nettemp
	cd nettemp && ./install_nettemp




