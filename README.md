#init the laravel project
https://laravel.com/docs/5.5/installation

 download the Laravel installer using Composer:
 
`composer global require "laravel/installer"`

Once installed, the laravel new command will create a fresh Laravel installation in the directory you specify. For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel's dependencies already installed:

`laravel new blog`

set the environment variables needed in the laradock/.env file

* APPLICATION=../blog/
* DB_HOST=mysql
* MYSQL_USER=blog_user
* MYSQL_PASSWORD=db_pass
* MYSQL_DATABASE=blog_db

#Artisan reminders

Creating a model with a migration file:

`php artisan make:model Author -m`

run the migrations:

`php artisan migrate`

generate events & listeners (after setting them on EventServiceProvider):

`php artisan event:generate`

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

`
docker-compose up nginx mysql
`
