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

6. **Views**
   - Build Bootstrap-based views under `resources/views/admin` and `resources/views/client`.
   - Layout files provide navigation and a consistent look for admin, client and guest pages.
   - Reusable partials show validation errors in forms.

7. **Testing**
   - Write unit tests for model relationships and validation rules.
   - Add feature tests for admin CRUD operations and client order flow.
   - Use `php artisan test` with the `RefreshDatabase` trait.

## Manual testing

After running migrations and seeding the database you can manually verify the
application behaviour:

1. Start the dev server with `php artisan serve` and visit
   `http://localhost:8000`.
2. Register a new account at `/register` and confirm you can log in.
3. Browse the product list at `/products` and attempt to place an order.
4. Use the seeded admin account (see `DatabaseSeeder`) to log in and navigate to
   `/admin` where you can manage products, categories, orders and users.
5. Test creating, editing and deleting records through the admin dashboard and
   ensure the changes are reflected on the client side.

8. **Run the application**
   - Compile assets using `npm run dev`.
   - Start the development server with `php artisan serve`.
   - Visit `/admin` for the admin dashboard (requires an admin account) or `/` for the client area.

Pull requests implementing these steps incrementally are welcome.
