<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Project Management Web Application

This web application allows users to create and manage projects and their respective tasks. Each project belongs to a specific user, and tasks can be created within projects with different priorities (low, medium, high). The application ensures that only project owners can perform specific actions like creating, updating, and deleting tasks.

Features
User authentication and authorization
Create, update, and delete projects
Assign tasks to projects with different priorities
Allow only project owners to create, update, or delete tasks
Filter tasks by priority
Efficiently manage large sets of tasks within projects

Setup Instructions

Clone the repository: 

git clone https://github.com/Adeyemoolamilekan08/project-management-app.git
cd project-management-app

Install Dependencies:

composer install
npm install
npm run dev

Run Migrations:

php artisan migrate

Run the Application:

php artisan serve


