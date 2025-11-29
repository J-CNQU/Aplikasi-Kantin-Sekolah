<?php
session_start();

$allowed_origin = 'http://localhost:3000'; 
if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] === $allowed_origin) {
    header("Access-Control-Allow-Origin: " . $allowed_origin);
}

header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

include('../config.php'); 

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Metode request tidak diizinkan.']);
    exit;
}

if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Anda harus login untuk membuat pesanan.']);
    exit;
}

$user_id = $_SESSION['id']; 
$data = json_decode(file_get_contents('php://input'), true);

if (empty($data['cart']) || empty($data['totals']) || empty($data['method'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Data pesanan tidak lengkap.']);
    exit;
}

$cart_items = $data['cart'];
$totals = $data['totals'];
$payment_method = $data['method'];

if (!is_numeric($totals['subtotal']) || !is_numeric($totals['tax']) || !is_numeric($totals['finalTotal'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Nilai total pesanan tidak valid.']);
    exit;
}

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Koneksi Database Gagal: ' . $conn->connect_error]);
    exit;
}

$conn->begin_transaction();

try {
    $stmt_order = $conn->prepare("INSERT INTO orders (user_id, subtotal, tax, total_amount, payment_method) VALUES (?, ?, ?, ?, ?)");
    
    if (!$stmt_order) {
         throw new Exception("SQL Prepare Gagal untuk Orders: " . $conn->error);
    }
    
    $stmt_order->bind_param("iddds", $user_id, $totals['subtotal'], $totals['tax'], $totals['finalTotal'], $payment_method);
    
    if (!$stmt_order->execute()) {
        $error_message = $stmt_order->error; 
        $stmt_order->close();
        throw new Exception("Eksekusi INSERT Orders Gagal: " . $error_message);
    }
    
    $order_id = $conn->insert_id;
    $stmt_order->close();

    $stmt_item = $conn->prepare("INSERT INTO order_items (order_id, menu_id, quantity, price_at_order) VALUES (?, ?, ?, ?)");
    if (!$stmt_item) {
        throw new Exception("SQL Prepare Gagal untuk Order_Items: " . $conn->error);
    }
    
    foreach ($cart_items as $item) {
        $menu_id = $item['id'];
        $qty = $item['qty'];
        $price = $item['price'];

        if (!is_numeric($menu_id) || !is_numeric($qty) || !is_numeric($price)) {
            throw new Exception("Data item pesanan tidak valid: Menu ID atau Qty bukan angka.");
        }

        $stmt_item->bind_param("iiid", $order_id, $menu_id, $qty, $price);
        
        if (!$stmt_item->execute()) {
             throw new Exception("Eksekusi Order_Items Gagal: " . $stmt_item->error . " (Menu ID: " . $menu_id . ")");
        }
    }
    $stmt_item->close();

    $conn->commit();
    
    echo json_encode(['success' => true, 'message' => 'Pesanan berhasil dibuat!', 'order_id' => $order_id]);

} catch (Exception $e) {
    $conn->rollback();
    http_response_code(500);
    
    $error_message = $e->getMessage();
    
    echo json_encode([
        'success' => false, 
        'message' => 'Gagal menyimpan pesanan: ' . $error_message 
    ]);
}

$conn->close();
?>