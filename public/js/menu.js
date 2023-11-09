document.addEventListener("DOMContentLoaded", function() {
    const logoMenu = document.getElementById("logo-menu");
    const menu = document.querySelector(".menu");

    //clic al logo para mostrar/ocultar el menú
    logoMenu.addEventListener("click", function() {
        menu.classList.toggle("active");
    });

    // ocultar el menú cuando el cursor sale del menú
    menu.addEventListener("mouseout", function(event) {
        if (!menu.contains(event.relatedTarget)) {
            menu.classList.remove("active");
        }
    });
});
