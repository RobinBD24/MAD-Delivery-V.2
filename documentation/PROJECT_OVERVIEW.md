# PROJECT_OVERVIEW.md

## MAD-Delivery-V.2
Dhaka food delivery platform for Cheez! Pizza & Madchef.

### Project Purpose
Complete Laravel 11 backend with full RBAC (7 roles), database schema, controllers, Blade templates, and UI/UX copied exactly from WhatsApp reference image (dark theme `#0c0c0e`, amber glow `#f5a623`, red accent `#e8192c`, fonts DM Sans + Barlow Condensed).

### Features
- 7 Roles: Super Admin, Management, Branch Manager, Accounts, Marketing, Rider, Customer
- Full RBAC middleware (`CheckRole.php`)
- Product module with categories and multi-size/price variations
- Branch management with brand type selection (cheez / madchef / combined)
- Delivery zone & nearest pickup point configuration
- Estimated preparation time for orders
- Graphical table layout & reservations (accept/reject with reason, dedicated chat thread)
- Ramadan reservation module with floor layout, time slots, platter menu, advance payment condition
- Employee management (roles + daily attendance)
- Rider dynamic branch selection + dedicated chat (manager + customer)
- GPS tracking (stub), notifications (stub), payments (stub)
- Menu data converted: 99 products (52 Madchef + 47 Pizza)

### Technologies Used
- PHP 8.2+
- Laravel 11
- Blade (server-rendered)
- MySQL
- Tailwind CSS (via CDN in layout)
- DM Sans + Barlow Condensed fonts

### Folder Structure
```
MAD-Delivery-V.2/
├── backend/              → Laravel backend (routes, controllers, models, migrations, views)
├── frontend/             → Reference frontend bundle + assets (index.html, images)
├── database/             → Schema SQL, seed data, demo accounts, migration copies
├── documentation/        → RUN_PROJECT.md, API_DOCUMENTATION.md, PROJECT_OVERVIEW.md
├── .env                  → Environment config
├── .env.example          → Template
├── .gitignore            → Ignore rules
├── README.md             → Professional documentation
├── index.html            → Original minified React bundle (design reference)
├── verify_all_fixes.sh   → Verification script
```

### User Roles & Permissions
1. **Super Admin**: approve accounts, set rider fees, see all info, block customers, send notices, view complaints, create coins, manage branches/products/reports/attendance
2. **Management**: business performance, sales reports, branch/rider/customer performance, inventory/operational statistics
3. **Branch Manager**: orders with sound, status updates, rider info/GPS, assign rider, delivery zone/time, table layout, reservations, employee management, attendance, complaints/chat
4. **Accounts**: payments, rider commission, withdrawals, financial reports, refunds, audit log
5. **Marketing**: campaigns (coupons/offers/promotions), audience segmentation, notifications, performance monitoring
6. **Rider**: login, branch selection (dynamic), assigned orders, status updates, customer/manager chat, GPS, online/offline, commission/earnings, attendance, complaints
7. **Customer**: login, browse/order, delivery zone check, nearest pickup point, tracking, profile/addresses/notifications/rewards, order history, feedback, complaints, chat

### Authentication System
- Same login page (`auth/login.blade.php`) for all 7 roles — no separate login pages per role.
- RBAC middleware (`CheckRole.php`) validates role access per route.

### Database Structure
- Users, roles, permissions, role_user
- Products, categories, product_variations
- Branches (brand_type: cheez/madchef/combined)
- Orders, order_items
- Riders, deliveries
- Complaints, notifications
- Attendance, employees
- Table layouts, table_reservations, ramadan_reservations
- Chat sessions, chat_messages

### API Summary
No public REST API exposed; system uses Blade server-rendered routes (`routes/web.php`). Internal controllers handle all logic.

### Demo Accounts (Working)
See `database/seed_data_demo_accounts.json` and `README.md`.
