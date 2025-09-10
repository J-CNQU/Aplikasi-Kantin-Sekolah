-- ==============================
-- Buat database kalau belum ada
-- ==============================
CREATE DATABASE IF NOT EXISTS cafeteria;
USE cafeteria;

-- ==============================
-- Tabel Users
-- ==============================
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin','user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ==============================
-- Tabel Menu
-- ==============================
CREATE TABLE IF NOT EXISTS menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_makanan VARCHAR(100),
    harga INT,
    stok INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ==============================
-- Tabel Pesanan
-- ==============================
CREATE TABLE IF NOT EXISTS pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    menu_id INT,
    status ENUM('proses','selesai') DEFAULT 'proses',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE
);

-- ==============================
-- Tabel Detail Pesanan
-- ==============================
CREATE TABLE IF NOT EXISTS detail_pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pesanan_id INT,
    menu_id INT,
    jumlah INT,
    subtotal INT,
    FOREIGN KEY (pesanan_id) REFERENCES pesanan(id) ON DELETE CASCADE,
    FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE
);

-- ==============================
-- Tabel Transaksi
-- ==============================
CREATE TABLE IF NOT EXISTS transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pesanan_id INT,
    total INT,
    metode_pembayaran ENUM('cash','qris','debit'),
    status_pembayaran ENUM('belum','lunas') DEFAULT 'belum',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (pesanan_id) REFERENCES pesanan(id) ON DELETE CASCADE
);

-- ==============================
-- Tabel Stok Log (opsional)
-- ==============================
CREATE TABLE IF NOT EXISTS stok_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    menu_id INT,
    perubahan INT, -- bisa minus kalau pengurangan
    keterangan VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (menu_id) REFERENCES menu(id) ON DELETE CASCADE
);

-- ==============================
-- Tabel Produk (opsional)
-- ==============================
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0
);

-- ==============================
-- Tabel Orders (opsional)
-- ==============================
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('pending','processing','completed','cancelled') DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- ==============================
-- Detail Order Items (opsional)
-- ==============================
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- ==============================
-- Sample data awal (opsional)
-- ==============================
INSERT INTO menu (nama_makanan, harga, stok) VALUES
('Nasi Goreng', 15000, 10),
('Mie Ayam', 12000, 15),
('Es Teh', 5000, 20);

INSERT INTO users (username, password, role) VALUES
('admin', '$2y$10$xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'admin'), 
('user1', '$2y$10$xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'user');

-- Catatan: password di atas harus diganti dengan hash password valid (gunakan password_hash di PHP)
