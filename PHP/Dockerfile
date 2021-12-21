FROM  php:7.4-alpine

ADD src /app/public

ENV MYSQL_HOST localhost
ENV MYSQL_USERNAME test
ENV MYSQL_PASSWORD test
ENV MYSQL_DATABASE register

RUN chown -R www-data:www-data /app
