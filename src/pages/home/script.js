let slideIndex = 0;
showSlides();

function showSlides() {
    const slides = document.querySelectorAll('.imagens img');
    const dots = document.querySelectorAll('.dot');
    
    // Remove active class from all slides and dots
    slides.forEach(slide => {
        slide.style.opacity = '0';
        slide.classList.remove('active');
    });
    dots.forEach(dot => dot.classList.remove('active'));
    
    // Increment slideIndex
    slideIndex++;
    if (slideIndex > slides.length) slideIndex = 1;
    
    // Add active class to current slide and dot
    slides[slideIndex - 1].style.opacity = '1';
    slides[slideIndex - 1].classList.add('active');
    dots[slideIndex - 1].classList.add('active');
    
    // Change slide every 5 seconds
    setTimeout(showSlides, 5000);
}

function currentSlide(n) {
    slideIndex = n - 1;
    showSlides();
} 