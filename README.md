# Training Institute Management

Workshop 2 refactors the Week 1 Laravel application around MVC and reusable Blade components. The app continues to manage students and courses as independent resources.

## Workshop 2 work

- StudentController and CourseController own CRUD request logic; routes/web.php maps resource routes to them.
- Resource route model binding supplies Student and Course models to detail, edit, update, and delete actions.
- Each controller defines validation rules once. Student email uniqueness ignores the current student during edits.
- The Student model casts date of birth and exposes a computed age accessor.
- A shared Blade component layout renders the page shell, navbar, success/error feedback, and footer.
- Reusable components render form inputs, textareas, and delete forms. Student create/edit share a form component; Course create/edit share a form partial.
- The responsive pages retain search, filters, pagination, and CRUD behavior from Week 1.

## Requirements

- PHP 8.2 or later with pdo_mysql, mbstring, openssl, and zip enabled
- Composer
- MySQL or MariaDB

## Local setup

1. Create the workshop database if it does not already exist:

   CREATE DATABASE WorkshopDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

2. Install dependencies and prepare the environment:

   composer install
   cp .env.example .env
   php artisan key:generate

   In Windows PowerShell, use Copy-Item .env.example .env instead of cp.

3. Check the database values in .env. The example uses 127.0.0.1:3306, username root, and a blank password.

4. Run migrations and start Laravel:

   php artisan migrate
   php artisan serve

5. Open http://127.0.0.1:8000, then use the Students and Courses navigation.

If Composer reports that ZIP support is missing with XAMPP PHP, enable extension=zip in C:\xampp\php\php.ini and open a new terminal.

## Main folders

- app/Http/Controllers/: Student and Course request logic
- app/Models/: Eloquent models and Student data behavior
- database/migrations/: students and courses table definitions
- resources/views/components/: shared layout, navbar, footer, alerts, fields, and delete form
- resources/views/students/ and resources/views/courses/: resource pages
- routes/web.php: home page and resource routes