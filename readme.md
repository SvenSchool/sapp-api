# SAPP API
The backend for the School Application mobile app. See the repository where we're
building the mobile app [here](https://github.com/svenluijten/sapp).

## Setup
Make sure you have [composer](https://getcomposer.org) installed and ready to go
on your local machine, or install [Laravel Homestead](https://laravel.com/docs/5.2/homestead).

```bash
# Clone this repository & cd into the folder
$ git clone git@github.com:svenluijten/sapp-api
$ cd sapp-api

# Install composer dependencies
$ composer install

# Set up .env file & generate encryption key
$ cp .env.example .env
$ php artisan key:generate
```

Next, edit your `.env` file you just created however you wish. Make sure to generate
new 32-character long keys for both the `JWT_SECRET` and the `APP_KEY`. You can do
that by executing the following 2 commands:

```bash
$ php artisan key:generate
$ php artisan jwt:generate
```

**NOTE:**
The JWT secret will generate in `config/jwt.php`, I recommend copying it from that
file into your `.env` file to make sure the key does not get copied over to your
production environment or gets checked into version control.

Your development suite is now set up! Start up a server in your favorite local
development setup (we use [Homestead](https://laravel.com/docs/5.2/homestead))
or simply boot up a server with the `php artisan serve` command.

**NOTE:**
PHP 7 or higher is required to set up this API. You will not be able to run it on
a 5.5 or 5.6 PHP installation. We highly recommend setting up [Homestead](https://laravel.com/docs/5.2/homestead)
for your own comfort and peace of mind.

## License
The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
