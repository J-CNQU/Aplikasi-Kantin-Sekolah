document.addEventListener("DOMContentLoaded", () => {
  const popup = document.getElementById("popup");
  const closePopup = document.getElementById("closePopup");

  // buka popup saat tombol kategori diklik
  document.querySelectorAll(".category-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      popup.style.display = "flex";
    });
  });

  // buka popup saat tombol like di item diklik
  document.querySelectorAll(".item button").forEach(btn => {
    btn.addEventListener("click", () => {
      popup.style.display = "flex";
    });
  });

  // tutup popup dengan tombol X
  closePopup.addEventListener("click", () => {
    popup.style.display = "none";
  });

  // tutup jika klik area luar card
  popup.addEventListener("click", (e) => {
    if (e.target === popup) {
      popup.style.display = "none";
    }
  });
});