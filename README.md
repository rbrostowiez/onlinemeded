# OnlineMedEd ToDo Demo Application
This is a ToDo App demo application for OnlineMedEd.  The backend uses Laravel v5.8 and was written with PHP7.3.  
Node.js v10 LTS was used for development along with the latest version of yarn.

## Components
- Laravel 5.8

## Requirements
- PHP 5.7
- Composer
- Node.js v10
- yarn

## Installation
You will need to run the following:
- Clone repo and change to its directory
- `composer install`
- `yarn install`
- `cp .env.example .env`
- Create test database and configure mysql entries in .env
- `php artisan key:generate`
- `php artisan migrate:fresh`
- Open localhost in browser or w/ locally defined host entry as configured w/ http server(you could also use the laravel command)
