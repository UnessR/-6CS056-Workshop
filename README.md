# Training Institute Management

Week 1 Laravel application for managing students and courses. The two resources are intentionally independent in this workshop; their many-to-many relationship is planned for a later workshop.

## Features

- Student create, list, detail, edit, and delete pages
- Course create, list, detail, edit, and delete pages
- Server-side validation, unique student emails, CSRF protection, and delete/update method spoofing
- Search and pagination for students; search, difficulty filtering, and pagination for courses
- Responsive Blade interface with accessible labels and feedback messages
- MySQL persistence through Laravel migrations

## Requirements

- PHP 8.2 or later with `pdo_mysql`, `mbstring`, `openssl`, and `zip` enabled
- Composer
- MySQL or MariaDB

If Composer reports that ZIP support is missing under XAMPP PHP, enable `extension=zip` in `C:\xampp\php\php.ini` (the extension DLL is already installed at `C:\xampp\php\ext\php_zip.dll`) and open a new terminal.

## Local setup

1. Create the workshop database in MySQL:

   ```sql
   CREATE DATABASE WorkshopDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

2. Install dependencies and prepare the environment:

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

   On Windows PowerShell, use `Copy-Item .env.example .env` instead of `cp`.

3. Check the database settings in `.env`. The example uses `127.0.0.1:3306`, user `root`, and a blank password. Change them if your MySQL server uses different credentials.

4. Create the application tables and start Laravel:

   ```bash
   php artisan migrate
   php artisan serve
   ```

5. Open [http://127.0.0.1:8000](http://127.0.0.1:8000). The home page redirects to the student list. Add students and courses from their respective pages.

## Database tables

- `students`: name, unique email, phone, optional address and date of birth, timestamps
- `courses`: name, optional description, duration in weeks, decimal fee, difficulty (Easy/Medium/Hard), active status, timestamps

Laravel's default users, cache, and jobs migrations are also retained from the project scaffold.
