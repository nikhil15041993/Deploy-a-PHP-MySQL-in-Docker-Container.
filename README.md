# Deploy-a-PHP-MySQL-in-Docker-Container.
## Deploy PHP code with MySQL in Docker Environment.

### To Communication with web and db via two methods :
1. Link method(Link PHP container with MySQL container’s name) 
2. With Same Network(Create a docker network and run both container same network)


### create customized docker images use Docker file for PHP web and MySQL database.



```
#MySQL database

FROM  mariadb:latest
LABEL maintainer="vineet kumar"
COPY *.sh /docker-entrypoint-initdb.d/

```

```
#Docker file for PHP web

From  vineetkumar03/php:7.4-alpine
ADD src /app/public
ENV MYSQL_HOST localhost
ENV MYSQL_USERNAME test
ENV MYSQL_PASSWORD test
ENV MYSQL_DATABASE register
RUN chown -R www-data:www-data /app

```

