# SAPP API
The backend for the School Application mobile app. See the main repository
[here](https://github.com/svenluijten/sapp).

## Setup
Make sure you have [composer](https://getcomposer.org), [Node.js](https://nodejs.org/en/)
and [gulp](http://gulpjs.com/) installed on your local machine and ready to go.

- Clone this repository (`git clone git@github.com:svenluijten/sapp-api`)
- Navigate to the repository (`cd sapp-api`)
- Install composer dependencies (`composer install`)
- Pull down the Node dependencies (`npm install`)
- Create an `.env` file (`cp .env.example .env`)
- Fill the `.env` file with your credentials.
- Generate a unique encryption key (`php artisan key:generate`)

Your development suite is now set up! Start the server up in your favorite local
development setup (we use [Laravel Homestead](https://laravel.com/docs/5.2/homestead))
or simply run `php artisan serve` to boot up a server.

## License
The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
