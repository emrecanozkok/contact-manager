

## About Project

This project made for managing contacts and its informations


I used docker-compose with laravel 9 in this project. However, of course, php 8.1 accompanies us.


After cloning the project to our computer, we must run the following commands.
```
docker-compose up -d
docker-compose exec app bash 
```
In container shell follow commands below
```
cp .env.example .env
composer install
php artisan migrate:refresh --seed

```
Command+c to exit container shell and run 
```
curl --request GET --url http://localhost:9000/heartbeat
```

To look working containers you can run

```
docker-compose ps
```

To run tests
```
docker-compose exec app bash 
./vendor/bin/phpunit
OR
php artisan test 
```

```
mrcnzkk/php8.1_laravel_runner:latest
```

is my image, you can build it locally in .docker folder
