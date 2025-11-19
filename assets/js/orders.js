// js/orders.js

document.addEventListener("DOMContentLoaded", () => {
    const ordersContent = document.getElementById('ordersContent');
    const checkoutButton = document.getElementById('checkoutBtn');
    const subtotalAmount = document.getElementById('subtotalAmount');
    const taxAmount = document.getElementById('taxAmount');
    const finalTotalAmount = document.getElementById('finalTotalAmount');
    const taxRate = 0.10; // PPN 10%

    // --- UTILITIES (GET & SAVE CART) ---
    function getCart() {
        try {
            return JSON.parse(localStorage.getItem('cart')) || {};
        } catch (e) {
            return {};
        }
    }

    function saveCart(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    function formatRupiah(number) {
        return 'Rp' + (number).toLocaleString('id-ID', { minimumFractionDigits: 0 });
    }

    // --- RENDER FUNCTION ---
    function renderOrders() {
        const cart = getCart();
        const items = Object.values(cart).filter(item => item.qty > 0);
        let subtotal = 0;

        ordersContent.innerHTML = ''; // Bersihkan konten

        if (items.length === 0) {
            ordersContent.innerHTML = `
                <p class="empty-cart-message">Keranjang Anda kosong. Silakan pesan menu di halaman Counter.</p>
            `;
            checkoutButton.disabled = true;
        } else {
            checkoutButton.disabled = false;
            
            items.forEach(item => {
                const itemTotal = item.price * item.qty;
                subtotal += itemTotal;

                // Template HTML untuk setiap item pesanan
                const itemHTML = `
                    <div class="order-item" data-menu="${item.id}">
                        <div class="item-info">
                            <h4 class="item-name">${item.name}</h4>
                            <p class="item-price">${formatRupiah(item.price)} x ${item.qty}</p>
                        </div>
                        <div class="item-controls">
                            <span class="item-total">${formatRupiah(itemTotal)}</span>
                            <div class="item-qty-controls">
                                <button class="qty-btn minus-order" data-id="${item.id}">-</button>
                                <span class="qty-number">${item.qty}</span>
                                <button class="qty-btn plus-order" data-id="${item.id}">+</button>
                            </div>
                        </div>
                    </div>
                `;
                ordersContent.insertAdjacentHTML('beforeend', itemHTML);
            });
        }
        
        // Hitung Total dan PPN
        const tax = Math.round(subtotal * taxRate);
        const finalTotal = subtotal + tax;
        
        // Update tampilan total
        subtotalAmount.textContent = formatRupiah(subtotal);
        taxAmount.textContent = formatRupiah(tax);
        finalTotalAmount.textContent = formatRupiah(finalTotal);
    }

    // --- HANDLE QUANTITY CHANGES ON ORDERS PAGE ---
    ordersContent.addEventListener('click', (e) => {
        const target = e.target.closest('.qty-btn');
        if (!target) return;

        const itemId = target.dataset.id;
        let cart = getCart();
        
        if (!itemId || !cart[itemId]) return;

        let currentQty = cart[itemId].qty;

        if (target.classList.contains('plus-order')) {
            currentQty++;
        } else if (target.classList.contains('minus-order')) {
            currentQty--;
        } else {
            return;
        }

        if (currentQty > 0) {
            cart[itemId].qty = currentQty;
        } else {
            // Hapus item dari cart jika kuantitas mencapai 0
            delete cart[itemId];
        }
        
        saveCart(cart);
        renderOrders(); // Render ulang setelah perubahan
    });

    // --- HANDLE CHECKOUT (POP-UP) ---
    checkoutButton.addEventListener('click', showPaymentPopup);

    function showPaymentPopup() {
        // Ambil total dari tampilan
        const totalAmountText = finalTotalAmount.textContent;
        
        const paymentPopupHTML = `
            <div id="modal-backdrop" class="modal-backdrop">
                <div class="modal-content">
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
        document.body.insertAdjacentHTML('beforeend', paymentPopupHTML);

        // Event listener untuk menutup pop-up
        document.getElementById('close-modal-btn').addEventListener('click', () => {
            document.getElementById('modal-backdrop').remove();
        });

        // Event listener untuk pilihan pembayaran
        document.querySelectorAll('.payment-option-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const method = e.target.dataset.method;
                document.getElementById('modal-backdrop').remove();
                showSuccessPopup(method);
            });
        });
    }

    function showSuccessPopup(method) {
        const successPopupHTML = `
            <div id="success-backdrop" class="modal-backdrop success-modal">
                <div class="modal-content success-content">
                    <div class="check-animation">
                        <span class="check-mark">✔️</span>
                    </div>
                    <h3>Pembayaran Berhasil!</h3>
                    <p>Pesanan Anda telah berhasil dibuat dengan metode <strong>${method}</strong>.</p>
                    <p>Silakan tunggu pesanan Anda disiapkan.</p>
                    <button id="close-success-btn">Selesai</button>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', successPopupHTML);

        // Hapus Keranjang setelah sukses
        localStorage.removeItem('cart');
        renderOrders(); // Render ulang untuk menampilkan keranjang kosong

        document.getElementById('close-success-btn').addEventListener('click', () => {
            document.getElementById('success-backdrop').remove();
            // Opsional: Redirect ke halaman menu
            // window.location.href = 'counter1.php'; 
        });
    }

    renderOrders(); // Panggil saat dokumen siap
});