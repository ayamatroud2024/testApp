# appTest

1. Clone the repository.
2. Run `composer install` to install dependencies.
3. Copy `.env.example` to `.env` and set up your environment variables, including the database connection.
4. Generate an application key:


   php artisan key:generate
   
6. Update the database name and other credentials in the .env file.
7. Run migrations and seed the database:

php artisan migrate --seed

8. Install Laravel Passport:

php artisan passport:install

9. Set up your .env file with the following mail configuration:
.env

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=ayamatroud8@gmail.com
MAIL_PASSWORD=lamfgjmpyowvhick
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="ayamatroud8@gmail.com"
MAIL_FROM_NAME="Ixcoders"


FIREBASE_API_KEY=your_firebase_api_key_here

10. Start the development server:

php artisan serve
