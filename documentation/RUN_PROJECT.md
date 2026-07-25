# RUN_PROJECT.md

## Project: MAD-Delivery-V.2

### Required Software & Versions
- PHP >= 8.2
- MySQL >= 8.0
- Composer >= 2.5
- Node.js >= 18 (for frontend assets if needed)
- Laravel 11

### Required Versions (Verified)
- PHP: 8.2+
- Laravel Framework: ^11.0
- MySQL: 8.0+
- Composer: 2.5+

### Environment Setup
1. Copy `.env.example` to `.env`
2. Update DB credentials in `.env`
3. Set `APP_KEY` (already set in repo: `base64:fixed-key-for-mad-delivery-v2-rbac-system-all-issues-resolved`)

### Install Dependencies
```bash
cd backend
composer install
```

### Database Setup
```bash
mysql -u root -p < database/schema.sql
# Or import database backup
mysql -u root -p mad_delivery < database/backup_mad_delivery_2026_07_25.sql
```

### Backend Run
```bash
cd backend
php artisan serve
# Or use your preferred web server (Apache/Nginx) pointing to backend/public
```

### Frontend
The frontend is server-rendered Blade (`backend/resources/views/`) with a separate reference bundle (`frontend/index.html`) for design reference. Access via `http://localhost/` (backend serves Blade templates).

### Database Import
```bash
mysql -u root -p -e "CREATE DATABASE IF NOT EXISTS mad_delivery CHARACTER SET utf8mb4;"
mysql -u root -p mad_delivery < database/schema.sql
```

### Environment Variables (Key)
- `APP_NAME`: MAD Delivery
- `DB_DATABASE`: mad_delivery
- `DB_USERNAME`: root
- `DB_HOST`: 127.0.0.1
- `APP_KEY`: base64:fixed-key-for-mad-delivery-v2-rbac-system-all-issues-resolved

### Build Process
No separate build needed for PHP backend. Blade templates compile automatically.

### Production Deployment
- Set `APP_ENV=production`
- Configure web server to point to `backend/public`
- Run `php artisan migrate` (migrations are in `backend/database/migrations/` and copied to `database/`)
- Ensure `.env` is secured (`chmod 600 .env`)

### Common Errors & Solutions
- **Page not loading / "Something went wrong"**: Ensure `APP_KEY` is set in `.env`, `database/schema.sql` is imported, and migrations match schema.
- **Image missing**: Product images are referenced as `images/pizza/` and `images/madchef/` relative to root. Ensure `frontend/images/` is available or adjust `image_path` in products.
- **Login not working**: All 7 roles use the same `auth/login.blade.php`. Ensure user exists with correct role in `users` table and linked in `role_user`.

### Quick Start (5–10 Minutes)
1. `git clone https://github.com/RobinBD24/MAD-Delivery-V.2`
2. `cd MAD-Delivery-V.2/backend && composer install`
3. `cp .env.example .env` (update DB if needed)
4. `mysql -u root -p < database/schema.sql`
5. `php artisan serve`
6. Visit `http://localhost/login`
7. Use demo accounts from `database/seed_data_demo_accounts.json`
