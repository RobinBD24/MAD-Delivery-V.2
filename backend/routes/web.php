<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/{category}', [MenuController::class, 'category'])->name('menu.category');
Route::get('/item/{slug}', [MenuController::class, 'show'])->name('menu.show');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::get('products/{product}/variations/{variation}/edit', [ProductController::class, 'variationEdit'])->name('products.variations.edit');
    Route::put('products/{product}/variations/{variation}', [ProductController::class, 'variationUpdate'])->name('products.variations.update');
    Route::delete('products/{product}/variations/{variation}', [ProductController::class, 'variationDestroy'])->name('products.variations.destroy');

    Route::resource('orders', OrderAdminController::class)->only(['index', 'show', 'update']);

    // Branch management
    Route::get('branches', [\App\Http\Controllers\Admin\BranchController::class, 'index'])->name('branches.index');
    Route::get('branches/create', [\App\Http\Controllers\Admin\BranchController::class, 'create'])->name('branches.create');
    Route::post('branches', [\App\Http\Controllers\Admin\BranchController::class, 'store'])->name('branches.store');
    Route::get('branches/{branch}/edit', [\App\Http\Controllers\Admin\BranchController::class, 'edit'])->name('branches.edit');
    Route::put('branches/{branch}', [\App\Http\Controllers\Admin\BranchController::class, 'update'])->name('branches.update');
    Route::delete('branches/{branch}', [\App\Http\Controllers\Admin\BranchController::class, 'destroy'])->name('branches.destroy');
});

// Role-based routes
Route::middleware('auth')->group(function () {
    Route::prefix('super-admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\Roles\SuperAdminController::class, 'index'])->name('super-admin.index');
        Route::get('/customers', [\App\Http\Controllers\Roles\SuperAdminController::class, 'customers']);
        Route::get('/complaints', [\App\Http\Controllers\Roles\SuperAdminController::class, 'complaints']);
        Route::get('/reports', [\App\Http\Controllers\Roles\SuperAdminController::class, 'reports']);
        Route::get('/coins', [\App\Http\Controllers\Roles\SuperAdminController::class, 'coins']);
        Route::get('/riders', [\App\Http\Controllers\Roles\SuperAdminController::class, 'riders']);
        Route::get('/branches', [\App\Http\Controllers\Roles\SuperAdminController::class, 'branches']);
        Route::get('/products', [\App\Http\Controllers\Roles\SuperAdminController::class, 'products']);
        Route::get('/attendance', [\App\Http\Controllers\Roles\SuperAdminController::class, 'attendance']);
    });

    Route::prefix('branch-manager')->group(function () {
        Route::get('/', [\App\Http\Controllers\Roles\BranchManagerController::class, 'index']);
        Route::get('/orders', [\App\Http\Controllers\Roles\BranchManagerController::class, 'orders']);
        Route::get('/riders', [\App\Http\Controllers\Roles\BranchManagerController::class, 'riders']);
        Route::get('/products', [\App\Http\Controllers\Roles\BranchManagerController::class, 'products']);
        Route::get('/delivery-config', [\App\Http\Controllers\Roles\BranchManagerController::class, 'deliveryConfig']);
        Route::post('/update-delivery-config', [\App\Http\Controllers\Roles\BranchManagerController::class, 'updateDeliveryConfig']);
        Route::get('/estimated-time', [\App\Http\Controllers\Roles\BranchManagerController::class, 'estimatedTime']);
        Route::post('/update-estimated-time', [\App\Http\Controllers\Roles\BranchManagerController::class, 'updateEstimatedTime']);
        Route::get('/table-layout', [\App\Http\Controllers\Roles\BranchManagerController::class, 'tableLayout']);
        Route::post('/store-table-layout', [\App\Http\Controllers\Roles\BranchManagerController::class, 'storeTableLayout']);
        Route::put('/update-table-layout/{id}', [\App\Http\Controllers\Roles\BranchManagerController::class, 'updateTableLayout']);
        Route::get('/reservations', [\App\Http\Controllers\Roles\BranchManagerController::class, 'reservations']);
        Route::put('/update-reservation/{id}', [\App\Http\Controllers\Roles\BranchManagerController::class, 'updateReservation']);
        Route::get('/ramadan-reservations', [\App\Http\Controllers\Roles\BranchManagerController::class, 'ramadanReservations']);
        Route::put('/update-ramadan-reservation/{id}', [\App\Http\Controllers\Roles\BranchManagerController::class, 'updateRamadanReservation']);
        Route::get('/employees', [\App\Http\Controllers\Roles\BranchManagerController::class, 'employees']);
        Route::post('/store-employee', [\App\Http\Controllers\Roles\BranchManagerController::class, 'storeEmployee']);
        Route::put('/update-employee/{id}', [\App\Http\Controllers\Roles\BranchManagerController::class, 'updateEmployee']);
        Route::get('/bookings', [\App\Http\Controllers\Roles\BranchManagerController::class, 'bookings']);
    });

    Route::prefix('rider')->group(function () {
        Route::get('/', [\App\Http\Controllers\Roles\RiderController::class, 'index']);
        Route::get('/orders', [\App\Http\Controllers\Roles\RiderController::class, 'orders']);
        Route::post('/select-branch', [\App\Http\Controllers\Roles\RiderController::class, 'selectBranch']);
        Route::post('/go-offline', [\App\Http\Controllers\Roles\RiderController::class, 'goOffline']);
        Route::post('/switch-branch', [\App\Http\Controllers\Roles\RiderController::class, 'switchBranch']);
        Route::get('/manager-chat', [\App\Http\Controllers\Roles\RiderController::class, 'managerChat']);
        Route::post('/send-manager-message', [\App\Http\Controllers\Roles\RiderController::class, 'sendManagerMessage']);
        Route::get('/customer-chat/{orderId}', [\App\Http\Controllers\Roles\RiderController::class, 'customerChat']);
        Route::post('/send-customer-message/{orderId}', [\App\Http\Controllers\Roles\RiderController::class, 'sendCustomerMessage']);
    });

    Route::prefix('customer')->group(function () {
        Route::get('/', [\App\Http\Controllers\Roles\CustomerController::class, 'index']);
    });

    Route::prefix('accounts')->group(function () {
        Route::get('/', [\App\Http\Controllers\Roles\AccountsController::class, 'index']);
    });

    Route::prefix('marketing')->group(function () {
        Route::get('/', [\App\Http\Controllers\Roles\MarketingController::class, 'index']);
    });

    Route::prefix('management')->group(function () {
        Route::get('/', [\App\Http\Controllers\Roles\ManagementController::class, 'index']);
    });
});
