// Main JavaScript file
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    initMobileMenu();
    
    // Banner carousel
    initBannerCarousel();
    
    // Smooth scroll
    initSmoothScroll();
});

// Mobile Menu
function initMobileMenu() {
    const toggle = document.querySelector('.mobile-menu-toggle');
    const menu = document.querySelector('.mobile-menu');
    const dropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');
    
    if (toggle && menu) {
        toggle.addEventListener('click', function() {
            toggle.classList.toggle('active');
            menu.classList.toggle('active');
            document.body.style.overflow = menu.classList.contains('active') ? 'hidden' : '';
        });
        
        // Close menu when clicking outside
        menu.addEventListener('click', function(e) {
            if (e.target === menu) {
                toggle.classList.remove('active');
                menu.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }
    
    // Mobile dropdown toggles
    dropdownToggles.forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const dropdownMenu = this.nextElementSibling;
            const icon = this.querySelector('.dropdown-icon');
            
            if (dropdownMenu && dropdownMenu.classList.contains('mobile-dropdown-menu')) {
                dropdownMenu.classList.toggle('active');
                if (icon) {
                    icon.style.transform = dropdownMenu.classList.contains('active') 
                        ? 'rotate(180deg)' 
                        : 'rotate(0deg)';
                }
            }
        });
    });
}

// Banner Carousel
function initBannerCarousel() {
    const carousel = document.querySelector('.banner-carousel');
    if (!carousel) return;
    
    const wrapper = carousel.querySelector('.banner-carousel-wrapper');
    const slides = carousel.querySelectorAll('.banner-slide');
    const prevBtn = carousel.querySelector('.carousel-btn.prev');
    const nextBtn = carousel.querySelector('.carousel-btn.next');
    const dots = carousel.querySelectorAll('.carousel-dots .dot');
    
    if (slides.length <= 1) return;
    
    let currentIndex = 0;
    let autoPlayInterval;
    
    function showSlide(index) {
        slides.forEach(function(slide, i) {
            slide.classList.toggle('active', i === index);
        });
        
        dots.forEach(function(dot, i) {
            dot.classList.toggle('active', i === index);
        });
        
        currentIndex = index;
    }
    
    function nextSlide() {
        const next = (currentIndex + 1) % slides.length;
        showSlide(next);
    }
    
    function prevSlide() {
        const prev = (currentIndex - 1 + slides.length) % slides.length;
        showSlide(prev);
    }
    
    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, 6000);
    }
    
    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }
    
    // Event listeners
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            prevSlide();
            stopAutoPlay();
            startAutoPlay();
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            nextSlide();
            stopAutoPlay();
            startAutoPlay();
        });
    }
    
    dots.forEach(function(dot, index) {
        dot.addEventListener('click', function() {
            showSlide(index);
            stopAutoPlay();
            startAutoPlay();
        });
    });
    
    // Pause on hover
    carousel.addEventListener('mouseenter', stopAutoPlay);
    carousel.addEventListener('mouseleave', startAutoPlay);
    
    // Start autoplay
    startAutoPlay();
}

// Smooth Scroll
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(function(anchor) {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            e.preventDefault();
            const target = document.querySelector(href);
            
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// Lazy load images
function initLazyLoad() {
    const images = document.querySelectorAll('img[loading="lazy"]');
    
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src || img.src;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        });
        
        images.forEach(function(img) {
            imageObserver.observe(img);
        });
    }
}

// Initialize lazy loading
initLazyLoad();
