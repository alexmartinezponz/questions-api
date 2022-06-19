#ABOUT THE API

Project is configured to work with redis using the public api https://api.stackexchange.com/docs/questions

#PROJECT CONFIG STEPS

- Set the <i>mysql</i> and <i>redis</i> configuration in the .env file depending on your project virtualization. Project requires mysql, nginx/apache with php version 8.1 and redis
- Run "composer install" to get Laravel vendor libraries.
- Create database "questions-api".
- Run migrations with command "php artisan migrate".
- Run seeders "php artisan db:seed" in order to create a new user and a Bearer token.
- Use User token to make calls to the api.

#ENDPOINTS

- /api/questions/get-data (GET). <i>Use 'tagged' as a required parameter</i>
