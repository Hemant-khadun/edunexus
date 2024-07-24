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

About us (White Mode)
![image](https://github.com/user-attachments/assets/a9acf707-f41d-4c1a-a6ce-cc2b6b7773dc)

Game (White Mode)
![image](https://github.com/user-attachments/assets/8da9dcce-dd6c-48d6-8952-890ac0040a34)

Login (White Mode)
![image](https://github.com/user-attachments/assets/34227160-4f8d-4969-8244-5fc7073cdb2d)

Register (White Mode)
![image](https://github.com/user-attachments/assets/0ecbe7f1-3032-4bc4-bdf1-8ba591c96a25)

Admin dashboard (White Mode)
![image](https://github.com/user-attachments/assets/c6042386-e52b-4b5c-a120-e887cf5ed1f9)

All courses dashboard (White Mode)
![image](https://github.com/user-attachments/assets/cb251084-e8f0-4a48-b212-81319bff29f1)

Users (White Mode)
![image](https://github.com/user-attachments/assets/9c42d978-411b-4792-aa60-571d3b8ac008)

Student Courses dashboard
![image](https://github.com/user-attachments/assets/6cec2823-2b55-48cc-b749-9fe0bc994e6f)

Student Single course
![image](https://github.com/user-attachments/assets/cf1082ed-b88e-412c-999a-78458b9a4323)

Student Program Page
![image](https://github.com/user-attachments/assets/4c409ed0-61ae-4828-958f-51129f0336fb)

Student Subject page
![image](https://github.com/user-attachments/assets/d25688e0-f658-49f7-bc36-4b11d2b9ad92)

Student Achivement page for all the completed courses :
![image](https://github.com/user-attachments/assets/d9135c9d-ea2f-4b0e-884a-933c280af5da)

Teacher (Dark Mode)
![image](https://github.com/user-attachments/assets/8a447ad0-44d1-41fa-ba46-842ae7045c6f)

Parent (Dark Mode)
![image](https://github.com/user-attachments/assets/c5381bc2-dae3-48ac-ab6a-3e5a4fc2e311)

Usage
Parents: Register and add your children. Check your email for their login details.
Teachers: Register and upload educational content for different topics.
Admins: Manage users and content through the admin dashboard.

Contributing
We welcome contributions! Please fork the repository and submit pull requests.
