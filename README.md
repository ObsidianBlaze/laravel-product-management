# Product API

## Prerequisites

| Requirement       | Version |
|------------------|---------|
| PHP             | ^8.0    |
| Laravel         | ^9.0    |
| Database Name   | `product_db` |
| Testing Database Name | `product_db_testing` |
| Filament Admin User Email   | `admin@example.com` |
| Filament Admin User Password | `password` |

---

## Production / Live URL


```
https://laravel-product-management-main-v8ebgm.laravel.cloud/
```

View the generated live documentation at:

```
https://laravel-product-management-main-v8ebgm.laravel.cloud/docs
```

View the live admin dashboard at:

```
https://laravel-product-management-main-v8ebgm.laravel.cloud/admin
```

## API For Live Products Without Auth

View all products:
```
https://laravel-product-management-main-v8ebgm.laravel.cloud/api/products
```

View specific product:
```
https://laravel-product-management-main-v8ebgm.laravel.cloud/api/products/{id}
eg
https://laravel-product-management-main-v8ebgm.laravel.cloud/api/products/3
```

---

## Local Installation / Setup

1. **Clone the repository:**
   ```sh
   git clone https://github.com/ObsidianBlaze/laravel-product-management.git
   cd laravel-product-management
   ```

2. **Install dependencies:**
   ```sh
   composer install
   ```

3. **Create environment files:**
   ```sh
   cp .env.example .env
   ```
   ```sh 
   cp .env.example .env.testing
   ```

4. **Run database migrations with seed data:**
   
   (Note:Rename your .env.testing database name to `product_db_testing`)
   
    Then run commands below:
   ```sh
   php artisan migrate --env=testing   
   ```
   ```sh
   php artisan migrate --seed
   ```

(Note: You can't log into filament without running migrations and seeders first.)

5. **Generate App Key:**
   ```sh
   php artisan key:generate
   ```
   ```sh
   php artisan optimize:clear
   ```

---

## Running Tests

Run all tests:

```sh
php artisan test
```

Run specific tests:

API tests:

```sh
php artisan test --filter ProductMigrationTest[Test product migration]
php artisan test --filter ProductTest[Test the product controller for store, show, and index]
php artisan test --filter AddIsAdminColumnTest[Test to ensure new column is_admin works with migration]
```

Filament tests:

```sh
php artisan test --filter ProductResourceTest[Test permissions to ensure only admin can edit, create, and delete products]
```

---

## API Documentation

Generate API documentation using Laravel Scribe:

```sh
php artisan scribe:generate
```

View the generated documentation at:

```
http://localhost:8000/docs
```

(Note: The port number may vary depending on your Laravel project setup.)

## API For Products Without Auth

View all products:
```
http://localhost:8000/api/products
```

View specific product:
```
http://localhost:8000/api/products/{id}
eg
http://localhost:8000/api/products/3
```

## Admin Dashboard

View the admin dashboard at:

```
http://localhost:8000/admin
```
