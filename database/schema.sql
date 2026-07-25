-- MAD Delivery Database Schema
-- Generated for MAD-Delivery-V.2

CREATE DATABASE IF NOT EXISTS mad_delivery CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mad_delivery;

CREATE TABLE users (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255) UNIQUE,
  password VARCHAR(255),
  contact VARCHAR(255),
  address TEXT,
  profile_image VARCHAR(255),
  role VARCHAR(50) DEFAULT 'customer',
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE branches (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  slug VARCHAR(255) UNIQUE,
  location VARCHAR(255),
  brand_type ENUM('cheez','madchef','combined') DEFAULT 'combined',
  delivery_zone TEXT,
  pickup_points TEXT,
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE categories (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  slug VARCHAR(255) UNIQUE,
  brand ENUM('cheez','madchef','both') DEFAULT 'both',
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE products (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  slug VARCHAR(255) UNIQUE,
  category VARCHAR(255),
  category_id BIGINT UNSIGNED,
  branch_id BIGINT UNSIGNED,
  brand_tag VARCHAR(20),
  price DECIMAL(10,2),
  description TEXT,
  image_path VARCHAR(255),
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  FOREIGN KEY (branch_id) REFERENCES branches(id) ON DELETE SET NULL,
  FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

CREATE TABLE product_variations (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id BIGINT UNSIGNED,
  size_name VARCHAR(255),
  price DECIMAL(10,2),
  is_available TINYINT(1) DEFAULT 1,
  reason TEXT,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE orders (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED,
  branch_id BIGINT UNSIGNED,
  order_number VARCHAR(255),
  status VARCHAR(50) DEFAULT 'pending',
  total_amount DECIMAL(10,2),
  delivery_address TEXT,
  payment_method VARCHAR(50),
  delivery_time_estimate VARCHAR(50),
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE order_items (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  order_id BIGINT UNSIGNED,
  product_id BIGINT UNSIGNED,
  variation_id BIGINT UNSIGNED,
  quantity INT DEFAULT 1,
  unit_price DECIMAL(10,2),
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE roles (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  slug VARCHAR(255) UNIQUE,
  permissions JSON,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE permissions (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255),
  slug VARCHAR(255) UNIQUE,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE role_user (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  role_id BIGINT UNSIGNED,
  user_id BIGINT UNSIGNED,
  FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE riders (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED,
  branch_id BIGINT UNSIGNED,
  vehicle_type VARCHAR(50),
  license_number VARCHAR(255),
  is_active TINYINT(1) DEFAULT 1,
  is_online TINYINT(1) DEFAULT 0,
  current_location_lat DECIMAL(10,8),
  current_location_lng DECIMAL(11,8),
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE deliveries (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  rider_id BIGINT UNSIGNED,
  order_id BIGINT UNSIGNED,
  status VARCHAR(50),
  pickup_time TIMESTAMP NULL,
  delivery_time TIMESTAMP NULL,
  distance_traveled DECIMAL(10,2),
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE complaints (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED,
  branch_id BIGINT UNSIGNED,
  recipient_role VARCHAR(50),
  subject VARCHAR(255),
  message TEXT,
  status ENUM('pending','in_progress','resolved','closed') DEFAULT 'pending',
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE notifications (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED,
  title VARCHAR(255),
  message TEXT,
  is_read TINYINT(1) DEFAULT 0,
  type VARCHAR(50),
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE attendance (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  employee_id BIGINT UNSIGNED,
  date DATE,
  status ENUM('present','absent','late','leave','half_day') DEFAULT 'present',
  notes TEXT,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE table_layouts (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  branch_id BIGINT UNSIGNED,
  table_name VARCHAR(255),
  table_identifier VARCHAR(255),
  seat_capacity INT DEFAULT 4,
  status ENUM('available','occupied','out_of_service') DEFAULT 'available',
  location_description TEXT,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  FOREIGN KEY (branch_id) REFERENCES branches(id) ON DELETE CASCADE
);

CREATE TABLE table_reservations (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  branch_id BIGINT UNSIGNED,
  table_layout_id BIGINT UNSIGNED,
  customer_id BIGINT UNSIGNED,
  reservation_date DATE,
  reservation_time TIME,
  guest_count INT,
  special_request TEXT,
  status ENUM('pending','accepted','rejected','confirmed','cancelled') DEFAULT 'pending',
  rejection_reason TEXT,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  FOREIGN KEY (branch_id) REFERENCES branches(id) ON DELETE CASCADE,
  FOREIGN KEY (table_layout_id) REFERENCES table_layouts(id) ON DELETE CASCADE
);

CREATE TABLE ramadan_reservations (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  branch_id BIGINT UNSIGNED,
  table_layout_id BIGINT UNSIGNED,
  customer_id BIGINT UNSIGNED,
  reservation_date DATE,
  time_slot TIME,
  guest_count INT,
  platter_name VARCHAR(255),
  platter_price DECIMAL(10,2),
  payment_status ENUM('pending','paid','failed','refunded') DEFAULT 'pending',
  payment_method VARCHAR(50),
  status ENUM('pending','confirmed','cancelled','completed') DEFAULT 'pending',
  advance_payment_required TINYINT(1) DEFAULT 0,
  notes TEXT,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  FOREIGN KEY (branch_id) REFERENCES branches(id) ON DELETE CASCADE
);

CREATE TABLE chat_sessions (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  session_type ENUM('rider_customer','rider_manager','branch_customer_reservation','reservation_chat'),
  branch_id BIGINT UNSIGNED,
  rider_id BIGINT UNSIGNED,
  customer_id BIGINT UNSIGNED,
  manager_id BIGINT UNSIGNED,
  order_id BIGINT UNSIGNED,
  reservation_id BIGINT UNSIGNED,
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE chat_messages (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  chat_session_id BIGINT UNSIGNED,
  sender_id BIGINT UNSIGNED,
  message TEXT,
  is_read TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  FOREIGN KEY (chat_session_id) REFERENCES chat_sessions(id) ON DELETE CASCADE
);

CREATE TABLE employees (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  branch_id BIGINT UNSIGNED,
  user_id BIGINT UNSIGNED,
  name VARCHAR(255),
  contact VARCHAR(255),
  photo_path VARCHAR(255),
  role ENUM('kitchen_staff','chef','waiter','cashier','delivery_staff','cleaner','security','supervisor','branch_manager'),
  join_date DATE,
  is_active TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  FOREIGN KEY (branch_id) REFERENCES branches(id) ON DELETE CASCADE
);
