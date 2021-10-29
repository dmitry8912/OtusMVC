Это пример простого PHP MVC микрофреймворка

Перед тем, как запускать docker-compose установите зависимости!
```
cd framework

docker run --rm --interactive --tty \
  --volume $PWD:/app \
  composer install
```

Также, укажите в hosts запись
```
127.0.0.1   otus.mvc
```
