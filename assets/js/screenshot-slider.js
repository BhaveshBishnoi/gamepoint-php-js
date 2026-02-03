// Screenshot Slider JavaScript
document.addEventListener('DOMContentLoaded', function () {
    initScreenshotSliders();
});

function initScreenshotSliders() {
    const sliders = document.querySelectorAll('.screenshot-slider');

    sliders.forEach(function (slider) {
        const wrapper = slider.querySelector('.screenshot-wrapper');
        const prevBtn = slider.querySelector('.screenshot-btn.prev');
        const nextBtn = slider.querySelector('.screenshot-btn.next');

        if (!wrapper) return;

        function scrollToPosition(position) {
            wrapper.scrollTo({
                left: position,
                behavior: 'smooth'
            });
        }

        function scrollNext() {
            const scrollAmount = 300; // Width of one screenshot item
            const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;
            const currentScroll = wrapper.scrollLeft;

            if (currentScroll >= maxScroll - 10) {
                scrollToPosition(0);
            } else {
                scrollToPosition(currentScroll + scrollAmount);
            }
        }

        function scrollPrev() {
            const scrollAmount = 300;
            const currentScroll = wrapper.scrollLeft;

            if (currentScroll <= 0) {
                scrollToPosition(wrapper.scrollWidth - wrapper.clientWidth);
            } else {
                scrollToPosition(currentScroll - scrollAmount);
            }
        }

        // Event listeners
        if (prevBtn) {
            prevBtn.addEventListener('click', scrollPrev);
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', scrollNext);
        }

        // Touch/swipe support
        let touchStartX = 0;
        let touchEndX = 0;

        wrapper.addEventListener('touchstart', function (e) {
            touchStartX = e.changedTouches[0].screenX;
        });

        wrapper.addEventListener('touchend', function (e) {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    scrollNext();
                } else {
                    scrollPrev();
                }
            }
        }
    });
}
