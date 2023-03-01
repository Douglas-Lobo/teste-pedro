FROM php:8.0-fpm-alpine

# Atualiza pacotes e instala dependencias
RUN apk update && apk upgrade \
    && apk add --no-cache \
    bash \
    git \
    icu-dev \
    libzip-dev

# Configura extensoes do PHP
RUN docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install zip

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copia arquivos de aplicacao
COPY . /var/www/html

# Define diretorio de trabalho
WORKDIR /var/www/html

# Define usuario e grupo
USER www-data

# Expoe porta 9000
EXPOSE 9000

# Inicia o PHP-FPM
CMD ["php-fpm"]