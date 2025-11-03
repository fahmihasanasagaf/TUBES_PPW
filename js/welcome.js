// Welcome Page Slideshow Functionality
class WelcomeSlideshow {
    constructor() {
        this.slides = document.querySelectorAll('.slide');
        this.indicators = document.querySelectorAll('.indicator');
        this.prevBtn = document.querySelector('.slide-nav.prev');
        this.nextBtn = document.querySelector('.slide-nav.next');
        this.currentSlide = 0;
        this.slideInterval = null;
        this.slideDuration = 5000; // 5 seconds
        
        this.init();
    }
    
    init() {
        this.startSlideshow();
        this.attachEventListeners();
    }
    
    startSlideshow() {
        this.slideInterval = setInterval(() => {
            this.nextSlide();
        }, this.slideDuration);
    }
    
    attachEventListeners() {
        // Navigation buttons
        this.prevBtn?.addEventListener('click', () => {
            this.prevSlide();
            this.resetInterval();
        });
        
        this.nextBtn?.addEventListener('click', () => {
            this.nextSlide();
            this.resetInterval();
        });
        
        // Indicators
        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                this.goToSlide(index);
                this.resetInterval();
            });
        });
        
        // Pause on hover
        const slideshow = document.querySelector('.hero-slideshow');
        slideshow?.addEventListener('mouseenter', () => {
            clearInterval(this.slideInterval);
        });
        
        slideshow?.addEventListener('mouseleave', () => {
            this.startSlideshow();
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') {
                this.prevSlide();
                this.resetInterval();
            } else if (e.key === 'ArrowRight') {
                this.nextSlide();
                this.resetInterval();
            }
        });
    }
    
    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.slides.length;
        this.updateSlides();
    }
    
    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
        this.updateSlides();
    }
    
    goToSlide(index) {
        this.currentSlide = index;
        this.updateSlides();
    }
    
    updateSlides() {
        // Update slides
        this.slides.forEach((slide, index) => {
            slide.classList.toggle('active', index === this.currentSlide);
        });
        
        // Update indicators
        this.indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === this.currentSlide);
        });
    }
    
    resetInterval() {
        clearInterval(this.slideInterval);
        this.startSlideshow();
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    new WelcomeSlideshow();
    
    // Add scroll animation for features and categories
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe feature cards and category cards
    document.querySelectorAll('.feature-card, .category-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'all 0.6s ease';
        observer.observe(card);
    });
});