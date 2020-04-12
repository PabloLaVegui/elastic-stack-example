# Elastic Stack Example 

## Run PHP sample App with Docker

Run services
```
docker-compose up -d
```

Install dependencies

```
docker run --rm -it -v $PWD/app/php:/app composer install
```

Run app
```
docker run -it --rm --name elastic-stack-example \
  --network container:elasticsearch \
  -v "$PWD"/app/php:/usr/src/myapp \
  -w /usr/src/myapp php:7.4-cli php app.php -a info -b warning
```
