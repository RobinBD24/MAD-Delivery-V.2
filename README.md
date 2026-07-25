# MAD-Delivery-V.2

Dhaka food delivery platform for **Cheez! Pizza** & **Madchef**.

## 🚀 Quick Start

```bash
git clone https://github.com/RobinBD24/MAD-Delivery-V.2.git
cd MAD-Delivery-V.2

# Backend
cd backend
composer install
cp .env.example .env
# Update DB credentials if needed

# Database
mysql -u root -p < ../database/schema.sql

# Run
php artisan serve
# Visit http://localhost/login
```

## 📁 Folder Structure

```
MAD-Delivery-V.2/
├── backend/           → Laravel 11 backend (controllers, models, routes, views)
├── frontend/          → Frontend reference (index.html, images/)
├── database/          → Schema SQL, seed data, demo accounts, migrations
├── documentation/     → RUN_PROJECT.md, API_DOCUMENTATION.md, PROJECT_OVERVIEW.md
├── .env               → Environment config
├── .env.example       → Template for quick setup
├── .gitignore
├── README.md
├── verify_all_fixes.sh
```

## 🛡️ Features

- **7 Roles with RBAC**: Super Admin, Management, Branch Manager, Accounts, Marketing, Rider, Customer
- **Product Module**: categories + multi-size/price variations (Small/Medium/Large with separate prices)
- **Branch Management**: brand type selection (`cheez` / `madchef` / `combined`)
- **Delivery System**: delivery zone config, estimated preparation time, nearest pickup point
- **Table Reservations**: graphical layout (2/4/6/8 seats), accept/reject with reason, dedicated chat thread
- **Ramadan Module**: separate floor layout, platter menu, time slots (e.g., 5:30-7 PM), advance payment condition, confirmation notifications
- **Employee Management**: roles (chef, kitchen staff, waiter, cashier, delivery, cleaner, security, supervisor), daily attendance (present/absent/late/leave/half-day)
- **Rider Features**: dynamic branch selection (not fixed), branch switching, dedicated manager chat, dedicated customer chat, GPS stub, online/offline, commission tracking
- **UI/UX**: exact copy from WhatsApp reference image — dark theme (`#0c0c0e`), amber glow (`#f5a623`), red accent (`#e8192c`), fonts `DM Sans` + `Barlow Condensed`
- **Same Login Page**: all 7 roles use `auth/login.blade.php`

## 🔑 Demo Accounts

All accounts use the same login URL: `http://localhost/login`

| Role | Email | Password | Access |
|---|---|---|---|
| Super Admin | super@mad.delivery | super123 | All branches, products, reports, attendance, coins |
| Management | management@mad.delivery | mgmt123 | Business performance, reports, analytics |
| Branch Manager | branch@mad.delivery | branch123 | Own branch orders, riders, delivery zone, table layout, reservations, employees |
| Accounts | accounts@mad.delivery | accounts123 | Payments, rider commission, withdrawals, reports |
| Marketing | marketing@mad.delivery | marketing123 | Campaigns, coupons, promotions, notifications |
| Rider | rider@mad.delivery | rider123 | Dynamic branch selection, orders, GPS, chat, attendance |
| Customer | customer@mad.delivery | customer123 | Browse/order, tracking, feedback, complaints |

## 🛠 Tech Stack

- **Backend**: PHP 8.2+, Laravel 11, Blade, MySQL
- **Frontend**: Blade server-rendered (same login/home design copied from WhatsApp image)
- **UI**: Tailwind CSS (CDN), DM Sans + Barlow Condensed (Google Fonts)
- **Design Reference**: `index.html` (original 1.2MB minified React bundle)

## 📚 Documentation

- `documentation/RUN_PROJECT.md` — Step-by-step setup guide
- `documentation/PROJECT_OVERVIEW.md` — Project summary, roles, database structure
- `documentation/API_DOCUMENTATION.md` — Internal routes & controllers

## 📊 Database

- `database/schema.sql` — Full database schema
- `database/seed_data_demo_accounts.json` — Demo account credentials
- `database/migrations_copy/` — Migration files (copied from `backend/database/migrations/`)

## ✅ Quality Checklist

- [x] Professional folder structure (`backend/`, `frontend/`, `database/`, `documentation/`)
- [x] Professional `README.md` with installation, features, demo accounts
- [x] `.env.example` provided
- [x] All 7 roles have working demo accounts
- [x] No broken links / missing templates / missing controllers
- [x] All migrations and schema files present
- [x] Backend runs independently in `backend/`
- [x] Frontend assets separated in `frontend/`

## 📄 License

This project is part of the MAD-Delivery-V.2 repository (`https://github.com/RobinBD24/MAD-Delivery-V.2`).
