# English Worlds Social Network
# *Please note that the current code is undergoing a **major** overhaul!*  
&#x26A0;&nbsp; please note:
```
The application is currently in pre-alpha.
This means it is currently under active development and still contains known bugs.
As such, all unit tests are failing at the moment for the master branch in contrast to develop branch
```
[![Build Status](https://travis-ci.org/CaddyDz/EnglishWorlds.svg?branch=develop)](https://travis-ci.org/CaddyDz/EnglishWorlds)
[![codecov](https://codecov.io/gh/CaddyDz/EnglishWorlds/branch/develop/graph/badge.svg)](https://codecov.io/gh/CaddyDz/EnglishWorlds)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/CaddyDz/EnglishWorlds/badges/quality-score.png?b=develop)](https://scrutinizer-ci.com/g/CaddyDz/EnglishWorlds/?branch=develop)
[![StyleCI](https://github.styleci.io/repos/69740118/shield?branch=develop)](https://github.styleci.io/repos/69740118)
[![Laravel](https://img.shields.io/badge/Powered%20by-Laravel%20Framework-red.svg)](https://laravel.com/)
[![Gitter](https://img.shields.io/gitter/room/EnglishDz/Lobby.svg?style=flat-square)](https://gitter.im/EnglishDz/Lobby)
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](http://makeapullrequest.com)

This is the underlying source code of the English Worlds Social Networking website.  
The website addresses All active Algerians seeking to either learn or have fun and chat in English online.

## System Requirements

The following installations are required for the app to function properly.

* [PHP 7.1.3+](http://php.net/manual/en/install.php)
* [Laravel 5.6+](https://laravel.com/docs/5.6#installation)
* [MySQL 5.7+](https://dev.mysql.com/doc/refman/5.7/en/installing.html)
* [Composer](https://getcomposer.org/doc/00-intro.md)

## Installation

Automated installation coming soon

**Clone the project (replace Name with a name of your choice)**

``` shell
$ git clone --depth 1 https://github.com/CaddyDz/EnglishWorlds Name
```

### Install the project backend dependencies using [Composer](https://getcomposer.org/)

``` shell
$ cd Name && composer install
```

### Install the project frontend dependencies using [NPM](https://www.npmjs.com/)

``` shell
$ npm install
```

### Compile frontend assets for development

``` shell
$ npm run dev
```

### Migrate the database

``` shell
$ php artisan migrate
```
*you can also add the `--seed` flag to have some dummy data to play with*

### Generate an encryption key

``` shell
$ php artisan key:generate
```

### Finally run the application

``` shell
$ php artisan serve
```

Hit ``http://127.0.0.1:8000`` using your favorite browser

## Support the project
You can support the project in many ways.
- Make pull requests
- Request features
- Open issues
- Donate
- [Digital Ocean Droplets](https://m.do.co/c/1d3a577130a4)

# Developers
### Main
- [Salim "Caddy" Djerbouh](https://github.com/CaddyDz/)

### Contributors
- [Ismail "5nai3r" Stunt](https://github.com/5nai3r)

### License

English Worlds Social Networking website is open-sourced software licensed under the [GNU General Public License version 3](https://opensource.org/licenses/GPL-3.0)
