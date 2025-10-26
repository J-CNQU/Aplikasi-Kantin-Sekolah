// Quantity controls
document.querySelectorAll('.menu-item').forEach(item => {
    const plusBtn = item.querySelectorAll('.qty-btn')[0];
    const minusBtn = item.querySelectorAll('.qty-btn')[1];
    const display = item.querySelector('.qty-display');

    let quantity = 0;

    plusBtn.addEventListener('click', () => {
        quantity++;
        display.textContent = quantity;
    });

    minusBtn.addEventListener('click', () => {
        if (quantity > 0) {
            quantity--;
            display.textContent = quantity;
        }
    });
});

// Counter tabs
document.querySelectorAll('.counter-tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.counter-tab').forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
    });
});