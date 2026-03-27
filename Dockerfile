
FROM php:8.2-apache


RUN apt-get update && apt-get install -y git unzip curl \
    && rm -rf /var/lib/apt/lists/*


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN a2enmod rewrite


COPY public/ /var/www/html/


RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

RUN echo '<Directory /var/www/html>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' > /etc/apache2/conf-available/noxa.conf \
    && a2enconf noxa

EXPOSE 80

CMD ["apache2-foreground"]
