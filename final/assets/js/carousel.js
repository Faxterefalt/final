// Carrusel automático de imágenes
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.indicator');
    let currentSlide = 0;
    const slideInterval = 2000; // 2 segundos

    function showSlide(index) {
        // Remover clase active de todos
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));

        // Agregar clase active al slide actual
        slides[index].classList.add('active');
        indicators[index].classList.add('active');
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    // Cambiar automáticamente cada 2 segundos
    let autoPlay = setInterval(nextSlide, slideInterval);

    // Click en indicadores
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentSlide = index;
            showSlide(currentSlide);
            
            // Reiniciar autoplay
            clearInterval(autoPlay);
            autoPlay = setInterval(nextSlide, slideInterval);
        });
    });

    // Pausar en hover (opcional)
    const carouselWrapper = document.querySelector('.carousel-wrapper');
    if (carouselWrapper) {
        carouselWrapper.addEventListener('mouseenter', () => {
            clearInterval(autoPlay);
        });

        carouselWrapper.addEventListener('mouseleave', () => {
            autoPlay = setInterval(nextSlide, slideInterval);
        });
    }
});