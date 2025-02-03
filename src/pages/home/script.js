let slideIndex = 0;
MostrarImagem();

function MostrarImagem() {
    const slides = document.querySelectorAll('.imagens img');
    const dots = document.querySelectorAll('.dot');

    slides.forEach(slide => {
        slide.style.opacity = '0';
        slide.classList.remove('active');
    });
    dots.forEach(dot => dot.classList.remove('active'));
    
    slideIndex++;
    if (slideIndex > slides.length) slideIndex = 1;
    slides[slideIndex - 1].style.opacity = '1';
    slides[slideIndex - 1].classList.add('active');
    dots[slideIndex - 1].classList.add('active');
    setTimeout(MostrarImagem, 5000);
}

function ImagemAtual(n) {
    slideIndex = n - 1;
    MostrarImagem();
} 