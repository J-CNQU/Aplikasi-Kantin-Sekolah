document.addEventListener("DOMContentLoaded", function () {
  const searchIcon = document.getElementById("search-icon");
  const userIcon = document.getElementById("user-icon");
  const searchModal = document.getElementById("search-modal");
  const userDropdown = document.getElementById("user-dropdown");

  searchIcon.addEventListener("click", function (e) {
    e.preventDefault();
    userDropdown.style.display = "none";
    searchModal.style.display =
      searchModal.style.display === "block" ? "none" : "block";
  });

  userIcon.addEventListener("click", function (e) {
    e.preventDefault();
    searchModal.style.display = "none";
    userDropdown.style.display =
      userDropdown.style.display === "block" ? "none" : "block";
  });

  document.addEventListener("click", function (e) {
    const target = e.target;
    if (
      target !== searchIcon &&
      !searchModal.contains(target) &&
      target.parentNode !== searchIcon &&
      target !== userIcon &&
      !userDropdown.contains(target) &&
      target.parentNode !== userIcon
    ) {
      searchModal.style.display = "none";
      userDropdown.style.display = "none";
    }
  });
});

function redirectToCounter(selectElement) {
            const counterNum = selectElement.value;
            // Mengarahkan ke halaman yang sama dengan parameter 'counter' baru
            window.location.href = 'homepage-admin.php?counter=' + counterNum;
        }