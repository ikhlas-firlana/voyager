FROM php:7.1.33-cli

WORKDIR /root

EXPOSE 8080

CMD [ "tail", "-f", "/dev/null" ]
