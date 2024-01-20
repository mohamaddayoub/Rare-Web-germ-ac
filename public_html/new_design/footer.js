window.addEventListener('scroll', function () {
    var button = document.getElementById('scrollTopBtn');
    if (window.pageYOffset > 100) {
        button.style.display = 'block';
    } else {
        button.style.display = 'none';
    }
});

document.getElementById('scrollTopBtn').addEventListener('click', function () {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});
