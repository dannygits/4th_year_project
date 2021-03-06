git repo for fourth year project
The following is a base demo application that is similar to jumia, amazon and E-bay that implements tokenization in its checkout system. The demo has full administrator permissions and also includes other demo accounts that have limited permissions. This web application was built on a framework for php thus there is no executable file for running it. The instructions below will help you run it in your local server.
To Access the full project, kindly follow the steps below:
1.	Clone the repository using gitbash and cd into it (git clone https://github.com/dannygits/4th_year_project.git).
2.	"composer install" to install all composer updates.
3.	Change guzzle version to 6.5 (“guzzlehttp/guzzle”: “^6.5”) in the composer.json file to avoid compatibility issues with php v7.
4.	Run “composer update” to update changes in the guzzle version. 
5.	Rename or copy .env.example file to .env
6.	Set your database credentials in your .env file
7.	Run "php artisan key:generate" to generate an application key for your app.
8.	Set your Stripe credentials in your .env file. Specifically "STRIPE_KEY" and "STRIPE_SECRET"
9.	Set your Algolia credentials in your .env file. Specifically "ALGOLIA_APP_ID" and "ALGOLIA_SECRET". Refer to Andre's tutorial for more information.
10.	"php artisan ecommerce:install". This will migrate the database and run any seeders necessary. this is a special migrate code to enable you to be able to migrate all necessary data into the database.
11.	"npm install" to install all dependancies.
12.	"npm run dev" to compile all sass/scss files.
13.	"php artisan serve" to set up local enviroment for your application.
14.	Visit localhost:8000 in your browser to view your app.
15.	Change API key in the checkout.blade.php to the one inserted as “STRIPE_KEY” in your .env file
16.	Visit /admin if you want to access the Voyager admin backend.
•	Admin User: admin@admin.com
•	Password: password.
•	Admin Web User: adminweb@adminweb.com
•	Password: password
Software to install to run the project:
•	Xampp v7.2
•	Composer
•	Node
•	Visual studio code
•	Git bash
The following application was coded in php Laravel.

Setting up the database:
•	Open http://localhost/phpmyadmin/index.php
•	Select “user accounts” on the top navigation bar
•	Select “root” user with “host name” localhost and edit privileges to change password
•	Enter phpMyAdmin in xampp folder and select config.inc.php file. Set password for your database at the correct line of code 
$cfg['Servers'][$i]['password'] = '';

•	Refresh page.
•	Create new database with the same database credentials placed in the .env file
