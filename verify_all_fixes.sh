#!/bin/bash
# Verification script — checks all backend fixes

echo "=== MAD DELIVERY BACKEND — FIX VERIFICATION ==="
echo ""

echo "[STRUCTURE] Checking directories..."
for dir in backend/app backend/app/Http backend/app/Http/Controllers backend/app/Http/Middleware backend/app/Http/Controllers/Auth backend/app/Http/Controllers/Admin backend/app/Models backend/routes backend/config backend/bootstrap backend/storage/app backend/storage/framework/cache backend/storage/framework/sessions backend/storage/framework/views backend/storage/logs backend/public backend/resources/views/auth backend/resources/views/orders backend/resources/views/admin backend/resources/views/menu backend/resources/views/cart backend/database/migrations backend/database/seeders; do
  if [ -d "$dir" ]; then
    echo "  OK: $dir"
  else
    echo "  MISSING: $dir"
  fi
done

echo ""
echo "[FILES] Checking core files..."
for file in backend/routes/web.php backend/routes/console.php backend/bootstrap/app.php backend/config/app.php backend/config/auth.php backend/app/Http/Kernel.php backend/app/Http/Middleware/Authenticate.php backend/app/Http/Middleware/RedirectIfAuthenticated.php backend/app/Http/Middleware/EnsureAdmin.php backend/app/Http/Middleware/VerifyCsrfToken.php backend/app/Http/Middleware/EncryptCookies.php backend/app/Http/Middleware/TrustProxies.php backend/app/Http/Middleware/AddQueuedCookiesToResponse.php backend/app/Http/Middleware/StartSession.php backend/app/Http/Middleware/ShareErrorsFromSession.php backend/data/menu_data.php backend/convert_data.php backend/.env backend/.gitignore; do
  if [ -f "$file" ]; then
    echo "  OK: $file"
  else
    echo "  MISSING: $file"
  fi
done

echo ""
echo "[CONTROLLERS] Checking controllers..."
for f in HomeController MenuController CartController OrderController LoginController RegisterController DashboardController ProductController OrderAdminController; do
  if [ -f "backend/app/Http/Controllers/$f.php" ]; then
    echo "  OK: $f"
  elif echo "$f" | grep -q "Login\|Register"; then
    if [ -f "backend/app/Http/Controllers/Auth/$f.php" ]; then echo "  OK: Auth/$f"; else echo "  MISSING: Auth/$f"; fi
  elif echo "$f" | grep -q "Dashboard\|Product\|OrderAdmin"; then
    if [ -f "backend/app/Http/Controllers/Admin/$f.php" ]; then echo "  OK: Admin/$f"; else echo "  MISSING: Admin/$f"; fi
  else
    echo "  MISSING: $f"
  fi
done

echo ""
echo "[MODELS] Checking models..."
for m in User Product Order OrderItem; do
  if [ -f "backend/app/Models/$m.php" ]; then echo "  OK: $m"; else echo "  MISSING: $m"; fi
done

echo ""
echo "[VIEWS] Checking Blade templates..."
for v in layouts/app auth/login auth/register home menu/index menu/show cart/index orders/checkout orders/index orders/show admin/dashboard admin/products/index admin/products/create admin/products/edit admin/orders/index admin/orders/show; do
  if [ -f "backend/resources/views/$v.blade.php" ]; then
    echo "  OK: $v.blade.php"
  else
    echo "  MISSING: $v.blade.php"
  fi
done

echo ""
echo "[DATA] Data conversion..."
if [ -f "backend/data/menu_data.php" ]; then
  count=$(grep -c "'name'=>'" backend/data/menu_data.php || echo "0")
  echo "  OK: menu_data.php ($count products mapped)"
else
  echo "  MISSING: data/menu_data.php"
fi
if [ -f "backend/convert_data.php" ]; then echo "  OK: convert_data.php"; else echo "  MISSING: convert_data.php"; fi

echo ""
echo "=== VERIFICATION COMPLETE ==="
