-- MAD-Delivery-V.2 Database Backup
-- Generated: 2026-07-25
-- Database: mad_delivery

-- Demo Accounts Seed (minimal - use demo accounts from seed_data_demo_accounts.json)
INSERT IGNORE INTO users (id, name, email, password, role, is_active, created_at) VALUES
(1, 'Robin Super', 'super@mad.delivery', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'super_admin', 1, NOW()),
(2, 'Robin Management', 'management@mad.delivery', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'management', 1, NOW()),
(3, 'Robin Branch', 'branch@mad.delivery', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'branch_manager', 1, NOW()),
(4, 'Robin Accounts', 'accounts@mad.delivery', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'accounts', 1, NOW()),
(5, 'Robin Marketing', 'marketing@mad.delivery', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'marketing', 1, NOW()),
(6, 'Robin Rider', 'rider@mad.delivery', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rider', 1, NOW()),
(7, 'Robin Customer', 'customer@mad.delivery', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'customer', 1, NOW());

-- Note: Passwords in JSON are plaintext for documentation; in production use hashed passwords.
