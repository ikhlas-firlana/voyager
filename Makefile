include .env
export

env:
	docker build --no-cache --build-arg userenv=${USER}  -t php-env .
	# docker build --no-cache --build-arg userenv=${USER} --build-arg groupenv=${GROUP} -t php-env .

run:
	docker run -d --name php-con -v ${PATH_REPO}:/usr/app -p 8080:8080 php-env:latest

reset:
	docker stop php-con && docker rm php-con

in:
	docker exec -it php-con bash

clear:
	docker system prune

# prepare
# php composer.phar create-project --prefer-dist laravel/laravel aplication "5.8.*"