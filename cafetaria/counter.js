// counter.js
// Meng-handle semua tombol + / - pada halaman list (dan juga dapat dipakai di detail jika struktur sama)

document.addEventListener("DOMContentLoaded", () => {
  // Pastikan selector sesuai struktur HTML kamu
  // setiap item harus memiliki атрибут data-menu / data-id / data-name / data-price
  document.querySelectorAll('.list-menu, .menu-qty').forEach(menu => {
    // dukung 2 kemungkinan wrapper: .list-menu (list) atau .menu-qty (detail)
    const plusBtn = menu.querySelector('.plus');
    const minusBtn = menu.querySelector('.minus');
    const qtyDisplay = menu.querySelector('.qty-number');

    // Ambil atribut data dari parent .list-menu atau .menu-qty
    // Jika menu adalah child (misal .menu-qty berada dalam .list-menu), coba cari parent .list-menu
    let root = menu.closest('.list-menu') || menu;
    const menuName = (root.dataset.menu || menu.dataset.menu || '').trim();
    const id = (root.dataset.id || root.dataset.menu || menuName).toString();
    const name = root.dataset.name || menu.dataset.name || document.querySelector(`[data-menu="${menuName}"] .menu-title`)?.textContent?.trim() || id;
    const price = parseInt(root.dataset.price || menu.dataset.price || '0', 10) || 0;

    if (!qtyDisplay || !plusBtn || !minusBtn || !menuName) {
      // tidak memenuhi struktur, skip
      return;
    }

    // ambil qty yang tersimpan (prioritaskan cart jika ada)
    function getQtyFromCart() {
      try {
        const cart = JSON.parse(localStorage.getItem('cart') || '{}');
        if (cart && cart[id] && typeof cart[id].qty === 'number') {
          return cart[id].qty;
        }
      } catch (e) { /* ignore */ }
      // fallback ke per-item key (jika masih ada)
      const perKey = parseInt(localStorage.getItem(`qty_${menuName}`), 10);
      return isNaN(perKey) ? 0 : perKey;
    }

    let count = getQtyFromCart();
    qtyDisplay.textContent = count;

    // update cart object di localStorage
    function updateCart(qty) {
      let cart = {};
      try {
        cart = JSON.parse(localStorage.getItem('cart') || '{}');
      } catch (e) {
        cart = {};
      }

      if (qty > 0) {
        cart[id] = {
          id: id,
          name: name,
          price: price,
          qty: qty
        };
      } else {
        delete cart[id];
      }

      localStorage.setItem('cart', JSON.stringify(cart));
      // juga simpan per-item key supaya kompatibel (opsional)
      localStorage.setItem(`qty_${menuName}`, qty);
      // sync di halaman (update semua tampilan)
      syncQtyDisplays(menuName, qty);
    }

    function syncQtyDisplays(menuNameLocal, val) {
      // update semua elemen yang memuat data-menu sama
      document.querySelectorAll(`[data-menu="${menuNameLocal}"] .qty-number`).forEach(el => {
        el.textContent = val;
      });
      // juga jika ada standalone .menu-qty dengan data-menu
      document.querySelectorAll(`.menu-qty[data-menu="${menuNameLocal}"] .qty-number`).forEach(el => {
        el.textContent = val;
      });
    }

    // event + 
    plusBtn.addEventListener('click', (e) => {
      e.preventDefault();
      count++;
      qtyDisplay.textContent = count;
      updateCart(count);
    });

    // event -
    minusBtn.addEventListener('click', (e) => {
      e.preventDefault();
      if (count > 0) {
        count--;
        qtyDisplay.textContent = count;
        updateCart(count);
      }
    });

    // saat load, pastikan cart konsisten
    updateCart(count);
  });
});
