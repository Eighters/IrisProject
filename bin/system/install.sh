#!/bin/sh
# To get the latest package lists
sudo apt-get update

#Install Dependencies
echo "Install sudo"
sudo apt-get install sudo -y

echo "Install make"
/bin/bash -l -c "apt-get install make -y"

echo ''
echo '---------------------------------------'
echo ''

echo "Install Git"
/bin/bash -l -c "apt-get install git -y"

echo ''
echo '---------------------------------------'
echo ''

echo "Install curl"
/bin/bash -l -c "apt-get install curl -y"

echo ''
echo '---------------------------------------'
echo ''

#Install NGINX
echo "Install NGINX"
/bin/bash -l -c "apt-get install nginx -y"
/bin/bash -l -c "ufw allow 'Nginx HTTP'"

echo ''
echo '---------------------------------------'
echo ''


#Clone Git Project
echo "Clone Git Project"
/bin/bash -l -c "cd /var/www/ && git clone https://github.com/Eighters/IrisProject"

echo ''
echo '---------------------------------------'
echo ''

echo "Copy Nginx config"
#Copy and replace the default config file for Nginx
/bin/bash -l -c "cp /var/www/IrisProject/bin/system/nginx_config /etc/nginx/sites-available/default"

echo ''
echo '---------------------------------------'
echo ''

#Allow changes on NGINX
echo "Reload Nginx config"
/bin/bash -l -c "nginx -t"
/bin/bash -l -c "systemctl reload nginx"

echo ''
echo '---------------------------------------'
echo ''

#Check IP
/bin/bash -l -c "ip addr show eth0 | grep inet | awk '{ print $2; }' | sed 's/\/.*$//'"

echo ''
echo '---------------------------------------'
echo ''


#Install and secure MYSQL
echo "Install & Secure MYSQL"
/bin/bash -l -c "apt-get install mysql-server -y"
/bin/bash -l -c "mysql_secure_installation"

echo ''
echo '---------------------------------------'
echo ''


#Install PHP7 + PHP7-FPM + PHP7 dependencies
echo "Install PHP 7.1 & dependencies"
/bin/bash -l -c "apt-get install apt-transport-https lsb-release ca-certificates -y"


/bin/bash -l -c "wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg"
echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list

/bin/bash -l -c "apt update"
/bin/bash -l -c "apt-get update"

/bin/bash -l -c "apt install --no-install-recommends php7.1 php7.1-fpm php7.1-mysql php7.1-curl php7.1-json php7.1-gd php7.1-mcrypt php7.1-msgpack php7.1-memcached php7.1-intl php7.1-sqlite3 php7.1-gmp php7.1-geoip php7.1-mbstring php7.1-redis php7.1-xml php7.1-zip -y"

echo ''
echo '---------------------------------------'
echo ''

chown -R iris:iris /var/www/IrisProject/

echo ''
echo '---------------------------------------'
echo ''



echo "OK MAMENE !"
