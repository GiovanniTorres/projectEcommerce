function toggleMenu() {
    const menu = document.querySelector('.menu');
    menu.classList.toggle('active');
}

// Cierra el menú si haces clic fuera de él
document.addEventListener("click", function (event) {
    const menu = document.querySelector(".menu");
    const menuToggle = document.querySelector(".menu-toggle");

    if (!menu.contains(event.target) && !menuToggle.contains(event.target)) {
        menu.classList.remove("active"); // Se cierra el menú
    }
});