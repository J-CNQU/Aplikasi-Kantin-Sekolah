document.addEventListener("DOMContentLoaded", () => {
    
    // Ambil popup
    const popup = document.getElementById("popup");
    const closeBtn = document.getElementById("closePopup");

    // Semua button yang butuh login (tambahkan class `requires-login`)
    const protectedButtons = document.querySelectorAll(".btns, .add-to-cart-button, .counter-item");

    protectedButtons.forEach(btn => {
        btn.addEventListener("click", (e) => {
            if (!IS_LOGGED_IN) {
                e.preventDefault();    // cegah pindah halaman
                popup.style.display = "flex"; // munculkan popup
            }
        });
    });

    // tombol X untuk menutup popup
    closeBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });

    // Klik area luar menutup popup
    popup.addEventListener("click", (e) => {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    });
});
