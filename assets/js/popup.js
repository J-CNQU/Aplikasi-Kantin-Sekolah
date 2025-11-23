document.addEventListener("DOMContentLoaded", () => {
    const isLoggedIn = (typeof IS_LOGGED_IN !== 'undefined' && IS_LOGGED_IN === 'true'); 

    const popupOverlay = document.getElementById("popupOverlay");
    const closePopup = document.getElementById("closePopup");
    const loginBtn = document.getElementById("popupLoginBtn");
    const signupBtn = document.getElementById("popupSignupBtn");
    const lockAreas = document.querySelectorAll(".lock-area"); 

    if (!popupOverlay) return;

    const showPopup = () => {
        popupOverlay.style.display = "flex";
    };

    const hidePopup = () => {
        popupOverlay.style.display = "none";
    };

    lockAreas.forEach(area => {
        area.addEventListener("click", (event) => {
            if (!isLoggedIn) {
                event.preventDefault(); 
                showPopup();
            }
        });
    });

    if (closePopup) {
        closePopup.addEventListener("click", hidePopup);
    }

    popupOverlay.addEventListener("click", (event) => {
        if (event.target === popupOverlay) {
            hidePopup();
        }
    });

    if (loginBtn) {
        loginBtn.addEventListener("click", () => {
            window.location.href = "login.php";
        });
    }

    if (signupBtn) {
        signupBtn.addEventListener("click", () => {
            window.location.href = "signup.php"; 
        });
    }
});