# origo-api

## Build Setup

```bash
# copy .env.example
$ cp .env.example .env

# install dependencies
$ composer install

# run migrations and seeders
$ php artisan migrate:fresh --seed

# start your project using artisan
$ php artisan serve