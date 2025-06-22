# PHP Shop

This project is a Laravel application using Bootstrap for the frontend. It provides an admin dashboard for managing products, orders and users, and a client area where customers can browse products and place orders.

## Goals

- CRUD operations for users, products, categories, orders and reviews
- Role-based authentication (`admin` and `client`)
- Bootstrap based dashboards for admins and clients
- MVC architecture with automated tests

## Development Steps

1. **Environment setup**
   - Clone the repository and run `composer install` and `npm install`.
   - Copy `.env.example` to `.env` and update the PostgreSQL credentials and session driver.
   - Generate the application key with `php artisan key:generate`.

2. **Create database structure**
   - Add a `role` column to the `users` table.
   - Create migrations for `products`, `orders`, `order_product`, `categories`, `product_category`, `addresses` and `reviews` tables.
   - Run `php artisan migrate` to apply all migrations.

3. **Define models and relationships**
   - Implement Eloquent models for each table.
   - Set up relationships: products to categories, orders to products, users to addresses and reviews, etc.
   - Provide factories and seeders for generating sample data.

4. **Authentication and authorization**
   - Simple login and registration controllers allow users to create accounts and sign in.
   - Middleware restricts access to admin pages and secures authenticated routes.

5. **Controllers and routes**
   - Resource controllers handle CRUD logic for products, categories, orders, addresses, reviews and user management.
   - Routes are defined in `routes/web.php` and grouped by `auth` and `admin` middleware.
   - Install Laravel Breeze (or a similar starter kit) to scaffold login and registration.
   - Add middleware to enforce `admin` or `client` roles and secure the routes.
   - Create controllers for admin and client operations (products, categories, orders, addresses, reviews).
   - Register routes in `routes/web.php` and group them by middleware (`auth` and role checks).

6. **Views**
   - Build Bootstrap-based views under `resources/views/admin` and `resources/views/client`.
   - Use Blade components and layouts for navigation, forms and tables.

7. **Testing**
   - Write unit tests for model relationships and validation rules.
   - Add feature tests for admin CRUD operations and client order flow.
   - Use `php artisan test` with the `RefreshDatabase` trait.

8. **Run the application**
   - Compile assets using `npm run dev`.
   - Start the development server with `php artisan serve`.
   - Visit `/admin` for the admin dashboard (requires an admin account) or `/` for the client area.

Pull requests implementing these steps incrementally are welcome.
