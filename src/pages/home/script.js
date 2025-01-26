let slideIndex = 0;
MostrarImagens();

function MostrarImagens() {
    let slides = document.querySelectorAll('.imagens img');
    let dots = document.querySelectorAll('.dot');
    slides.forEach((slide, index) => {
        slide.style.display = 'none';
    });
    dots.forEach((dot, index) => {
        dot.className = dot.className.replace(' active', '');
    });
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].className += ' active';
    setTimeout(MostrarImagens, 3000); // Muda a imagem a cada 3 segundos
}

function currentSlide(n) {
    slideIndex = n - 1;
    MostrarImagens();
}