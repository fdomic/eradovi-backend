rsync -avzhr --progress * root@e-radovi.com:/var/www/e-radovi
ssh root@e-radovi.com chown -R www-e-radovi:www-data /var/www/e-radovi
ssh root@e-radovi.com chmod -R 775 /var/www/e-radovi