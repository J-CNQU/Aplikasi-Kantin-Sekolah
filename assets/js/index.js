document.addEventListener("DOMContentLoaded", () => {
    const popup = document.getElementById("popup");
    const closePopup = document.getElementById("closePopup");

    const loggedIn = typeof IS_LOGGED_IN !== 'undefined' && IS_LOGGED_IN;

    const handleProtectedClick = (event) => {
        if (!loggedIn) {
            event.preventDefault();
            popup.style.display = "flex";
        } else {
            console.log("User logged in. Proceeding with the action.");
        }
    };

    document.querySelectorAll(".category-btn").forEach(btn => {
        btn.addEventListener("click", handleProtectedClick);
    });

    document.querySelectorAll(".item button").forEach(btn => {
        btn.addEventListener("click", handleProtectedClick);
    });

    document.querySelectorAll(".counter-grid img").forEach(img => {
        img.addEventListener("click", handleProtectedClick);
    });

    document.querySelector('.nav-icons .fa-shopping-cart')?.closest('button')
        .addEventListener('click', handleProtectedClick);

    document.querySelector('.nav-icons .fa-user')?.closest('button')
        .addEventListener('click', handleProtectedClick);

    closePopup.addEventListener("click", () => {
        popup.style.display = "none";
    });

    popup.addEventListener("click", (e) => {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    });
});
