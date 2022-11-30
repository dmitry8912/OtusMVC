Simple PHP MVC microframework example

Startup sequence:

First of all - run it

```
docker-compose up --build -d
```
Remember, that docker-compose can be run by
```
docker-compose
```
or
```
docker compose
```
depends on your system

Next, locate the php-fpm containter
```
docker ps | grep php-fpm
```
Basically, name of the container is
```
otusmvc-php-fpm-1
```

Install composer dependencies
```
docker exec -it otusmvc-php-fpm-1 bash
# cd /var/www/app
# composer insall
```
or single command
```
docker exec -it otusmvc-php-fpm-1 bash -c "cd /var/www/app && composer install"
```

Update yout hosts file

Linux:
```
vim /etc/hosts
127.0.0.1   otus.mvc
```
Windows
```
C:\Windows\System32\drivers\etc\hosts
127.0.0.1   otus.mvc
```

At that point you are ready to use! Open http://otus.mvc:8080/ and see the web page!
