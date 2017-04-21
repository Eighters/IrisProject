#Install & launch Composer
echo "Run Project"
/bin/bash -l -c cd /var/www/IrisProject && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
/bin/bash -l -c cd /var/www/IrisProject && php -r "if (hash_file('SHA384', 'composer-setup.php') === '669656bab3166a7aff8a7506b8cb2d1c292f042046c5a994c43155c0be6190fa0355160742ab2e1c88d40d5be660b410') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"

/bin/bash -l -c cd /var/www/IrisProject && php composer-setup.php
/bin/bash -l -c cd /var/www/IrisProject && php -r "unlink('composer-setup.php');"

/bin/bash -l -c cd /var/www/IrisProject && php composer.phar install

/bin/bash -l -c cd /var/www/IrisProject && php bin/console cache:clear --env=prod

/bin/bash -l -c cd /var/www/IrisProject && php bin/console doctrine:database:create

/bin/bash -l -c cd /var/www/IrisProject && php bin/console doctrine:schema:update --dump-sql

/bin/bash -l -c cd /var/www/IrisProject && php bin/console doctrine:schema:update --force

chmod 777 -R /var/www/IrisProject/var/cache/
chmod 777 -R /var/www/IrisProject/var/logs/