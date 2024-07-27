var slideIndex = 0;
showSlides(false);

function plusSlides(n) {
    clearTimeout(autoSlide); // clear the existing timer
    showSlides(slideIndex += n, true);
}

function showSlides(n, manual) {
    var i;
    var slides = document.getElementsByClassName("slideshow")[0].getElementsByTagName("img");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    if (!manual) {
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
    }
    slides[slideIndex - 1].style.display = "block";
    autoSlide = setTimeout(showSlides, 5000); // Change image every 8 seconds
}