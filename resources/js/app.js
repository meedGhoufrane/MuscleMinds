import "./bootstrap";

$(document).ready(function () {
    $(".question-card button").click(function () {
        $(this).prev().slideToggle();
    });
});

document.addEventListener("DOMContentLoaded", function () {
    const burgerBtn = document.getElementById("burger-btn");
    const mobileMenu = document.getElementById("mobile-menu-2");

    burgerBtn.addEventListener("click", function () {
        mobileMenu.classList.toggle("hidden");
        const expanded = mobileMenu.classList.contains("hidden")
            ? "false"
            : "true";
        burgerBtn.setAttribute("aria-expanded", expanded);
    });
});
module.exports = {
    theme: {
        fontFamily: {
            sans: ["Poppins", "sans-serif"],
        },
    },
};

document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggle = document.querySelector(".hs-dropdown-toggle");
    const dropdownMenu = document.querySelector(".hs-dropdown-menu");

    dropdownToggle.addEventListener("click", function () {
        dropdownMenu.classList.toggle("hidden");
        dropdownMenu.classList.toggle("opacity-0");
    });

    document.addEventListener("click", function (event) {
        const isDropdownToggle = dropdownToggle.contains(event.target);
        const isDropdownMenu = dropdownMenu.contains(event.target);

        if (!isDropdownToggle && !isDropdownMenu) {
            dropdownMenu.classList.add("hidden");
            dropdownMenu.classList.remove("opacity-100");
            dropdownMenu.classList.add("opacity-0");
        }
    });
});


// add to cart


