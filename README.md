# Ecommerce-App
git repo for ecommerce app

The following is a base demo application that is similar to jumia, amazon and E-bay. The demo has full administrator permissions and also includes other demo accounts that have limited permissions. 

To Access the full project, kindly follow the steps below:
1. Clone the repository and cd into it.
2. "composer install" to install all composer updates.
3. Rename or copy .env.example file to .env
4. Run "php artisan key:generate" to generate an application key for your app.
5. Set your database credentials in your .env file
6. Set your Stripe credentials in your .env file. Specifically "STRIPE_KEY" and "STRIPE_SECRET"
7. Set your Algolia credentials in your .env file. Specifically "ALGOLIA_APP_ID" and "ALGOLIA_SECRET". Refer to Andre's tutorial for more information.
8. Set "ADMIN_PASSWORD" in your .env file if you want to specify an admin password. If not, the default password is 'password'.
9. Set your APP_URL in your .env file. This is needed for Voyager to correctly resolve asset URLs.
10. "php artisan ecommerce:install". This will migrate the database and run any seeders necessary. this is a special migrate code to enable you to be able to migrate all necessary data into the database.
11. "npm install" to install all dependancies.
12. "npm run dev" to compile all sass/scss files.
13. "php artisan serve" to set up local enviroment for your application.
14. Visit localhost:8000 in your browser to view your app.
15. Visit /admin if you want to access the Voyager admin backend.
    Admin User: admin@admin.com
    Password: password.
    Admin Web User: adminweb@adminweb.com
    Password: password

The following application was coded in php laravel
