# Deploy-a-PHP-MySQL-in-Docker-Container.
## Deploy PHP code with MySQL in Docker Environment.

### To Communication with web and db via two methods :
1. Link method(Link PHP container with MySQL container’s name) 
2. With Same Network(Create a docker network and run both container same network)


### create customized docker images use Docker file for PHP web and MySQL database.



```
#MySQL database

FROM  mariadb:latest
COPY *.sh /docker-entrypoint-initdb.d/
COPY *.sql /docker-entrypoint-initdb.d/

```

```
#Docker file for PHP web

From  php:7.4-alpine
ADD src /app/public
ENV MYSQL_HOST localhost
ENV MYSQL_USERNAME test
ENV MYSQL_PASSWORD test
ENV MYSQL_DATABASE register
RUN chown -R www-data:www-data /app

```
### Create Image From Dokcerfile

```
docker build -t web-php .

dokcer build -t db-php . 

```

### 1. Link PHP container with MySQL container’s name

```

For Database:
============

docker run --name db -e MYSQL_USER=test -e MYSQL_PASSWORD=test -e MYSQL_DATABASE=register -e MYSQL_ROOT_PASSWORD=test -p 3306:3306  -d  db-php

For WEB:
==========

docker run -d --name web --link db -p 8000:80  -e MYSQL_ROOT_PASSWORD=tests -e MYSQL_USERNAME=tests -e MYSQL_PASSWORD=tests -e MYSQL_DATABASE=register -e MYSQL_HOST=db  web-php

```


### 2. Create a docker network and run both container same network


```
docker network create mynetwork
```

```
For Database:
=============

docker run --name db --net mynetwork -e MYSQL_USER=test -e MYSQL_PASSWORD=test -e MYSQL_DATABASE=register -e MYSQL_ROOT_PASSWORD=test -p 3306:3306  -d  db-php

For WEB:
=======

docker run -d --name web --net mynetwork -p 8000:80  -e MYSQL_ROOT_PASSWORD=test -e MYSQL_USERNAME=test -e MYSQL_PASSWORD=test -e MYSQL_DATABASE=register -e MYSQL_HOST=db  web-php
```
