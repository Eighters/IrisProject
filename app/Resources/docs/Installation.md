### Installation

Use the good sources
```sh
$ nano /etc/apt/sources.list

deb http://deb.debian.org/debian jessie main
deb-src http://deb.debian.org/debian jessie main

deb http://deb.debian.org/debian jessie-updates main
deb-src http://deb.debian.org/debian jessie-updates main

deb http://security.debian.org/ jessie/updates main
deb-src http://security.debian.org/ jessie/updates main
```
Update sources
```sh
apt-get update`
```

Clone th Git Repository
```sh
$ cd /var/www
$ git clone https://github.com/Eighters/IrisProject
```
Run the install script (with root or sudo)
```sh
$ bash /var/www/IrisProject/bin/system/install.sh
```
Set good rights & Change directory
```sh
$ sudo chown -R user:user /var/www/IrisProject

$ cd /var/www/IrisProject/
```
For production environement change the Twig base_url by your own IP server
```sh
$ nano /var/www/IrisProject/app/config/config.yml
at line 'base_url : http://127.0.0.1:8000'
```
For production :
```sh
$ nano /var/www/IrisProject/web/app.php

Change the line 9
$kernel = new AppKernel('prod', false);
Turn "false" in "true"
```

Run composer script (Download, install vendor, init doctrine migration)
```sh
$ bash composer.sh


$ sudo chmod 777 -R /var/www/IrisProject/var/cache/
$ sudo chmod 777 -R /var/www/IrisProject/var/logs/
$ sudo chmod 777 -R /var/www/IrisProject/var/sessions/
```
