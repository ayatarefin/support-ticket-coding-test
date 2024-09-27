## Getting Started

To set up and run the Support Ticket System, follow these steps:

### Prerequisites
- Ensure you have PHP, Composer, and Laravel installed on your machine.
- Set up a database (MySQL) and update your `.env` file accordingly.

### Installation
1. Clone the Repository
2. Generate Application Key
3. Run Migrations and Seeders: php artisan migrate --seed
4. Admin User: The admin user is created in database/seeders/AdminSeeder.php. Check the password in the migrations.
5. Customer Registration: Users can register as customers through the registration form.
6. Login: Use the login form to authenticate as a customer or admin.
7. After cloning the project, please update your .env file with your database configuration and the following Mailtrap.io settings for email testing.
