# Broomees Backend – Laravel API

This repository contains the backend API for the **Broomees Task**, built using **Laravel (PHP 8.5+)**.  
It provides RESTful APIs for user management, relationships, reputation logic, and access control.

---

## 🛠 Tech Stack

- **Framework:** Laravel 10+
- **Language:** PHP 8.5+
- **Database:** MySQL 
- **Authentication:** Token-based (API)
- **ORM:** Eloquent
- **Postman:** Api 
- **Migrations & Seeders:** Yes

---


### 3. Build & Start Commands

**Build Command**

composer install --no-dev --optimize-autoloader
php artisan key:generate
php artisan migrate --force
php artisan config:clear
php artisan config:cache
Start Command
php artisan serve
or
php artisan serve --host 0.0.0.0 --port $PORT

.env
APP_NAME=Broomees
APP_ENV=local
APP_KEY=base64:z7+713sQkJPBlTCTWLud8Q5xpJVgL1TWMlXRavUtxP8=
APP_DEBUG=true
API_TOKEN=broomees123

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=broomees
DB_USERNAME=root
DB_PASSWORD=Anil@123


