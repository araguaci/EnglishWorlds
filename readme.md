# English DZ Social Network
[![Build Status](https://travis-ci.org/CaddyDz/English.svg?branch=master)](https://travis-ci.org/CaddyDz/English)
[![Laravel](https://img.shields.io/badge/Powered%20by-Laravel%20Framework-red.svg)](https://laravel.com/)
[![Gitter](https://img.shields.io/gitter/room/EnglishDz/Lobby.svg?style=flat-square)](https://gitter.im/EnglishDz/Lobby)
[![StyleCI](https://styleci.io/repos/69740118/shield?branch=master)](https://styleci.io/repos/69740118)  

This is the underlying source code of the English DZ Social Networking website.  
The website addresses All active Algerians seeking to either learn or have fun and chat in English online.  
## System Requirements

The following are required to function properly.

*	[PHP 5.6+](http://php.net/manual/en/install.php)
*   [Laravel 5.4+](https://laravel.com/docs/5.4#installation)
*   [NodeJS 5.0+](https://nodejs.org/en/)
*   [MySQL 5.6+](https://dev.mysql.com/doc/refman/5.7/en/installing.html)
*	[Composer](https://getcomposer.org/doc/00-intro.md)

## Installation

Clone the project (replace **Name** with a name of your choice)

``` shell
$ git clone --depth 1 git@github.com:CaddyDz/English Name
```

Install the project dependencies using [Composer](https://getcomposer.org/)

``` shell
$ cd Name && composer install
```

Create environment variables (change values according to your environment)

``` shell
$ cp .env.example .env
```

Generate application key

``` shell
$ php artisan key:generate
```

Install FrontEnd dependencies

``` shell
$ npm install
```

Sematic UI setup
``` shell
1- Set-up Semantic UI? > Express (Set components and output folder)
2- Where should we put Semantic UI inside your project? > resources/assets/semantic
3- What components should we include in the package? > Hit enter (return)
4- Should we set permissions on outputted files? > Yes
5- What octal file permission should outputted files receive? > 744
6- Do you use a RTL (Right-To-Left) language? > No
7- Where should we output Semantic UI? > ../../../public/semantic
```

Building assets requires [Gulp](http://gulpjs.com/)

``` shell
sudo npm install -g gulp
```

Build the assets

``` shell
gulp build
```

**Finally run the application**

``` shell
php artisan serve
```

Hit ``http://127.0.0.1:8000`` using your favorite browser

## Contributing

Feel free to contribute through pull requests or by submitting ideas, feature requests or open issues.  

### License

English Dz Social Networking website is open-sourced software licensed under the [GNU General Public License version 3](https://opensource.org/licenses/GPL-3.0)
