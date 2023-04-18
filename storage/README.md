Gigs 
Gigs is a Laravel-based web application that allows users to create, browse, and apply to job postings for freelance work. The application has features such as tagging, searching, and filtering job postings, as well as user authentication and authorization.

Requirements
PHP >= 8.2.4
Laravel >= 8.0
MySQL >= 5.7
Installation
Clone the repository: git clone https://github.com/Ibezimmichael/new_gigs.git
Navigate to the project directory: cd gig-board
Install the composer dependencies: composer install
Create a new .env file: cp .env.example .env
Generate a new app key: php artisan key:generate
Update the .env file with your database credentials
Run the database migrations: php artisan migrate
Serve the application: php artisan serve
Usage
After installing and running the application, you can access the home page by visiting http://localhost:8000. From here, you can browse and search job postings, or create a new job posting if you are logged in.

To create a new user account, click the "Register" button on the home page and provide your details. Once you have created an account, you can log in and create job postings by clicking the "Create Gig" button.