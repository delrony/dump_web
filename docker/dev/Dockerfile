FROM ubuntu:xenial

RUN apt-get update \
    && apt-get install -y software-properties-common python-software-properties unzip zip

RUN LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y php7.0 php7.0-cli php7.0-curl php7.0-gd php7.0-json php7.0-xml \
    php7.0-mcrypt php7.0-mysql php7.0-zip php7.0-opcache php7.0-intl

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('sha384', 'composer-setup.php') === 'e5325b19b381bfd88ce90a5ddb7823406b2a38cff6bb704b0acc289a09c8128d4a8ce2bbafcd1fcbdc38666422fe2806') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');" \
    && mv composer.phar /usr/local/bin/composer && chmod +x /usr/local/bin/composer

RUN useradd -ms /bin/bash dumper

USER dumper
WORKDIR /home/dumper

CMD ["tail", "-f", "/dev/null"]