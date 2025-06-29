-- Create database if not exists
CREATE DATABASE IF NOT EXISTS warung_xyz;
USE warung_xyz;

-- Create users table
CREATE TABLE users (
    id_user INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') NOT NULL,
    nama_lengkap VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create kategori_menu table
CREATE TABLE kategori_menu (
    id_kategori INT PRIMARY KEY AUTO_INCREMENT,
    nama_kategori VARCHAR(50) NOT NULL,
    deskripsi TEXT
);

-- Create menu table
CREATE TABLE menu (
    id_menu INT PRIMARY KEY AUTO_INCREMENT,
    nama_menu VARCHAR(100) NOT NULL,
    harga DECIMAL(10,2) NOT NULL,
    id_kategori INT,
    gambar VARCHAR(255),
    deskripsi TEXT,
    status ENUM('tersedia', 'habis') DEFAULT 'tersedia',
    FOREIGN KEY (id_kategori) REFERENCES kategori_menu(id_kategori) ON DELETE SET NULL
);

-- Create pesanan table
CREATE TABLE pesanan (
    id_pesanan INT PRIMARY KEY AUTO_INCREMENT,
    nama_pelanggan VARCHAR(100) NOT NULL,
    id_menu INT,
    jumlah INT NOT NULL,
    total_harga DECIMAL(10,2) NOT NULL,
    no_hp VARCHAR(15) NOT NULL,
    tanggal_pesanan TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status_pesanan ENUM('pending', 'diproses', 'selesai', 'dibatalkan') DEFAULT 'pending',
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu) ON DELETE SET NULL
);

-- Create detail_pesanan table (for future use with multiple items per order)
CREATE TABLE detail_pesanan (
    id_detail INT PRIMARY KEY AUTO_INCREMENT,
    id_pesanan INT NOT NULL,
    id_menu INT,
    jumlah INT NOT NULL,
    harga_satuan DECIMAL(10,2) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan) ON DELETE CASCADE,
    FOREIGN KEY (id_menu) REFERENCES menu(id_menu) ON DELETE SET NULL
);

-- Create file_upload table
CREATE TABLE file_upload (
    id_file INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    nama_file VARCHAR(255) NOT NULL,
    tanggal_upload TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (username) REFERENCES users(username) ON DELETE CASCADE
);

-- Insert sample data

-- Insert admin user
INSERT INTO users (username, password, role, nama_lengkap) VALUES
('admin', 'admin123', 'admin', 'Administrator');

-- Insert sample categories
INSERT INTO kategori_menu (nama_kategori, deskripsi) VALUES
('Makanan Utama', 'Menu makanan utama warung'),
('Makanan Ringan', 'Menu makanan ringan dan snack'),
('Minuman', 'Menu minuman segar');

-- Insert sample menu items
INSERT INTO menu (nama_menu, harga, id_kategori, gambar, deskripsi) VALUES
('Nasi Goreng', 15000, 1, 'nasi-goreng.jpg.jpeg', 'Nasi goreng spesial dengan telur dan ayam'),
('Mie Ayam', 12000, 1, 'mie-ayam.jpg.jpeg', 'Mie ayam dengan topping ayam cincang'),
('Ayam Geprek', 18000, 1, 'ayam-geprek.jpg.jpeg', 'Ayam geprek pedas dengan sambal'),
('Sate Ayam', 20000, 1, 'sate-ayam.jpg.jpeg', 'Sate ayam dengan bumbu kacang'),
('Kentang Goreng', 10000, 2, 'kentang-goreng.jpg', 'Kentang goreng crispy'),
('Roti Bakar', 8000, 2, 'roti-bakar.jpg', 'Roti bakar dengan berbagai topping'),
('Es Teh Manis', 3000, 3, 'esteh-manis.jpg.jpg', 'Es teh manis segar'),
('Jus Alpukat', 10000, 3, 'jus-alpukat.jpg.jpg', 'Jus alpukat segar dengan susu'),
('Good Day Freeze', 7000, 3, 'goodday-freeze.jpg.jpg', 'Kopi dingin Good Day'),
('Nutrisari', 5000, 3, 'nutrisari.jpg.jpg', 'Minuman segar Nutrisari');
