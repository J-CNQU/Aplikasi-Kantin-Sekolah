document.addEventListener("DOMContentLoaded", () => {
    const popup = document.getElementById("popup");
    const closePopup = document.getElementById("closePopup");

    // Pastikan variabel IS_LOGGED_IN tersedia dari skrip PHP/HTML
    // Jika tidak, asumsikan false agar pop-up muncul
    const loggedIn = typeof IS_LOGGED_IN !== 'undefined' && IS_LOGGED_IN;

    // --- FUNGSI UTAMA UNTUK MENANGANI KLIK ---
    const handleProtectedClick = (event) => {
        if (!loggedIn) {
            // JIKA BELUM LOGIN:
            event.preventDefault(); // Mencegah navigasi/aksi default
            popup.style.display = "flex"; // Tampilkan pop-up
        } else {
            // JIKA SUDAH LOGIN:
            // Tidak ada alert lagi (hapus alert)
            // Lanjutkan dengan fungsi keranjang/kategori yang sesungguhnya di sini
            console.log("User logged in. Proceeding with the action.");
        }
    };
    
    // --- PENERAPAN PADA SEMUA ELEMEN YANG DIINGINKAN ---
    
    // 1. Tombol Kategori
    document.querySelectorAll(".category-btn").forEach(btn => {
        btn.addEventListener("click", handleProtectedClick);
    });

    // 2. Tombol Item (Coba?/Tambah ke Keranjang)
    document.querySelectorAll(".item button").forEach(btn => {
        btn.addEventListener("click", handleProtectedClick);
    });

    // 3. Tombol Keranjang (fas fa-shopping-cart) di navbar
    document.querySelector('.nav-icons .fa-shopping-cart')?.closest('button').addEventListener('click', handleProtectedClick);
    
    // 4. Tombol User (fas fa-user) di navbar
    document.querySelector('.nav-icons .fa-user')?.closest('button').addEventListener('click', handleProtectedClick);

    // --- FUNGSI TUTUP POPUP (Tidak Berubah) ---
    
    closePopup.addEventListener("click", () => {
        popup.style.display = "none";
    });

    popup.addEventListener("click", (e) => {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    });
});