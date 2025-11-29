<?php
session_start();
// Cek Keamanan
if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
require_once '../config.php'; 

// --- DEKLARASI LOGIKA CRUD DI SINI ---
// (CREATE, READ, UPDATE, DELETE akan diletakkan di bagian ini)

// Logika READ (Ambil semua data menu)
$menu_items = [];
$sql = "SELECT id, name, description, price, image, category, is_available FROM menu ORDER BY category, name";
$result = $conn->query($sql);
if ($result) {
    while($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
}
// ... sisanya adalah HTML dengan form CRUD
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Dashboard Admin - Manajemen Item Menu</title>
</head>
<body>
    <h1>Manajemen Item Menu (Makanan)</h1>
    <p><a href="homepage-admin.php">Kembali ke Dashboard</a> | <a href="logout.php">Logout</a></p>

    <h2>Tambah / Edit Item Menu</h2>
    <hr>

    <h2>Daftar Menu Saat Ini</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Menu</th>
                <th>Harga</th>
                <th>Kategori/Counter</th>
                <th>Gambar (Path)</th>
                <th>Tersedia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menu_items as $item): ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td>Rp<?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                <td><?php echo htmlspecialchars($item['category']); ?></td>
                <td><?php echo htmlspecialchars($item['image']); ?></td>
                <td><?php echo $item['is_available'] ? '✅ Ya' : '❌ Tidak'; ?></td>
                <td>
                    <a href="?edit_id=<?php echo $item['id']; ?>">Edit</a> | 
                    <a href="?delete_id=<?php echo $item['id']; ?>" onclick="return confirm('Hapus item ini?');">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>