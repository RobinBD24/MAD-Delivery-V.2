# MAD Delivery — Laravel Backend

Full-featured Laravel 11 backend for the MAD Delivery food delivery platform (Cheez! Pizza & Madchef).

## Features
- User authentication (register/login/logout)
- Menu / category browsing
- Cart (session-based)
- Checkout with delivery details
- Orders with status tracking
- Admin dashboard & product/order management
- Blade templates (dark theme matching frontend)
- MySQL database
- Stripe / bKash / Cash-on-Delivery payment options

## Setup

1. Install dependencies:
```bash
cd backend
composer install
```

2. Configure `.env` (DB settings already included for MySQL):
```
DB_DATABASE=mad_delivery
DB_USERNAME=root
DB_PASSWORD=
```

3. Generate app key:
```bash
php artisan key:generate
```

4. Run migrations and seed:
```bash
php artisan migrate --seed
```

5. Serve locally:
```bash
php artisan serve
```

## Structure
- `routes/web.php` — all routes
- `app/Http/Controllers/` — controllers
- `app/Models/` — Eloquent models
- `database/migrations/` — schema
- `database/seeders/` — demo data
- `resources/views/` — Blade templates

## Admin Access
Admin routes are protected under `/admin`. For demo, any logged-in user can access; in production, enforce `is_admin` checks.

## Integration Note
This backend is kept separate from the existing React frontend (`../index.html`) as requested. You can either:
- Serve Blade templates as server-rendered pages (current setup)
- Convert controllers to API controllers and connect to the React frontend
