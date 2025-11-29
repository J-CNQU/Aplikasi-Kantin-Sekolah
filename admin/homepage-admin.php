<?php
session_start();

$userRole = $_SESSION['role'] ?? null; 
$isLoggedIn = isset($_SESSION['id']) ? 'true' : 'false';

if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
require_once '../config.php';

// =======================================================
// DUKUNGAN MULTI-COUNTER BARU
// =======================================================
$selected_counter_num = isset($_GET['counter']) ? (int) $_GET['counter'] : 1;
if ($selected_counter_num < 1 || $selected_counter_num > 4) {
    $selected_counter_num = 1;
}
$category_filter = 'Counter ' . $selected_counter_num;
// =======================================================

$message = "";
$edit_item = null;


// =======================================================
// A. LOGIKA CRUD (CREATE, UPDATE, DELETE) - DENGAN DESKRIPSI
// =======================================================

// Logika POST (CREATE & UPDATE)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $price = (float) $_POST['price'];
    $is_available = isset($_POST['is_available']) ? 1 : 0;

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = (int) $_POST['id'];
        // UPDATE query dengan kolom description
        $stmt = $conn->prepare("UPDATE menu SET name = ?, description = ?, price = ?, is_available = ? WHERE id = ?");
        $stmt->bind_param("ssdis", $name, $description, $price, $is_available, $id);
        if ($stmt->execute()) {
            $message = "<div class='alert success'>✅ Menu **$name** berhasil diperbarui!</div>";
        } else {
            $message = "<div class='alert error'>❌ Error saat update menu: " . $stmt->error . "</div>";
        }
        $stmt->close();
    } else {
        // INSERT query dengan kolom description
        $stmt = $conn->prepare("INSERT INTO menu (name, description, price, category, is_available) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdsi", $name, $description, $price, $category_filter, $is_available);
        if ($stmt->execute()) {
            $message = "<div class='alert success'>✅ Menu **$name** berhasil ditambahkan!</div>";
        } else {
            $message = "<div class='alert error'>❌ Error saat menambah menu: " . $stmt->error . "</div>";
        }
        $stmt->close();
    }
}

// Logika DELETE
if (isset($_GET['delete_id'])) {
    $id = (int) $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM menu WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        // Redireksi tetap mempertahankan counter yang dipilih
        header("Location: homepage-admin.php?counter=$selected_counter_num&msg=deleted");
        exit();
    } else {
        $message = "<div class='alert error'>❌ Gagal menghapus menu: " . $stmt->error . "</div>";
    }
    $stmt->close();
}

// Logika LOAD DATA EDIT
if (isset($_GET['edit_id'])) {
    $id = (int) $_GET['edit_id'];
    $stmt = $conn->prepare("SELECT id, name, description, price, is_available FROM menu WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $edit_item = $result->fetch_assoc();
    }
    $stmt->close();
}

