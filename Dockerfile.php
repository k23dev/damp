FROM php:8.2-apache

# Instalación de FuelPHP
RUN apt-get update && apt-get install -y \
    unzip \
    # && apt-get install -y systemctl \
    && apt-get install -y vim \
    && apt-get install -y nano \
    && apt-get install -y curl \
    && apt-get install -y wget \
    && rm -rf /var/lib/apt/lists/* \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer create-project fuel/fuel /var/www/html

# # RUN update site
# # setea que se va a trabajar en la carpeta /etc/apache2/sites-available
WORKDIR /var/www/html
COPY ./www/html .


# Exponer el puerto 80
EXPOSE 80

# Habilitar mod_rewrite de Apache para FuelPHP
RUN a2enmod rewrite

# Configurar el punto de montaje
VOLUME /var/www/html