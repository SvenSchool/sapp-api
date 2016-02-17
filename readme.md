# SAPP API
The backend for the School Application mobile app. See the main repository
[here](https://github.com/svenluijten/sapp).

## Setup
Make sure you have [composer](https://getcomposer.org) and [Node.js](https://nodejs.org/en/)
installed and ready to go on your local machine.

```bash
# Clone this repository & cd into the folder
$ git clone git@github.com:svenluijten/sapp-api
$ cd sapp-api

# Install composer & node dependencies
$ composer install
$ npm install

# Set up .env file & generate encryption key
$ cp .env.example .env
$ php artisan key:generate
```

Your development suite is now set up! Start the server up in your favorite local
development setup (we use [Laravel Homestead](https://laravel.com/docs/5.2/homestead))
or simply run `php artisan serve` to boot up a server.

## License
The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
