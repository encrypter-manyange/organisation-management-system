## About Organisation Management System

The application has the following features available:
- Authorisation Management
- Membership Management
- Contributions Management

## How to Install Application

- Create .env File by copying .env.example provided.
- Create a database and add the configuration in .env folder
- Go to database folder and import the base sql file oms.sql to inherit the base permissions required to access the system.
- Login the application with:
- username: admin@oms.com
- password: Sodium2195!

## Installing Dependencies for REST API Access
- composer require laravel/sanctum
- php artisan vendor:publish — provider=”Laravel\Sanctum\SanctumServiceProvider”

## API Documentation for app integration can be Accessed Through the link below:
https://documenter.getpostman.com/view/5546128/2s9YymGQ1e