// Logika READ
$menu_items = [];
$sql = "SELECT id, name, description, price, is_available FROM menu WHERE category = ? ORDER BY name";
try {
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category_filter);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
    $stmt->close();
} catch (Exception $e) {
    $message = "<div class='alert error'>❌ Gagal memuat daftar menu: " . $e->getMessage() . "</div>";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Manajemen Menu <?php echo $category_filter; ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="./admin-css/homepage-admin.css">
    <link rel="stylesheet" href="../assets/css/homepage.css">
    <link rel="shortcut icon" href="../assets/img/fcon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="site-bg">
    <nav class="navbar">
        <div class="logo">
            <img src="../assets/img/logo-copy.png" class="logo" alt="Logo">
            <span>CafeTaria</span>
        </div>
        <ul class="nav-links">
            <li><a class="active" href="homepage-admin.php">Kelola Menu Counter</a></li>
            <li><a href="../php/counter.php" class="btns">Counter</a></li>
            <li><a href="../acc/logout.php" class="btns-logout">Logout</a></li>
            <li><a href="../homepage.php">Home</a></li>
        </ul>
        <div class="nav-icons">
            <?php
            if ($isLoggedIn === 'true') {
              $user_icon_url = ($userRole === 'admin') ? 'admin/homepage-admin.php' : 'homepage.php';
              $user_icon = ($userRole === 'admin') ? 'fas fa-user-shield' : 'fas fa-user';
            } else {
              $user_icon_url = 'login.php';
              $user_icon = 'fas fa-user';
            }
            $show_cart = ($isLoggedIn === 'true' && $userRole !== 'admin');
            ?>

            <a href="#" id="search-icon" title="Pencarian Cepat">
              <i class="fas fa-search"></i>
            </a>

            <a href="#" id="user-icon" title="Profil Pengguna/Admin">
              <i class="<?php echo htmlspecialchars($user_icon); ?>"></i>
            </a>

            <?php if ($show_cart): ?>
              <a href="/orders/orders.php" title="Lihat Keranjang Belanja">
                <i class="fas fa-shopping-cart"></i>
              </a>
            <?php endif; ?>
        </div>
    </nav>
    
    <div id="search-modal">
        <input type="search" placeholder="Cari menu, counter, atau kategori..." />
        <button id="f" type="button">Cari</button>
    </div>

    <div id="user-dropdown">
        <?php if ($isLoggedIn === 'true'): ?>
            <p>Halo, <?= htmlspecialchars($_SESSION['name']) ?></p>
            <hr>
            <a href="<?php echo htmlspecialchars($user_icon_url); ?>">Dashboard / Profil</a>
            <hr>
            <a href="../acc/logout.php">Logout</a>
        <?php else: ?>
            <a href="../acc/login.php">Login</a>
            <hr>
            <a href="../acc/signup.php">Sign Up</a>
        <?php endif; ?>
    </div>
    </nav>
    
    <br><br><br>
    <div class="container">
        <h1>Dashboard Admin - Kelola Menu
            <span class="dropdown-wrapper">
                <select id="counter-selector" onchange="redirectToCounter(this)">
                    <?php for ($i = 1; $i <= 4; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo $selected_counter_num == $i ? 'selected' : ''; ?>>
                            Counter <?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </span>
        </h1>
        <?php echo $message; ?>

        <hr>

        <h2><?php echo $edit_item ? 'Edit' : 'Tambah'; ?> Item Menu</h2>
        <form method="POST" action="homepage-admin.php?counter=<?php echo $selected_counter_num; ?>">
            <?php if ($edit_item): ?>
                <input type="hidden" name="id" value="<?php echo $edit_item['id']; ?>">
            <?php endif; ?>

            <label for="name">Nama Makanan:</label><br>
            <input type="text" id="name" name="name"
                value="<?php echo $edit_item ? htmlspecialchars($edit_item['name']) : ''; ?>" required><br>

            <label for="description">Deskripsi:</label><br>
            <textarea id="description" name="description" rows="4"
                required><?php echo $edit_item ? htmlspecialchars($edit_item['description']) : ''; ?></textarea><br>

            <label for="price">Harga (Rp):</label><br>
            <input type="number" id="price" name="price"
                value="<?php echo $edit_item ? htmlspecialchars($edit_item['price']) : ''; ?>" min="0" required><br>

            <div class="checkbox-container">
                <label for="is_available">Tersedia:</label>
                <input type="checkbox" id="is_available" name="is_available" value="1" <?php echo (!$edit_item || $edit_item['is_available']) ? 'checked' : ''; ?>>
            </div>

            <button type="submit"
                class="btns"><?php echo $edit_item ? 'Simpan Perubahan' : 'Tambah Menu Baru'; ?></button>
            <?php if ($edit_item): ?>
                <a href="homepage-admin.php?counter=<?php echo $selected_counter_num; ?>" class="btns-logout">Batal Edit</a>
            <?php endif; ?>
        </form>

        <hr>

        <h2>Daftar Menu <?php echo $category_filter; ?> Saat Ini</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Makanan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Ketersediaan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($menu_items)): ?>
                    <?php foreach ($menu_items as $item): ?>
                        <tr>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo htmlspecialchars($item['description']); ?></td>
                            <td>Rp<?php echo number_format($item['price'], 0, ',', '.'); ?></td>
                            <td class="<?php echo $item['is_available'] ? 'available' : 'unavailable'; ?>">
                                <?php echo $item['is_available'] ? 'Tersedia' : 'Habis'; ?>
                            </td>
                            <td>
                                <a
                                    href="homepage-admin.php?edit_id=<?php echo $item['id']; ?>&counter=<?php echo $selected_counter_num; ?>">Edit</a>
                                |
                                <a href="homepage-admin.php?delete_id=<?php echo $item['id']; ?>"
                                    onclick="return confirm('Yakin ingin menghapus menu <?php echo htmlspecialchars($item['name']); ?>?');">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6">Belum ada menu yang dibuat untuk <?php echo $category_filter; ?>.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <script src="./admin-js/homepage-admin.js"></script>
</body>

</html>
<?php
if (isset($conn)) {
    $conn->close();
}
?>