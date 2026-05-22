document.addEventListener("DOMContentLoaded", function () {

    const toggle = document.querySelector(".menu-toggle");
    const menu = document.querySelector(".nav-menu");

    if (toggle && menu) {
        toggle.addEventListener("click", function () {

            menu.classList.toggle("active");

            const expanded = toggle.getAttribute("aria-expanded") === "true";
            toggle.setAttribute("aria-expanded", !expanded);
        });
    }
});