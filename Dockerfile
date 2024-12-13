# Usamos la imagen oficial de PHP con Apache como servidor web
FROM php:8.2.0-apache

# Add this line to set the ServerName directive
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Instalamos dependencias necesarias
RUN apt-get update && \
    apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip libzip-dev && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd pdo pdo_mysql zip

# Install PHP extensions
RUN docker-php-ext-install zip

# Habilitamos mod_rewrite para Laravel
RUN a2enmod rewrite

# Copiamos los archivos de la aplicación a la imagen
COPY . /var/www/html

# Copiar php.ini-development a php.ini, creando así el archivo php.ini
RUN cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

# Ahora puedes modificar php.ini como quieras
RUN sed -i "s/default_socket_timeout = 60/default_socket_timeout = 600/" /usr/local/etc/php/php.ini

# Copiar el archivo de configuración de Apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf


# Cambiar los permisos de los archivos y directorios de Laravel
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html/storage

# Establecemos el directorio de trabajo
WORKDIR /var/www/html

# Instalamos las dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalamos las dependencias de la aplicación
RUN composer install

# Copiamos el archivo de configuración de ejemplo de Laravel
RUN cp .env.example .env


# Generamos la clave de la aplicación
#RUN php artisan key:generate

# Exponemos el puerto 80
EXPOSE 80

# Comando por defecto para ejecutar Apache en primer plano
CMD ["apache2-foreground"]s