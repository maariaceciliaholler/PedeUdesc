FROM php:7.2-apache

WORKDIR /var/www/html

# vai copiar teu projeto la pra dentro do container
COPY . /var/www/html/
# nao precisa do sudo. dentro do container tu sempre é o super usuário
RUN apt-get update


RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql