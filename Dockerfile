FROM php:7.2.27-cli

WORKDIR /usr/app

RUN apt-get update
RUN apt-get install -y sudo \
    apt-utils \
    git \
    zip \
    unzip

COPY . .

EXPOSE 8080

ENTRYPOINT [ "/bin/sh", "script.liveforever.sh" ]
