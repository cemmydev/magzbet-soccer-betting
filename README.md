<p style="text-align: left; padding: 1rem 0 3rem 0;"><img src="http://magzbet.com/assets/images/logo.webp" width="250" height="auto" alt="Magz soccer betting"/></p>

A Laravel application designed to maintain a database of movies.

### Installation
- Copy `.env.example` into `.env`
- Edit the superadmin name, email and password in `.env`.
- Run `composer install`.
- Run `db artisan key:generate`.
- Create a file named `database.sqlite` in the database directory or define a connection to your database.
- Run `php artisan migrate`.
- Run `php artisan db:seed`.
- Run `php artisan db:seed --class=WorldSeeder`
- Run `npm install` followed by `npm run build`.

### Technical requirement  
- php 8.1 or greater.  
- redis cache store.  

### Technical description
- Laravel 9.  
- Livewire and alpine.js.  
- Tailwind css.  
- Role and user permissions. 
- Caching with Redis when env `CACHE_ENABLED` is set to true and `CACHE_DRIVER` is set to redis.  
- Static analysis with phpstan.  

<a href="http://magzbet.com" target="_blank">Magzbet</a>
