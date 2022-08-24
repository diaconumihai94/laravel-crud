<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## CRUD in Laravel 8

This tutorial is created to illustrate the basic CRUD (Create , Read, Update, Delete) operation using SQL with Laravel 8.

 * Run `docker-compose up` - to start the mysql database
 * Run `composer update` or `composer install`
 * Run `composer dump-autoload` - (execute only ONCE!!) to regenerate the auto-load (useful ONLY when adding new files on the auto-load - see `composer.json`) 
 * Edit the .env file with relevant database credentials.
 * Run `php artisan migrate`
 * Run `php artisan db:seed --class=ProductStockTableSeeder` (optional)
 * Run `php artisan db:seed --class=UsersTableSeeder` (for creating the user `admin` with full rights)
 * Run `php artisan serve`

 * Execute `start.sh` to install the app from scratch (contains all the steps above) 

 * FOR ADMIN RIGHTS :

    - email : admin@email.com
    - password : password
