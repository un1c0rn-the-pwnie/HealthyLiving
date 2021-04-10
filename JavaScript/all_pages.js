// ------------------------------- Functionality for Responsive Basic Menu --------------------------
const toggle = document.querySelector(".toggle");
const menu = document.querySelector(".menu");

/* Click the mobile menu (Bars) */
function ChangeMobileMenu() {
    if (menu.classList.contains("active")) {
        menu.classList.remove("active");
        toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>";
    } else {
        menu.classList.add("active");
        toggle.querySelector("a").innerHTML = "<i class='fas fa-times'></i>";
    }
}

toggle.addEventListener("click", ChangeMobileMenu, false);
// --------------------------- End of Functionality for Responsive Basic Menu -------------------------


// ------------------------------------- Functionality for Button to scroll Top -------------------------------
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            $('#To_Top').css({
                "opacity": "1", "pointer-events": "auto"
            });
        } else {
            $('#To_Top').css({
                "opacity": "0", "pointer-events": "none"
            });
        }
    });
    $('#To_Top').click(function () {
        $('html').animate({ scrollTop: 0 }, 1000);
    });
});
// ---------------------------------- End of Functionality for Button to scroll Top ---------------------------