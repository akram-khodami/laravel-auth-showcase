<p align="center">
<a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</a>
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-API%20Auth-red?style=for-the-badge&logo=laravel" />
  <img src="https://img.shields.io/badge/PHP-8.2%2B-blue?style=for-the-badge&logo=php" />
  <img src="https://img.shields.io/badge/Auth-Sanctum%2FPassport%2FJWT-orange?style=for-the-badge" />
</p>


# laravel-auth-showcase
Laravel API Authentication Comparison

This repository demonstrates and compares three popular authentication methods in Laravel for building secure APIs:

- **Sanctum**
- **Passport**
- **JWT (tymon/jwt-auth)**

## Purpose

The goal of this project is to practice, implement, and evaluate different authentication methods available in Laravel. Each method is developed in a separate Git branch for clarity and easy comparison.

This project serves as a learning opportunity and showcases my ability to:
- Work with Laravel 12 and modern tools
- Implement secure and RESTful authentication APIs
- Handle JSON-based request validation and error responses
- Follow best practices for structuring Laravel API projects

## Branches

Each branch represents one method of authentication:
- `sanctum-auth` — Laravel Sanctum implementation
- `passport-auth` — Laravel Passport implementation
- `jwt-auth` — JWT (tymon/jwt-auth) implementation

## Features

- Basic user CRUD operations:
  - Create a new user
  - View all users
  - View a specific user
  - Update user
  - Delete user
- Server-side validation with JSON error responses
- Token-based authentication (per method)
- Clean, modular code
- Comments and documentation in code

## Tools Used

- Laravel 12
- Composer
- Git & Git branches
- Laravel Sanctum / Passport / JWT
- PHP 8.2+

## Getting Started

1. Clone the repository and switch to the desired branch:
```bash
git clone https://github.com/akram-khodami/laravel-auth-showcase.git
cd laravel-auth-showcase
git checkout sanctum-auth # or passport-auth / jwt-auth
```

2. Install dependencies:
```bash
composer install
```

 3. Set up your .env file:
```bash
- php artisan key:generate
+ cp .env.example .env
+ php artisan key:generate
```

4. Set up your database:

- Create a new MySQL (or other) database, e.g. `laravel_auth_showcase`
- Open `.env` file and update the following:

```env
DB_DATABASE=laravel_auth_showcase
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

5. Run migrations:
```bash
php artisan migrate
```
6. Seed test data(Optional) :
   
```bash
php artisan db:seed
```

7. Start the development server:
```bash
php artisan serve
```

8. If you are working with the `auth-passport` branch, make sure to run the following commands to generate a personal access client and clear the cache:
```bash
php artisan passport:client --personal
php artisan cache:clear
```

## License

This project is open-source and available under the [MIT license](LICENSE).  
Feel free to fork, contribute, or use it as a base for your own Laravel API projects.
