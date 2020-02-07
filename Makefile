include .env
export

env:
	docker build -t php7.1-img .

run:
	docker run -d --name php-con -v ${PATH_REPO}:/root -p 8080:8080 php7.1-img:latest

reset:
	docker stop php-con && docker rm php-con

inside:
	docker exec -it php-con bash
