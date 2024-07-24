Kids Learning Platform
Overview
Kids Learning Platform is an educational web application designed to facilitate learning for children. The platform allows parents to register and manage their children’s accounts, teachers to upload educational content, and administrators to oversee the entire system.

Features
Parent Registration: Parents can create an account and add their children. Each child receives a unique account, and login details are sent via email.
Teacher Registration: Teachers can register and upload content for various topics.
Admin Control: Administrators have full control over the platform, including user management and content moderation.
Technologies Used
Laravel: PHP framework for building web applications.
Tailwind CSS: Utility-first CSS framework for styling.
Livewire: Full-stack framework for Laravel that makes building dynamic interfaces simple.
MySQL: Database management system.
SendGrid: Email service for sending notifications.
Getting Started
Prerequisites
PHP
Composer
Laravel
MySQL
Email service (e.g., SendGrid)
Installation
Clone the repository:
git clone https://github.com/Hemant-khadun/edunexus.git

Navigate to the project directory:
cd edunexus

Install dependencies:
composer install

Unzip the database file and import it into MySQL:
unzip 127_0_0_1.zip
mysql -u yourusername -p yourpassword yourdatabase < 127_0_0_1.sql

Set up environment variables in the .env file for database and email service.
Running the Application
Start the Laravel development server:
php artisan serve

Usage
Parents: Register and add your children. Check your email for their login details.
Teachers: Register and upload educational content for different topics.
Admins: Manage users and content through the admin dashboard.

Contributing
We welcome contributions! Please fork the repository and submit pull requests.