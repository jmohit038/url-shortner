<<<<<<< HEAD
# url-shortner
=======
# Laravel 10 Short URL Management System

This project is a **multi-company URL shortener** built with **Laravel 10**.  
It supports the following features:

-   Superadmin can create companies and assign admins
-   Each company can have multiple admins and members
-   Admins can invite other admins and members
-   Users can create and manage short URLs
-   Role-based access control (Superadmin, Admin, Member)

---

## ✅ Requirements

-   PHP >= 8.1
-   Composer
-   MySQL
-   Laravel 10
-   Node.js & NPM (for front-end assets)

---

## ✅ Installation Steps

### 1. Clone Repository

```bash
git clone https://github.com/your-username/url-shortener.git
cd url-shortener


## 2. Install Dependencies
 - composer install
 - npm install
 - npm run dev

Update .env with your database credentials:

    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

- php artisan key:generate

## Run Migrations & Seeders

php artisan migrate --seed

and in roles table insert 3 entries
    1. superadmin
    2. admin
    3. member


Start Development Server

php artisan serve  = http://127.0.0.1:8000


Default Login Credentials for superadmin
    email - superadmin@test.com
    pass - 123456

set default password for all users is  = 123456

and added sql file on root also
```
>>>>>>> 1e88ef5 (Initial commit: Laravel 10 URL Shortener)
