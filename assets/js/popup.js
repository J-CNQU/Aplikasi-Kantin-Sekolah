document.addEventListener("DOMContentLoaded", () => {
    const popup = document.getElementById("login-popup");
    const lockArea = document.getElementById("lock-area");

    if (!popup || !lockArea) return;

    lockArea.addEventListener("click", () => {
        popup.classList.remove("hidden");
    });
});
