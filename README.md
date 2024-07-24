EduNexus - Kids Learning Platform

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
Email service (Brevo)

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

Screenshots

Homepage (White mode)
![image](https://github.com/user-attachments/assets/410aafb7-bf84-479d-b21e-5aa76e1441e4)

Homepage (Dark mode)
![image](https://github.com/user-attachments/assets/ed97d683-b15e-4a2a-845d-5379e197871b)

About us (White)
![image](https://github.com/user-attachments/assets/a9acf707-f41d-4c1a-a6ce-cc2b6b7773dc)

Game (White)
![image](https://github.com/user-attachments/assets/8da9dcce-dd6c-48d6-8952-890ac0040a34)

Login (white)
![image](https://github.com/user-attachments/assets/34227160-4f8d-4969-8244-5fc7073cdb2d)

Register (white)
![image](https://github.com/user-attachments/assets/0ecbe7f1-3032-4bc4-bdf1-8ba591c96a25)


Usage
Parents: Register and add your children. Check your email for their login details.
Teachers: Register and upload educational content for different topics.
Admins: Manage users and content through the admin dashboard.

Contributing
We welcome contributions! Please fork the repository and submit pull requests.
