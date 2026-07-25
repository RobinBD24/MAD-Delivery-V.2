# API_DOCUMENTATION.md

## MAD-Delivery-V.2 — Internal API / Controller Routes

This document describes the internal web routes and controller endpoints used by the Blade server-rendered application.

### Base URL
`http://localhost/` (development) / production domain configured in `.env` (`APP_URL`)

### Authentication
- Login: `GET /login`
- Register: `GET /register`
- Logout: `POST /logout`
- All role routes protected by `auth` middleware; admin routes protected by `auth` + `admin`; role-specific routes use `CheckRole` middleware implicitly via controller logic.

### Public Routes
- `GET /` → Home
- `GET /menu` → Menu
- `GET /menu/{category}` → Category
- `GET /item/{slug}` → Product detail

### Auth Routes
- `GET /register`
- `POST /register`
- `GET /login`
- `POST /login`
- `POST /logout`

### Authenticated User Routes
- `GET /cart`
- `POST /cart/add`
- `POST /cart/update`
- `POST /cart/remove`
- `GET /checkout`
- `POST /checkout`
- `GET /orders`
- `GET /orders/{order}`

### Admin Routes (`auth` + `admin` middleware, prefix `/admin`)
- `GET /admin/` → Dashboard
- Resource: `/admin/products` (index, create, store, edit, update, destroy)
- `GET /admin/products/{product}/variations/{variation}/edit`
- `PUT /admin/products/{product}/variations/{variation}`
- `DELETE /admin/products/{product}/variations/{variation}`
- Resource: `/admin/orders` (index, show, update only)
- Branch routes: `/admin/branches` (index, create, store, edit, update, destroy)

### Role-Based Routes (`auth` middleware)
- `/super-admin/*`: index, customers, complaints, reports, coins, riders, branches, products, attendance
- `/branch-manager/*`: index, orders, riders, products, delivery-config, estimated-time, table-layout, reservations, ramadan-reservations, employees, bookings
- `/rider/*`: index, orders, select-branch, go-offline, switch-branch, manager-chat, send-manager-message, customer-chat/{orderId}, send-customer-message/{orderId}
- `/customer/*`: index
- `/accounts/*`: index
- `/marketing/*`: index
- `/management/*`: index

### Controllers (Key)
- `App\Http\Controllers\Admin\ProductController`
- `App\Http\Controllers\Admin\BranchController`
- `App\Http\Controllers\Roles\SuperAdminController`
- `App\Http\Controllers\Roles\BranchManagerController`
- `App\Http\Controllers\Roles\RiderController`
- `App\Http\Controllers\Roles\AccountsController`
- `App\Http\Controllers\Roles\MarketingController`
- `App\Http\Controllers\Roles\ManagementController`
- `App\Http\Controllers\Roles\CustomerController`

### Middleware
- `auth`: requires login
- `admin`: requires admin-level access
- `CheckRole.php`: validates role slug against allowed list for role-based routes
