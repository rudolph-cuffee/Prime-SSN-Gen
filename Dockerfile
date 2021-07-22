FROM php:7.4-cli

COPY . /usr/

WORKDIR /usr/src

CMD [ "php", "./primeSSNGen.php" ]