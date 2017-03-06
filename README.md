# SparkApartmani 

Basic project with [Laravel](https://laravel.com/) and [Vue.js](https://vuejs.org/), its about reserving hotel rooms.


To start this project you will need 2 terminals and database up and running, for this project I have used
[MySql](https://www.mysql.com/) database on [XAMPP](https://www.apachefriends.org/index.html) server.

## First clone
```
git clone https://github.com/MarioRozic/SparkApartmani.git
```

## Terminal 1

``` bash
cd SparkApartmani/Backend
# install dependencies
composer install
# edit .env
edit .env (set DB_DATABASE, DB_USERNAME, DB_PASSWORD)
# fill database
php artisan migrate --seed
php artisan passport:install
# serve file
php artisan serve
```

## Terminal 2

``` bash
# install dependencies
npm install
# edit .env
// open your database and "oauth_clients" table and copy secret code under ID of 2
edit src/.env.js (under ClientSecret paste your code)
# run 
npm run dev
```

To test it you can:

* copy some user email from **users** table and login (passwrod: "secret" for every user)
* register your own user with your own password




