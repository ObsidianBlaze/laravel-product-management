# Product API

## Prerequisites

| Requirement       | Version |
|------------------|---------|
| PHP             | ^8.0    |
| Laravel         | ^9.0    |
| Database Name   | `product_db` |
| Testing Database Name | `product_db_testing` |

---

## Installation

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
   cp .env.example .env.testing
   ```

4. **Run database migrations with seed data:**
   ```sh
   php artisan migrate:fresh --seed
   ```

---

## Running Tests

Run all tests:

```sh
php artisan test
```

Run specific tests:

```sh
php artisan test --filter ProductMigrationTest[Test product migration]
php artisan test --filter ProductTest[Test the product controller for store, show, and index]
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

