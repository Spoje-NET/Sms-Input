# sms-input

FROM php:8.2-cli
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions && install-php-extensions gettext intl zip
COPY src /usr/src/sms-input/src
RUN sed -i -e 's/..\/.env//' /usr/src/sms-input/src/*.php
COPY composer.json /usr/src/sms-input
WORKDIR /usr/src/sms-input
RUN curl -s https://getcomposer.org/installer | php
RUN ./composer.phar install
WORKDIR /usr/src/sms-input/src
CMD [ "php", "./messages2stdout.php" ]
