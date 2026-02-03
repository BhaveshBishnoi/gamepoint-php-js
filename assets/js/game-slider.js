// Game Slider JavaScript
document.addEventListener('DOMContentLoaded', function () {
    initGameSliders();
});

function initGameSliders() {
    const sliders = document.querySelectorAll('.game-slider');

    sliders.forEach(function (slider) {
        // Find existing elements or create them if missing (for React-like component structure)
        let wrapper = slider.querySelector('.game-slider-wrapper');
        let prevBtn = slider.querySelector('.slider-btn.prev');
        let nextBtn = slider.querySelector('.slider-btn.next');
        const autoPlay = slider.dataset.autoplay === 'true';
        const interval = parseInt(slider.dataset.interval) || 5000;

        if (!wrapper) {
            // Check if wrapper uses different classname from previous updates
            wrapper = slider.querySelector('[class*="wrapper"]') || slider.firstElementChild;
        }

        if (!wrapper) return;

        let autoPlayInterval;
        let isPaused = false;

        // --- Core Scrolling Logic ---
        function scrollToPosition(position) {
            wrapper.scrollTo({
                left: position,
                behavior: 'smooth'
            });
        }

        function scrollNext() {
            if (isPaused) return;

            // Calculate card width based on screen size (desktop: 1/6, tablet: 1/4, mobile: 1/2 approx)
            const itemWidth = wrapper.firstElementChild ? wrapper.firstElementChild.getBoundingClientRect().width : 200;
            const scrollAmount = itemWidth; // Scroll 1 item at a time for smoother effect

            const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;
            const currentScroll = wrapper.scrollLeft;

            if (currentScroll >= maxScroll - 5) {
                scrollToPosition(0); // Reset to start
            } else {
                scrollToPosition(currentScroll + scrollAmount);
            }
        }

        function scrollPrev() {
            const itemWidth = wrapper.firstElementChild ? wrapper.firstElementChild.getBoundingClientRect().width : 200;
            const currentScroll = wrapper.scrollLeft;

            if (currentScroll <= 0) {
                // To go to end
                scrollToPosition(wrapper.scrollWidth - wrapper.clientWidth);
            } else {
                scrollToPosition(currentScroll - itemWidth);
            }
        }

        // --- Auto Play Logic ---
        function startAutoPlay() {
            if (autoPlay && !autoPlayInterval) {
                autoPlayInterval = setInterval(scrollNext, interval);
            }
        }

        function stopAutoPlay() {
            if (autoPlayInterval) {
                clearInterval(autoPlayInterval);
                autoPlayInterval = null;
            }
        }

        // --- Event Listeners ---
        if (prevBtn) {
            prevBtn.addEventListener('click', function (e) {
                e.preventDefault();
                scrollPrev();
                stopAutoPlay(); // Reset timer
                startAutoPlay();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function (e) {
                e.preventDefault();
                scrollNext();
                stopAutoPlay();
                startAutoPlay();
            });
        }

        // Pause / Resume
        slider.addEventListener('mouseenter', function () {
            isPaused = true;
            stopAutoPlay();
        });

        slider.addEventListener('mouseleave', function () {
            isPaused = false;
            startAutoPlay();
        });

        // Touch Swipe Handling
        let touchStartX = 0;
        let touchEndX = 0;

        wrapper.addEventListener('touchstart', function (e) {
            touchStartX = e.changedTouches[0].screenX;
            isPaused = true;
            stopAutoPlay();
        }, { passive: true });

        wrapper.addEventListener('touchend', function (e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            isPaused = false;
            startAutoPlay();
        }, { passive: true });

        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                // Swiped Left -> Next
                scrollNext();
            }
            if (touchEndX > touchStartX + 50) {
                // Swiped Right -> Prev
                scrollPrev();
            }
        }

        // Init
        startAutoPlay();

        // Update button visibility based on scroll
        wrapper.addEventListener('scroll', function () {
            if (!prevBtn || !nextBtn) return;

            if (wrapper.scrollLeft <= 0) {
                prevBtn.style.opacity = '0.5';
                prevBtn.style.pointerEvents = 'none';
            } else {
                prevBtn.style.opacity = '1';
                prevBtn.style.pointerEvents = 'all';
            }

            if (wrapper.scrollLeft >= wrapper.scrollWidth - wrapper.clientWidth - 5) {
                nextBtn.style.opacity = '0.5';
                nextBtn.style.pointerEvents = 'none';
            } else {
                nextBtn.style.opacity = '1';
                nextBtn.style.pointerEvents = 'all';
            }
        });
    });
}
