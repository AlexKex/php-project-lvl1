FROM php:8.1-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

#Install PHP_CodeSniffer
RUN apt-get update && apt-get install -y wget && apt-get install -y vim && \
    wget https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar && \
    wget https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar

RUN chmod u+x *.phar

RUN mv phpcbf.phar /usr/local/bin/phpcbf
RUN mv phpcs.phar /usr/local/bin/phpcs

RUN phpcs --config-set default_standard PSR2

RUN apt-get remove -y wget