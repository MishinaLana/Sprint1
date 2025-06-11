FROM php:8.3-cli-alpine

COPY index.php /var/www

WORKDIR /var/www


EXPOSE 8081

CMD ["php", "-S", "0.0.0.0:8081", "-t", "/var/www"]
