<p align="center">
<a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</a>
</p>

# Laravel API Authentication Comparison

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
git clone https://github.com/your-username/laravel-api-auth.git
cd laravel-api-auth
git checkout sanctum-auth # or passport-auth / jwt-auth


