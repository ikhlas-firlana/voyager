include .env
export

env:
	docker build --no-cache --build-arg userenv=${USER}  -t php-env .
	# docker build --no-cache --build-arg userenv=${USER} --build-arg groupenv=${GROUP} -t php-env .

run:
	docker run -d --name php-con --network host -v ${PATH_REPO}:/usr/app php-env:latest

reset:
	docker stop php-con && docker rm php-con

in:
	docker exec -it php-con bash

clear:
	docker system prune

artisan:
	php artisan serve --port 8080 --host 0.0.0.0

# prepare
# php composer.phar create-project --prefer-dist laravel/laravel aplication "5.8.*"