let navToggle = document.querySelector(".nav-toggle");
let navWrapper = document.querySelector(".nav-wrapper");

let langToggle = document.querySelector(".lang-toggle");
let langWrapper = document.querySelector(".lang-wrapper");

navToggle.addEventListener("click", function () {
    if (navWrapper.classList.contains("active")) {
        navWrapper.classList.remove("active");
    } else {
        navWrapper.classList.add("active");
    }
});

langToggle.addEventListener("click", function () {
    if (langWrapper.classList.contains("active")) {
        langWrapper.classList.remove("active");
    } else {
        langWrapper.classList.add("active");
    }
});
