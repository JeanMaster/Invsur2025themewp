document.addEventListener('DOMContentLoaded', function() {
    const track = document.querySelector('.carousel__track');
    const slides = Array.from(track.children);
    const nextButton = document.querySelector('.carousel__button--next');
    const prevButton = document.querySelector('.carousel__button--prev');
    
    let currentIndex = 0;
    
    // Configurar posición inicial
    slides.forEach((slide, index) => {
        slide.style.left = index * 100 + '%';
    });
    
    // Función para mover slides
    function moveSlides(direction) {
        currentIndex = direction === 'next' 
            ? (currentIndex + 1) % slides.length 
            : (currentIndex - 1 + slides.length) % slides.length;
            
        track.style.transform = `translateX(-${currentIndex * 100}%)`;
    }
    
    // Event listeners para los botones
    nextButton.addEventListener('click', () => moveSlides('next'));
    prevButton.addEventListener('click', () => moveSlides('prev'));
    
    // Autoplay opcional
    setInterval(() => moveSlides('next'), 5000);
}); 