  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.menu-qty').forEach(qtyBox => {
      const plusBtn = qtyBox.querySelector('.plus');
      const minusBtn = qtyBox.querySelector('.minus');
      const qtyDisplay = qtyBox.querySelector('.qty-number');
      const menuName = qtyBox.dataset.menu || "ayamGeprek";

      let count = parseInt(localStorage.getItem(`qty_${menuName}`)) || 0;
      qtyDisplay.textContent = count;

      plusBtn?.addEventListener('click', () => {
        count++;
        qtyDisplay.textContent = count;
        localStorage.setItem(`qty_${menuName}`, count);
      });

      minusBtn?.addEventListener('click', () => {
        if (count > 0) {
          count--;
          qtyDisplay.textContent = count;
          localStorage.setItem(`qty_${menuName}`, count);
        }
      });
    });


    const commentsList = document.getElementById("commentsList");
    const nextBtn = document.getElementById("nextBtn");

    if (commentsList && nextBtn) {
      const commentCards = commentsList.querySelectorAll(".comment-card");
      const visibleCount = 3;
      let currentIndex = 0;

      function updateSlide() {
        const total = commentCards.length;
        const offset = currentIndex * (commentsList.clientWidth / visibleCount + 25);
        commentsList.scrollTo({ left: offset, behavior: "smooth" });
      }

      nextBtn.addEventListener("click", () => {
        const total = commentCards.length;
        currentIndex++;
        if (currentIndex > total - visibleCount) {
          currentIndex = 0;
        }
        updateSlide();
      });
    }
  });