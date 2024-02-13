some points here to run this project on local

1. clone the Repo or download zip
2. composer install
3. npm i
4. npm run dev
5. create new database
6. cp .\.env.example .env
7. set connection in .env file  like below
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=laravel
        DB_USERNAME=root
        DB_PASSWORD=
8. php artisan migrate
9. php artiosan serve or run on any virtual host

10. Here used the css and js external url for design and js purpose we can optimize that all via using npm but its create conflict that's why external url used here 
