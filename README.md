## Livewire Admin Panel

About : Notification pannel is developed on laravel with Mysql, here we can manage User and Notification. we can send notification manuualy to single user or groups of user , a mobile verification api implemneted to check the valid number,

## Lib

-   Laravel 8.x
    -- Mysql

# Installation

## Step 1

1. Run git clone https://github.com/pandeymohit6/notification-app Notification-panel
2. From the projects root run `cp .env.example .env`
3. Configure your `.env` file
4. Configure the database for the project
5. From the projects root folder run `composer Install`
6. From the projects root folder run `php artisan key:generate`
7. From the projects root folder run `php artisan migrate`
8. From the projects root folder run `php artisan db:seed`
9. From the projects root folder run `composer dump-autoload`

## Step 2 for css and js mix file

npm install
npm run dev ---development

### Folder Ownership and Permission

1. Check the permissions on the storage directory: `chmod -R 775 storage`

### Seeds

##### Seeded User

-   php artisan db:seed
