document.addEventListener("DOMContentLoaded", () => {
    const ordersContent = document.getElementById('ordersContent');
    const checkoutButton = document.getElementById('checkoutBtn');
    const subtotalAmount = document.getElementById('subtotalAmount');
    const taxAmount = document.getElementById('taxAmount');
    const finalTotalAmount = document.getElementById('finalTotalAmount');
    const taxRate = 0.10; // PPN 10%
    
    // Asumsi save_order.php berada di root UnFixed, sejajar dengan orders.php
    const SAVE_ORDER_ENDPOINT = 'save_order.php'; 

    // --- UTILITIES ---
    function getCart() {
        try {
            // Mengambil keranjang dari Local Storage
            return JSON.parse(localStorage.getItem('cart')) || {};
        } catch (e) {
            return {};
        }
    }

    function saveCart(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    function formatRupiah(number) {
        return 'Rp' + (Math.round(number)).toLocaleString('id-ID', { minimumFractionDigits: 0 });
    }

    // --- RENDER FUNCTION ---
    function renderOrders() {
        const cart = getCart();
        // Mengubah objek cart menjadi array item, hanya item dengan qty > 0 yang diambil
        const items = Object.values(cart).filter(item => item.qty > 0);
        let subtotal = 0;

        ordersContent.innerHTML = '';

        if (items.length === 0) {
            ordersContent.innerHTML = `
                <p class="empty-cart-message">Keranjang Anda kosong. Silakan pesan menu di halaman Menu.</p>
            `;
            checkoutButton.disabled = true;
        } else {
            checkoutButton.disabled = false;

            items.forEach(item => {
                const itemTotal = item.price * item.qty;
                subtotal += itemTotal;

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
        const tax = subtotal * taxRate;
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
            // Jika kuantitas 0, hapus item dari keranjang
            delete cart[itemId];
        }

        saveCart(cart);
        renderOrders();
    });

    // --- MODAL UTILITIES ---
    // Fungsi untuk menutup modal
    function closeModal(id) {
        const modal = document.getElementById(id);
        if (modal) {
            modal.style.opacity = '0';
            modal.style.transition = 'opacity 0.3s ease-out';
            setTimeout(() => {
                modal.remove();
            }, 300); 
        }
    }

    // --- HANDLE CHECKOUT (POP-UP) ---
    checkoutButton.addEventListener('click', showPaymentPopup);

    function showPaymentPopup() {
        const modalId = 'payment-modal-backdrop';
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
        document.body.insertAdjacentHTML('beforeend', paymentPopupHTML);

        const modalBackdrop = document.getElementById(modalId);
        modalBackdrop.addEventListener('click', (e) => {
            if (e.target === modalBackdrop) {
                closeModal(modalId);
            }
        });

        document.getElementById('close-modal-btn').addEventListener('click', () => {
            closeModal(modalId);
        });

        document.querySelectorAll('.payment-option-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const method = e.target.dataset.method;
                closeModal(modalId);
                // Panggil fungsi checkout yang memproses data ke server
                processCheckout(method); 
            });
        });
    }

    // --- NEW FUNCTION: PROCESS CHECKOUT ---
    function processCheckout(method) {
        // 1. Kumpulkan data keranjang dan total
        const cart = getCart();
        const itemsArray = Object.values(cart).filter(item => item.qty > 0);
        
        const subtotal = itemsArray.reduce((sum, item) => sum + (item.price * item.qty), 0);
        const tax = subtotal * taxRate;
        const finalTotal = subtotal + tax;

        const orderData = {
            cart: itemsArray,
            totals: {
                subtotal: parseFloat(subtotal.toFixed(2)),
                tax: parseFloat(tax.toFixed(2)),
                finalTotal: parseFloat(finalTotal.toFixed(2))
            },
            method: method
        };

        // Nonaktifkan tombol saat proses berlangsung
        checkoutButton.disabled = true;
        checkoutButton.textContent = 'Memproses...';

        // 2. Kirim data ke PHP (save_order.php)
        fetch(SAVE_ORDER_ENDPOINT, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(orderData)
        })
        .then(response => {
            if (!response.ok) {
                // Tangani error HTTP status (misal 401, 500)
                return response.json().then(error => { throw new Error(error.message || `Server error: ${response.status}`); });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // 3. Sukses: Tampilkan Pop-up Sukses
                showSuccessPopup(method, data.order_id);
                // Kosongkan keranjang di Local Storage
                localStorage.removeItem('cart');
                renderOrders();
            } else {
                // 4. Gagal (tapi server merespons 200/OK, misal error validasi)
                alert("Gagal membuat pesanan: " + data.message);
            }
        })
        .catch(error => {
            // 5. Error Koneksi atau HTTP Error
            console.error('Error Checkout:', error);
            alert('Gagal membuat pesanan. ' + error.message);
        })
        .finally(() => {
            // Selalu aktifkan kembali tombol, kecuali jika keranjang kosong
            renderOrders();
            checkoutButton.textContent = 'Pesan Sekarang';
        });
    }


    // --- MODIFIED SUCCESS POP-UP ---
    function showSuccessPopup(method, orderId) {
        const successModalId = 'success-modal-backdrop';
        if (document.getElementById(successModalId)) return;

        const orderIdDisplay = orderId ? `#${orderId}` : 'Belum Tersimpan';

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
        document.body.insertAdjacentHTML('beforeend', successPopupHTML);

        // Tambahkan event listener untuk menutup modal sukses
        const successBackdrop = document.getElementById(successModalId);
        successBackdrop.addEventListener('click', (e) => {
            if (e.target === successBackdrop || e.target.id === 'close-success-btn') {
                closeModal(successModalId);
            }
        });

        document.getElementById('close-success-btn').addEventListener('click', () => {
            closeModal(successModalId);
        });
    }

    renderOrders();
});