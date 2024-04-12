FROM php:8.2-apache

# Instalación de FuelPHP
RUN apt-get update && apt-get install -y \
    unzip \
    && rm -rf /var/lib/apt/lists/* \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer create-project fuel/fuel /var/www/app

# Exponer el puerto 80
EXPOSE 80

# Habilitar mod_rewrite de Apache para FuelPHP
RUN a2enmod rewrite

# Configurar el punto de montaje
VOLUME /var/www/app