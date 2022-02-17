#  coding test frontend

## Installation

Clone the repository

    https://github.com/Jahidhasan3323/registration-app

Switch to the repo folder

    cd registration-app

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file for mail and other stubs

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run migration and seed for user and product

    php artisan migrate
```you can also import database. there have a db folder in root directory```
Run storage link command

```php artisan storage:link```

Start the local development server

    php artisan serve
