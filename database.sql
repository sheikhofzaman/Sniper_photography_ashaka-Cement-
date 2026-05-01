-- Sniper Photography Database Schema
-- Created by Abubakar Musa
-- Full-stack Photography Website with Paystack Payment

CREATE DATABASE IF NOT EXISTS sniper_photography CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sniper_photography;

-- Admin Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    role ENUM('admin', 'editor') DEFAULT 'admin',
    avatar VARCHAR(255) DEFAULT NULL,
    last_login DATETIME DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Bookings Table (Updated with payment fields)
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100) NOT NULL,
    client_email VARCHAR(100) NOT NULL,
    client_phone VARCHAR(20) NOT NULL,
    event_date DATE NOT NULL,
    event_time TIME,
    service_type VARCHAR(50) NOT NULL,
    location VARCHAR(255),
    message TEXT,
    status ENUM('pending', 'approved', 'completed', 'cancelled') DEFAULT 'pending',
    price DECIMAL(10,2) DEFAULT 0.00,
    notes TEXT,
    -- Payment fields
    payment_status ENUM('unpaid', 'paid', 'refunded', 'failed') DEFAULT 'unpaid',
    payment_method VARCHAR(50) DEFAULT NULL,
    payment_reference VARCHAR(100) DEFAULT NULL,
    payment_amount DECIMAL(10,2) DEFAULT 0.00,
    paid_at DATETIME DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Payments Table (Transaction log)
CREATE TABLE IF NOT EXISTS payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_id INT NOT NULL,
    reference VARCHAR(100) NOT NULL UNIQUE,
    amount DECIMAL(10,2) NOT NULL,
    email VARCHAR(100) NOT NULL,
    status ENUM('pending', 'success', 'failed', 'abandoned') DEFAULT 'pending',
    gateway_response TEXT,
    paid_at DATETIME DEFAULT NULL,
    channel VARCHAR(50),
    card_type VARCHAR(50),
    bank VARCHAR(100),
    last4 VARCHAR(4),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (booking_id) REFERENCES bookings(id) ON DELETE CASCADE
);

-- Services Table
CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    duration VARCHAR(50),
    features TEXT,
    icon VARCHAR(50),
    is_active BOOLEAN DEFAULT TRUE,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Gallery Table
CREATE TABLE IF NOT EXISTS gallery (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    category VARCHAR(50) NOT NULL,
    image_path VARCHAR(255) NOT NULL,
    thumbnail_path VARCHAR(255),
    is_featured BOOLEAN DEFAULT FALSE,
    sort_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Portfolio Categories
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    slug VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    icon VARCHAR(50),
    sort_order INT DEFAULT 0
);

-- Testimonials Table
CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100) NOT NULL,
    client_title VARCHAR(100),
    content TEXT NOT NULL,
    rating INT DEFAULT 5,
    client_image VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Contact Messages Table
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(200),
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Site Settings Table
CREATE TABLE IF NOT EXISTS settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    setting_key VARCHAR(50) NOT NULL UNIQUE,
    setting_value TEXT,
    setting_group VARCHAR(50) DEFAULT 'general'
);

-- Paystack Settings
CREATE TABLE IF NOT EXISTS paystack_settings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    public_key VARCHAR(255) NOT NULL,
    secret_key VARCHAR(255) NOT NULL,
    is_live BOOLEAN DEFAULT FALSE,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert default admin - Password: admin123
INSERT INTO users (username, email, password_hash, full_name, role) VALUES 
('admin', 'abubakar@sniperphotography.com', '$2y$10$N9qo8uLOickgx2ZMRZoMy.MqrqhmM6JGKpS4G3R1G2JH8YpfB0Bqy', 'Abubakar Musa', 'admin');

-- Insert default categories
INSERT INTO categories (name, slug, description, icon) VALUES
('Weddings', 'weddings', 'Beautiful wedding photography capturing your special day', 'fa-ring'),
('Events', 'events', 'Corporate and social event coverage', 'fa-calendar'),
('Portraits', 'portraits', 'Professional portrait sessions', 'fa-user'),
('Nature', 'nature', 'Stunning nature and landscape photography', 'fa-leaf'),
('Fashion', 'fashion', 'High-end fashion and editorial shoots', 'fa-tshirt'),
('Architecture', 'architecture', 'Architectural and interior photography', 'fa-building');

-- Insert default services
INSERT INTO services (title, description, price, duration, features, icon, sort_order) VALUES
('Wedding Photography', 'Complete wedding day coverage including ceremony, reception, and portraits. Includes edited digital gallery and print rights.', 150000.00, '8-10 hours', 'Professional editing, Online gallery, Print rights, Second photographer option', 'fa-ring', 1),
('Studio Portrait Session', 'Professional studio portrait session with multiple outfit changes and backdrops. Perfect for headshots, family portraits, or creative shoots.', 50000.00, '2 hours', 'Multiple outfits, Professional lighting, Retouched images, Digital delivery', 'fa-camera', 2),
('Event Coverage', 'Full event coverage for corporate events, parties, conferences, and celebrations. Includes candid shots and group photos.', 75000.00, '4-6 hours', 'Candid photography, Group shots, Quick turnaround, Social media ready', 'fa-calendar', 3),
('Outdoor Photo Shoot', 'Natural light photography at location of your choice. Ideal for engagement shoots, family photos, or creative sessions.', 60000.00, '3 hours', 'Location scouting, Natural lighting, Multiple locations, Sunset option', 'fa-sun', 4),
('Product Photography', 'High-quality product photography for e-commerce, catalogs, and advertising. Clean backgrounds and professional styling.', 40000.00, 'Per product', 'White background, Lifestyle shots, Color correction, Web-ready files', 'fa-box', 5);

-- Insert default settings
INSERT INTO settings (setting_key, setting_value, setting_group) VALUES
('site_title', 'Sniper Photography', 'general'),
('site_tagline', 'Capturing Moments with Precision', 'general'),
('owner_name', 'Abubakar Musa', 'general'),
('owner_title', 'Professional Photographer & Full-Stack Developer', 'general'),
('contact_email', 'abubakar@sniperphotography.com', 'contact'),
('contact_phone', '+234 800 000 0000', 'contact'),
('contact_address', 'Lagos, Nigeria', 'contact'),
('social_instagram', 'https://instagram.com/sniperphotography', 'social'),
('social_facebook', 'https://facebook.com/sniperphotography', 'social'),
('social_twitter', 'https://twitter.com/sniperphotography', 'social'),
('social_whatsapp', 'https://wa.me/2348000000000', 'social'),
('currency', '₦', 'general'),
('booking_open', 'true', 'booking');

-- Insert default Paystack test keys (REPLACE WITH YOUR OWN!)
INSERT INTO paystack_settings (public_key, secret_key, is_live) VALUES
('pk_test_your_public_key_here', 'sk_test_your_secret_key_here', FALSE);
