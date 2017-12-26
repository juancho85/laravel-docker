#Laravel with laradock

http://laradock.io/getting-started/#Usage

A) Setup for Single Project#
(Follow these steps if you want a separate Docker environment for each project)


A.1) Already have a PHP project:#
1 - Clone laradock on your project root directory:

git submodule add https://github.com/Laradock/laradock.git

A) Setup for Single Project#
(Follow these steps if you want a separate Docker environment for each project)


A.1) Already have a PHP project:#
1 - Clone laradock on your project root directory:

git submodule add https://github.com/Laradock/laradock.git

2 - Build the enviroment and run it using docker-compose

In this example we’ll see how to run NGINX (web server) and MySQL (database engine) to host a PHP Web Scripts:

docker-compose up -d nginx mysql