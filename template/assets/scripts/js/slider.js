document.addEventListener('DOMContentLoaded', function () {
    (function () {
        let currentIndex = 0;
        const slides = document.querySelectorAll('.slide');
        const slideInterval = 3000;
        let slideTimer;

        function changeSlide(index) {
            slides[currentIndex].style.opacity = 0;
            currentIndex = index;
            slides[currentIndex].style.opacity = 1;
        }

        function startSlider() {
            slideTimer = setInterval(() => {
                changeSlide((currentIndex + 1) % slides.length);
            }, slideInterval);
        }

        function pauseSlider() {
            clearInterval(slideTimer);
        }

        function handleMouseEnter() {
            pauseSlider();
        }

        function handleMouseLeave() {
            startSlider();
        }

        function handleKeyDown(event) {
            if (event.key === 'ArrowLeft') {
                changeSlide((currentIndex - 1 + slides.length) % slides.length);
            } else if (event.key === 'ArrowRight') {
                changeSlide((currentIndex + 1) % slides.length);
            }
        }

        startSlider();

        const slider = document.querySelector('.slider');
        slider.addEventListener('mouseenter', handleMouseEnter);
        slider.addEventListener('mouseleave', handleMouseLeave);
        document.addEventListener('keydown', handleKeyDown);
    })();
});