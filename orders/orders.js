document.addEventListener("DOMContentLoaded", () => {
  const ordersContent = document.getElementById("ordersContent");
  const checkoutButton = document.getElementById("checkoutBtn");
  const subtotalAmount = document.getElementById("subtotalAmount");
  const taxAmount = document.getElementById("taxAmount");
  const finalTotalAmount = document.getElementById("finalTotalAmount");
  const taxRate = 0.1;

  const SAVE_ORDER_ENDPOINT = "save_order.php";

  function getCart() {
    try {
      const cartData = JSON.parse(localStorage.getItem("cart"));
      if (
        !cartData ||
        typeof cartData !== "object" ||
        Array.isArray(cartData)
      ) {
        localStorage.removeItem("cart");
        return {};
      }
      return cartData;
    } catch (e) {
      localStorage.removeItem("cart");
      return {};
    }
  }

  function saveCart(cart) {
    localStorage.setItem("cart", JSON.stringify(cart));
  }

  function formatRupiah(number) {
    return (
      "Rp" +
      Math.round(number).toLocaleString("id-ID", { minimumFractionDigits: 0 })
    );
  }

  function renderOrders() {
    const cart = getCart();
    const items = Object.values(cart).filter((item) => item.qty > 0);
    let subtotal = 0;

    ordersContent.innerHTML = "";

    if (items.length === 0) {
      ordersContent.innerHTML = `
                <p class="empty-cart-message">Keranjang Anda kosong. Silakan pesan menu di halaman Menu.</p>
            `;
      checkoutButton.disabled = true;
    } else {
      checkoutButton.disabled = false;

      items.forEach((item) => {
        const itemTotal = item.price * item.qty;
        subtotal += itemTotal;

        const itemHTML = `
                    <div class="order-item" data-menu="${item.id}">
                        <div class="item-info">
                            <h4 class="item-name">${item.name}</h4>
                            <p class="item-price">${formatRupiah(
                              item.price
                            )} x ${item.qty}</p>
                        </div>
                        <div class="item-controls">
                            <span class="item-total">${formatRupiah(
                              itemTotal
                            )}</span>
                            <div class="item-qty-controls">
                                <button class="qty-btn minus-order" data-id="${
                                  item.id
                                }">-</button>
                                <span class="qty-number">${item.qty}</span>
                                <button class="qty-btn plus-order" data-id="${
                                  item.id
                                }">+</button>
                            </div>
                        </div>
                    </div>
                `;
        ordersContent.insertAdjacentHTML("beforeend", itemHTML);
      });
    }

    const tax = subtotal * taxRate;
    const finalTotal = subtotal + tax;

    subtotalAmount.textContent = formatRupiah(subtotal);
    taxAmount.textContent = formatRupiah(tax);
    finalTotalAmount.textContent = formatRupiah(finalTotal);
  }

  ordersContent.addEventListener("click", (e) => {
    const target = e.target.closest(".qty-btn");
    if (!target) return;

    const itemId = target.dataset.id;
    let cart = getCart();

    if (!itemId || !cart[itemId]) return;

    let currentQty = cart[itemId].qty;

    if (target.classList.contains("plus-order")) {
      currentQty++;
    } else if (target.classList.contains("minus-order")) {
      currentQty--;
    } else {
      return;
    }

    if (currentQty > 0) {
      cart[itemId].qty = currentQty;
    } else {
      delete cart[itemId];
    }

    saveCart(cart);
    renderOrders();
  });

  function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
      modal.style.opacity = "0";
      modal.style.transition = "opacity 0.3s ease-out";
      setTimeout(() => {
        modal.remove();
      }, 300);
    }
  }

  checkoutButton.addEventListener("click", showPaymentPopup);

  function showPaymentPopup() {
    const modalId = "payment-modal-backdrop";
    if (document.getElementById(modalId)) return;

    const totalAmountText = finalTotalAmount.textContent;

    const paymentPopupHTML = `
            <div id="${modalId}" class="modal-backdrop">
                <div class="modal-content" id="payment-modal-content">
                    <h3>Pilih Metode Pembayaran</h3>
                    <p>Total Pembayaran: <strong>${totalAmountText}</strong></p>
                    <div class="payment-options">
                        <button class="payment-option-btn" data-method="Tunai (Cash)">💵 Tunai (Cash)</button>
                        <button class="payment-option-btn" data-method="E-Wallet">💳 E-Wallet (Dana/Gopay)</button>
                    </div>
                    <button id="close-modal-btn" class="cancel-btn">Batal</button>
                </div>
            </div>
        `;
    document.body.insertAdjacentHTML("beforeend", paymentPopupHTML);

    setTimeout(() => {
      document.getElementById(modalId).style.opacity = "1";
    }, 10);

    const modalBackdrop = document.getElementById(modalId);
    modalBackdrop.addEventListener("click", (e) => {
      if (e.target === modalBackdrop) {
        closeModal(modalId);
      }
    });

    document.getElementById("close-modal-btn").addEventListener("click", () => {
      closeModal(modalId);
    });

    document.querySelectorAll(".payment-option-btn").forEach((btn) => {
      btn.addEventListener("click", (e) => {
        const method = e.target.dataset.method;
        closeModal(modalId);
        processCheckout(method);
      });
    });
  }

  function processCheckout(method) {
    const checkoutButton = document.getElementById("checkoutBtn");

    checkoutButton.disabled = true;
    checkoutButton.textContent = "Memproses...";

    setTimeout(() => {
      const randomOrderId = Math.floor(Math.random() * 9000) + 1000;

      showSuccessPopup(method, randomOrderId);

      localStorage.removeItem("cart");
      renderOrders();

      checkoutButton.textContent = "Pesan Sekarang";
      checkoutButton.disabled = false;
    }, 800);
  }

  function showSuccessPopup(method, orderId) {
    const successModalId = "success-modal-backdrop";
    if (document.getElementById(successModalId)) return;

    const orderIdDisplay = orderId ? `#${orderId}` : "Belum Tersimpan";

    const successPopupHTML = `
            <div id="${successModalId}" class="modal-backdrop success-modal">
                <div class="modal-content success-content" id="success-modal-content">
                    <div class="check-animation">
                        <span class="check-mark">✔️</span>
                    </div>
                    <h3>Pesanan Berhasil!</h3>
                    <p>Pesanan ID: <strong>${orderIdDisplay}</strong></p>
                    <p>Pesanan Anda telah berhasil dibuat dengan metode <strong>${method}</strong>.</p>
                    <p>Silakan tunggu pesanan Anda disiapkan.</p>
                    <button id="close-success-btn">Selesai</button>
                </div>
            </div>
        `;
    document.body.insertAdjacentHTML("beforeend", successPopupHTML);

    setTimeout(() => {
      document.getElementById(successModalId).style.opacity = "1";
    }, 10);

    const successBackdrop = document.getElementById(successModalId);
    successBackdrop.addEventListener("click", (e) => {
      if (e.target === successBackdrop || e.target.id === "close-success-btn") {
        closeModal(successModalId);
      }
    });

    document
      .getElementById("close-success-btn")
      .addEventListener("click", () => {
        closeModal(successModalId);
      });
  }

  renderOrders();
});
