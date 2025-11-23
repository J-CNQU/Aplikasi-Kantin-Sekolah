<?php
session_start();
include('config.php'); // Pastikan path ini benar! (Misalnya: ../config.php)

header('Content-Type: application/json');

// Cek apakah data POST diterima
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Metode request tidak diizinkan.']);
    exit;
}

// Cek status login (PENTING!)
if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Anda harus login untuk membuat pesanan.']);
    exit;
}

$user_id = $_SESSION['user_id']; // Ambil user_id dari sesi
$data = json_decode(file_get_contents('php://input'), true);

if (empty($data['cart']) || empty($data['totals']) || empty($data['method'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Data pesanan tidak lengkap.']);
    exit;
}

$cart_items = $data['cart'];
$totals = $data['totals'];
$payment_method = $conn->real_escape_string($data['method']);

$conn->begin_transaction();

try {
    // 1. Masukkan data ke tabel ORDERS
    $stmt_order = $conn->prepare("INSERT INTO orders (user_id, subtotal, tax, total_amount, payment_method) VALUES (?, ?, ?, ?, ?)");
    $stmt_order->bind_param("iddds", $user_id, $totals['subtotal'], $totals['tax'], $totals['finalTotal'], $payment_method);
    $stmt_order->execute();
    $order_id = $conn->insert_id; // Ambil ID pesanan yang baru dibuat

    // 2. Masukkan item pesanan ke tabel ORDER_ITEMS
    $stmt_item = $conn->prepare("INSERT INTO order_items (order_id, menu_id, quantity, price_at_order) VALUES (?, ?, ?, ?)");
    
    foreach ($cart_items as $item) {
        $menu_id = $item['id'];
        $qty = $item['qty'];
        $price = $item['price'];

        // Pastikan menu_id, qty, dan price adalah tipe data yang diharapkan
        if (!is_numeric($menu_id) || !is_numeric($qty) || !is_numeric($price)) {
            throw new Exception("Data item pesanan tidak valid.");
        }

        $stmt_item->bind_param("iiid", $order_id, $menu_id, $qty, $price);
        $stmt_item->execute();
    }

    $conn->commit();
    
    echo json_encode(['success' => true, 'message' => 'Pesanan berhasil dibuat!', 'order_id' => $order_id]);

} catch (Exception $e) {
    $conn->rollback();
    http_response_code(500);
    error_log("Order Save Error: " . $e->getMessage());
    echo json_encode(['success' => false, 'message' => 'Gagal menyimpan pesanan. Terjadi kesalahan server.']);
}

$conn->close();
?>