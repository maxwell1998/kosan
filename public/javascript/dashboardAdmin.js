const hamBurger = document.querySelector(".toggle-btn");
const element = document.querySelector("#sidebar");
const screenWidth = window.innerWidth;
const threshold = 575.98;

hamBurger.addEventListener("click", function () {
    element.classList.toggle("expand");
});

window.addEventListener("resize", function () {
    if (screenWidth < threshold) {
        element.classList.remove("expand");
    } else if (screenWidth >= threshold) {
        element.classList.toggle("expand");
    }
});

if (screenWidth < threshold) {
    element.classList.remove("expand");
}

// image
