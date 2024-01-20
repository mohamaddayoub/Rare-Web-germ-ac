let full = document.querySelectorAll(".slider .full");
let leftBtn = document.querySelector(".slider .left");
let rightBtn = document.querySelector(".slider .right");
let bull = document.querySelectorAll(".slider ul li");

let activeElement = 0;
tglSlide();

leftBtn.addEventListener("click", () => {
    activeElement -= 1;
    tglSlide();
});

rightBtn.addEventListener("click", () => {
    activeElement += 1;
    tglSlide();
})

for (let i = 0; i < bull.length; i++) {
    bull[i].addEventListener("click", () => {
        activeElement = i;
        tglSlide();
    })
}

setInterval(() => {
    if (activeElement == full.length - 1) {
        activeElement = 0
    }
    else {
        activeElement += 1;
    }
    tglSlide();
}, 3300);

function tglSlide() {
    for (let i = 0; i < full.length; i++) {
        full[i].classList.remove("active");
    }

    if (activeElement < 0) {
        activeElement = full.length - 1;
    }

    if (activeElement > full.length - 1) {
        activeElement = 0;
    }

    full[activeElement].classList.add("active");

    for (let i = 0; i < bull.length; i++) {
        bull[i].classList.remove("active");
    }

    bull[activeElement].classList.add("active");
}
