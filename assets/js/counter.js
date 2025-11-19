// assets/js/counter.js

document.addEventListener("DOMContentLoaded", () => {

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

    function initializeCounters() {
        const cart = getCart();
        document.querySelectorAll('.list-menu').forEach(itemElement => {
            const menuId = itemElement.dataset.menu;
            const qtyDisplay = itemElement.querySelector('.qty-number');

            if (cart[menuId] && cart[menuId].qty > 0) {
                qtyDisplay.textContent = cart[menuId].qty;
            } else {
                qtyDisplay.textContent = '0';
            }
        });
    }

    document.body.addEventListener('click', (e) => {
        const target = e.target.closest('.qty-btn');
        if (!target) return;

        const menuItem = target.closest('.list-menu');
        if (!menuItem) return;

        const itemId = menuItem.dataset.menu;
        const itemName = menuItem.dataset.name;
        // Gunakan parseInt untuk memastikan harga adalah angka
        const itemPrice = parseInt(menuItem.dataset.price);
        const qtyDisplay = menuItem.querySelector('.qty-number');

        let cart = getCart();
        let currentQty = parseInt(qtyDisplay.textContent) || 0;

        if (target.classList.contains('plus')) {
            currentQty++;
        } else if (target.classList.contains('minus')) {
            currentQty = Math.max(0, currentQty - 1);
        }

        if (currentQty > 0) {
            cart[itemId] = {
                id: itemId,
                name: itemName,
                price: itemPrice,
                qty: currentQty
            };
        } else {
            delete cart[itemId];
        }

        qtyDisplay.textContent = currentQty;
        saveCart(cart);
    });

    initializeCounters();
});