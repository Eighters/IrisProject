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
apt-get update
```

Clone th Git Repository
```sh
$ cd /var/www
$ git clone https://github.com/Eighters/IrisProject
```
Launch the install script (with root or sudo)
```sh
$ bash /var/www/IrisProject/bin/system/install.sh
```

