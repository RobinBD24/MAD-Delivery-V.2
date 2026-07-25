# Requirements Implementation Map

This file maps the full user requirements to the implemented backend.

## Database Schema
- `roles` -> super_admin, management, branch_manager, accounts, marketing, rider, customer
- `permissions` -> grouped by module (orders, delivery, payments, inventory, complaints, reports, notifications)
- `role_user` -> many-to-many between users and roles
- `riders` -> rider profile with vehicle, status, balance, location
- `deliveries` -> delivery tracking with GPS route, status, timestamps
- `complaints` -> complaint management with recipient roles
- `notifications` -> push notification data
- `attendance` -> daily attendance tracking

## Controllers Implemented
- `SuperAdminController` (customers, complaints, reports, coins, riders, branches)
- `BranchManagerController` (orders, riders, products, attendance, complaints, reports, bookings)
- `RiderController` (orders, delivery, earnings, attendance, complaints, profile)
- `CustomerController` (dashboard, menu, orders, profile, rewards, complaints, notifications)
- `AccountsController` (payments, commissions, withdrawals, reports, refunds, settlements)
- `MarketingController` (campaigns, coupons, audience, notifications, reports)
- `ManagementController` (performance, branches, reports, analytics, complaints)

## Routes
All role routes are protected by `auth` middleware and mapped under `/super-admin`, `/branch-manager`, etc.

## Middleware
- `CheckRole` -> RBAC middleware enforcing role access
- `Authenticate` / `RedirectIfAuthenticated` -> auth flow
- `EnsureAdmin` -> admin-level access

## Data
- `data/menu_data.php` -> 52 Madchef + 47 Cheez! Pizza products (99 total) from images/
- All product images, brand logos mapped

## UI/UX Design Copied from Project
The Blade layout (`layout.blade.php`) uses the same dark theme variables (`--mad-red`, `--bg`, `--surface`, etc.), fonts (`DM Sans`, `Barlow Condensed`), and styling patterns from the original `index.html` frontend.

## Note on Advanced Features
Features requiring external services (live GPS tracking, real-time push notifications, payment gateway integration) are implemented as database structures and controller stubs ready for integration with:
- Google Maps API (delivery routing)
- Firebase / OneSignal (notifications)
- Stripe / bKash / PayPal (payments)
- WebSocket / Pusher (real-time updates)
