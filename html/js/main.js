// Portfolio Slider Class
class PortfolioSlider {
    constructor() {
        this.slider = document.getElementById('portfolioSlider');
        this.slides = document.querySelectorAll('.portfolio-slide');
        this.prevBtn = document.getElementById('prevBtn');
        this.nextBtn = document.getElementById('nextBtn');
        this.dotsContainer = document.getElementById('sliderDots');
        this.progressBar = document.getElementById('progressBar');
        
        this.currentIndex = 0;
        this.autoPlayInterval = null;
        this.autoPlayDuration = 5000; // 5 seconds
        this.progressInterval = null;
        
        this.slidesToShow = this.getSlidesToShow();
        this.totalSlides = this.slides.length;
        this.maxIndex = Math.max(0, this.totalSlides - this.slidesToShow);
        
        if (this.slider && this.slides.length > 0) {
            this.init();
        }
    }
    
    getSlidesToShow() {
        if (window.innerWidth <= 768) {
            return 1; // Mobile: 1 slide
        } else if (window.innerWidth <= 1024) {
            return 2; // Tablet: 2 slides
        } else {
            return 5; // Desktop: 5 slides
        }
    }
    
    init() {
        this.createDots();
        this.updateSlider();
        this.bindEvents();
        this.startAutoPlay();
    }
    
    createDots() {
        if (!this.dotsContainer) return;
        
        this.dotsContainer.innerHTML = '';
        const dotsCount = this.maxIndex + 1;
        
        for (let i = 0; i < dotsCount; i++) {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => this.goToSlide(i));
            this.dotsContainer.appendChild(dot);
        }
    }
    
    bindEvents() {
        if (this.prevBtn) this.prevBtn.addEventListener('click', () => this.prevSlide());
        if (this.nextBtn) this.nextBtn.addEventListener('click', () => this.nextSlide());
        
        // Touch/swipe support
        let startX = 0;
        let endX = 0;
        
        this.slider.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });
        
        this.slider.addEventListener('touchmove', (e) => {
            endX = e.touches[0].clientX;
        });
        
        this.slider.addEventListener('touchend', () => {
            const threshold = 50;
            const diff = startX - endX;
            
            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
        });
        
        // Pause autoplay on hover
        this.slider.addEventListener('mouseenter', () => this.pauseAutoPlay());
        this.slider.addEventListener('mouseleave', () => this.startAutoPlay());
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.prevSlide();
            if (e.key === 'ArrowRight') this.nextSlide();
        });
        
        // Resize handler
        window.addEventListener('resize', () => {
            const newSlidesToShow = this.getSlidesToShow();
            if (newSlidesToShow !== this.slidesToShow) {
                this.slidesToShow = newSlidesToShow;
                this.maxIndex = Math.max(0, this.totalSlides - this.slidesToShow);
                this.currentIndex = Math.min(this.currentIndex, this.maxIndex);
                this.createDots();
                this.updateSlider();
            }
        });
    }
    
    updateSlider() {
        if (!this.slides[0]) return;
        
        const slideWidth = this.slides[0].offsetWidth + 20; // including gap
        const translateX = -this.currentIndex * slideWidth;
        
        this.slider.style.transform = `translateX(${translateX}px)`;
        
        // Update dots
        const dots = this.dotsContainer?.querySelectorAll('.dot');
        dots?.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentIndex);
        });
        
        // Update navigation buttons
        if (this.prevBtn) this.prevBtn.style.opacity = this.currentIndex === 0 ? '0.5' : '1';
        if (this.nextBtn) this.nextBtn.style.opacity = this.currentIndex === this.maxIndex ? '0.5' : '1';
    }
    
    nextSlide() {
        if (this.currentIndex < this.maxIndex) {
            this.currentIndex++;
        } else {
            this.currentIndex = 0; // Loop back to start
        }
        this.updateSlider();
        this.restartAutoPlay();
    }
    
    prevSlide() {
        if (this.currentIndex > 0) {
            this.currentIndex--;
        } else {
            this.currentIndex = this.maxIndex; // Loop to end
        }
        this.updateSlider();
        this.restartAutoPlay();
    }
    
    goToSlide(index) {
        this.currentIndex = index;
        this.updateSlider();
        this.restartAutoPlay();
    }
    
    startAutoPlay() {
        this.stopAutoPlay();
        this.startProgress();
        
        this.autoPlayInterval = setInterval(() => {
            this.nextSlide();
        }, this.autoPlayDuration);
    }
    
    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
        this.stopProgress();
    }
    
    pauseAutoPlay() {
        this.stopAutoPlay();
    }
    
    restartAutoPlay() {
        this.startAutoPlay();
    }
    
    startProgress() {
        this.stopProgress();
        if (!this.progressBar) return;
        
        let progress = 0;
        const increment = 100 / (this.autoPlayDuration / 100);
        
        this.progressInterval = setInterval(() => {
            progress += increment;
            this.progressBar.style.width = progress + '%';
            
            if (progress >= 100) {
                progress = 0;
                this.progressBar.style.width = '0%';
            }
        }, 100);
    }
    
    stopProgress() {
        if (this.progressInterval) {
            clearInterval(this.progressInterval);
            this.progressInterval = null;
        }
        if (this.progressBar) this.progressBar.style.width = '0%';
    }
}

// Team Slider Class
class TeamSlider {
    constructor() {
        this.slider = document.getElementById('teamSlider');
        this.slides = document.querySelectorAll('.team-slide');
        this.prevBtn = document.getElementById('teamPrevBtn');
        this.nextBtn = document.getElementById('teamNextBtn');
        this.dotsContainer = document.getElementById('teamSliderDots');
        this.progressBar = document.getElementById('teamProgressBar');
        
        this.currentIndex = 0;
        this.autoPlayInterval = null;
        this.autoPlayDuration = 6000; // 6 seconds (slower than portfolio)
        this.progressInterval = null;
        
        this.slidesToShow = this.getSlidesToShow();
        this.totalSlides = this.slides.length;
        this.maxIndex = Math.max(0, this.totalSlides - this.slidesToShow);
        
        if (this.slider && this.slides.length > 0) {
            this.init();
        }
    }
    
    getSlidesToShow() {
        if (window.innerWidth <= 768) {
            return 1; // Mobile: 1 slide
        } else if (window.innerWidth <= 1024) {
            return 2; // Tablet: 2 slides
        } else if (window.innerWidth <= 1200) {
            return 3; // Large tablet: 3 slides
        } else {
            return 4; // Desktop: 4 slides
        }
    }
    
    init() {
        this.createDots();
        this.updateSlider();
        this.bindEvents();
        this.startAutoPlay();
    }
    
    createDots() {
        if (!this.dotsContainer) return;
        
        this.dotsContainer.innerHTML = '';
        const dotsCount = this.maxIndex + 1;
        
        for (let i = 0; i < dotsCount; i++) {
            const dot = document.createElement('div');
            dot.classList.add('dot');
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => this.goToSlide(i));
            this.dotsContainer.appendChild(dot);
        }
    }
    
    bindEvents() {
        if (this.prevBtn) this.prevBtn.addEventListener('click', () => this.prevSlide());
        if (this.nextBtn) this.nextBtn.addEventListener('click', () => this.nextSlide());
        
        // Touch/swipe support
        let startX = 0;
        let endX = 0;
        
        this.slider.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });
        
        this.slider.addEventListener('touchmove', (e) => {
            endX = e.touches[0].clientX;
        });
        
        this.slider.addEventListener('touchend', () => {
            const threshold = 50;
            const diff = startX - endX;
            
            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    this.nextSlide();
                } else {
                    this.prevSlide();
                }
            }
        });
        
        // Pause autoplay on hover
        this.slider.addEventListener('mouseenter', () => this.pauseAutoPlay());
        this.slider.addEventListener('mouseleave', () => this.startAutoPlay());
        
        // Resize handler
        window.addEventListener('resize', () => {
            const newSlidesToShow = this.getSlidesToShow();
            if (newSlidesToShow !== this.slidesToShow) {
                this.slidesToShow = newSlidesToShow;
                this.maxIndex = Math.max(0, this.totalSlides - this.slidesToShow);
                this.currentIndex = Math.min(this.currentIndex, this.maxIndex);
                this.createDots();
                this.updateSlider();
            }
        });
    }
    
    updateSlider() {
        if (!this.slides[0]) return;
        
        const slideWidth = this.slides[0].offsetWidth + 20; // including gap
        const translateX = -this.currentIndex * slideWidth;
        
        this.slider.style.transform = `translateX(${translateX}px)`;
        
        // Update dots
        const dots = this.dotsContainer?.querySelectorAll('.dot');
        dots?.forEach((dot, index) => {
            dot.classList.toggle('active', index === this.currentIndex);
        });
        
        // Update navigation buttons
        if (this.prevBtn) this.prevBtn.style.opacity = this.currentIndex === 0 ? '0.5' : '1';
        if (this.nextBtn) this.nextBtn.style.opacity = this.currentIndex === this.maxIndex ? '0.5' : '1';
    }
    
    nextSlide() {
        if (this.currentIndex < this.maxIndex) {
            this.currentIndex++;
        } else {
            this.currentIndex = 0; // Loop back to start
        }
        this.updateSlider();
        this.restartAutoPlay();
    }
    
    prevSlide() {
        if (this.currentIndex > 0) {
            this.currentIndex--;
        } else {
            this.currentIndex = this.maxIndex; // Loop to end
        }
        this.updateSlider();
        this.restartAutoPlay();
    }
    
    goToSlide(index) {
        this.currentIndex = index;
        this.updateSlider();
        this.restartAutoPlay();
    }
    
    startAutoPlay() {
        this.stopAutoPlay();
        this.startProgress();
        
        this.autoPlayInterval = setInterval(() => {
            this.nextSlide();
        }, this.autoPlayDuration);
    }
    
    stopAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
        this.stopProgress();
    }
    
    pauseAutoPlay() {
        this.stopAutoPlay();
    }
    
    restartAutoPlay() {
        this.startAutoPlay();
    }
    
    startProgress() {
        this.stopProgress();
        if (!this.progressBar) return;
        
        let progress = 0;
        const increment = 100 / (this.autoPlayDuration / 100);
        
        this.progressInterval = setInterval(() => {
            progress += increment;
            this.progressBar.style.width = progress + '%';
            
            if (progress >= 100) {
                progress = 0;
                this.progressBar.style.width = '0%';
            }
        }, 100);
    }
    
    stopProgress() {
        if (this.progressInterval) {
            clearInterval(this.progressInterval);
            this.progressInterval = null;
        }
        if (this.progressBar) this.progressBar.style.width = '0%';
    }
}

// Counter Animation
function animateCounters() {
    const counters = document.querySelectorAll('.counter');
    
    counters.forEach(counter => {
        const target = parseInt(counter.textContent);
        const increment = target / 200;
        let current = 0;
        
        const updateCounter = () => {
            if (current < target) {
                current += increment;
                counter.textContent = Math.ceil(current);
                setTimeout(updateCounter, 10);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    });
}

// Intersection Observer for counter animation
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            animateCounters();
            counterObserver.unobserve(entry.target);
        }
    });
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Header scroll effect
window.addEventListener('scroll', () => {
    const header = document.querySelector('.header-area');
    if (header) {
        if (window.scrollY > 100) {
            header.classList.add('sticky');
        } else {
            header.classList.remove('sticky');
        }
    }
});

// Add animation on scroll
const animateOnScroll = () => {
    const elements = document.querySelectorAll('.single-services, .single-member, .single-awesome-project');
    
    elements.forEach(element => {
        const elementTop = element.getBoundingClientRect().top;
        const elementVisible = 150;
        
        if (elementTop < window.innerHeight - elementVisible) {
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        }
    });
};

// Simple testimonial rotation
let currentTestimonial = 0;
const testimonials = [
    {
        text: "Discreet and reliable. The companion was stunning and intelligent—a great experience.",
        author: "Lucinda",
        position: "General Customer"
    },
    {
        text: "Amazing service! My first time using an agency, and it couldn’t have been better.",
        author: "Jocelyn",
        position: "General Customer"
    },
    {
        text: "Discreet and reliable. The companion was stunning and intelligent—a great experience.",
        author: "Maria Santos",
        position: "General Customer"
    },
    {
        text: "Amazing.",
        author: "Harmony",
        position: "General Customer"
    }
];

function rotateTestimonials() {
    const testimonialElement = document.querySelector('.single-testi');
    if (testimonialElement) {
        const currentTest = testimonials[currentTestimonial];
        
        const clientsText = testimonialElement.querySelector('.clients-text');
        const guestName = testimonialElement.querySelector('.guest-details h4');
        const guestRev = testimonialElement.querySelector('.guest-rev');
        
        if (clientsText) clientsText.textContent = `"${currentTest.text}"`;
        if (guestName) guestName.textContent = currentTest.author;
        if (guestRev) guestRev.textContent = currentTest.position;
        
        currentTestimonial = (currentTestimonial + 1) % testimonials.length;
    }
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    // Initialize Portfolio Slider
    const portfolioSlider = new PortfolioSlider();
    
    // Initialize Team Slider
    const teamSlider = new TeamSlider();
    
    // Make them globally accessible for external controls
    window.portfolioSlider = portfolioSlider;
    window.teamSlider = teamSlider;
    
    // Initialize counter observer
    const counterSection = document.querySelector('.counter-area');
    if (counterSection) {
        counterObserver.observe(counterSection);
    }
    
    // Initial setup for animations
    document.querySelectorAll('.single-services, .single-member, .single-awesome-project').forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'all 0.6s ease';
    });
    
    // Start scroll animations
    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Run once on load
    
    // Start testimonial rotation
    setInterval(rotateTestimonials, 5000);
    
    console.log('Portfolio Slider loaded successfully!');
});

// Additional utility functions for portfolio slider
const PortfolioUtils = {
    // Function to dynamically add new slides
    addSlide: function(imageUrl, altText) {
        const slider = document.getElementById('portfolioSlider');
        if (!slider) return;
        
        const newSlide = document.createElement('div');
        newSlide.className = 'portfolio-slide';
        
        newSlide.innerHTML = `
            <div class="single-awesome-project">
                <div class="awesome-img">
                    <img src="${imageUrl}" alt="${altText}">
                    <i class="fa fa-search-plus"></i>
                </div>
            </div>
        `;
        
        slider.appendChild(newSlide);
        
        // Reinitialize slider if needed
        if (window.portfolioSlider) {
            window.portfolioSlider.slides = document.querySelectorAll('.portfolio-slide');
            window.portfolioSlider.totalSlides = window.portfolioSlider.slides.length;
            window.portfolioSlider.maxIndex = Math.max(0, window.portfolioSlider.totalSlides - window.portfolioSlider.slidesToShow);
            window.portfolioSlider.createDots();
        }
    },
    
    // Function to remove a slide by index
    removeSlide: function(index) {
        const slides = document.querySelectorAll('.portfolio-slide');
        if (slides[index]) {
            slides[index].remove();
            
            // Reinitialize slider if needed
            if (window.portfolioSlider) {
                window.portfolioSlider.slides = document.querySelectorAll('.portfolio-slide');
                window.portfolioSlider.totalSlides = window.portfolioSlider.slides.length;
                window.portfolioSlider.maxIndex = Math.max(0, window.portfolioSlider.totalSlides - window.portfolioSlider.slidesToShow);
                window.portfolioSlider.currentIndex = Math.min(window.portfolioSlider.currentIndex, window.portfolioSlider.maxIndex);
                window.portfolioSlider.createDots();
                window.portfolioSlider.updateSlider();
            }
        }
    },
    
    // Function to get current slide index
    getCurrentSlide: function() {
        return window.portfolioSlider ? window.portfolioSlider.currentIndex : 0;
    },
    
    // Function to go to specific slide
    goToSlide: function(index) {
        if (window.portfolioSlider) {
            window.portfolioSlider.goToSlide(index);
        }
    },
    
    // Function to pause/resume autoplay
    toggleAutoPlay: function() {
        if (window.portfolioSlider) {
            if (window.portfolioSlider.autoPlayInterval) {
                window.portfolioSlider.pauseAutoPlay();
            } else {
                window.portfolioSlider.startAutoPlay();
            }
        }
    }
};

// Make utilities globally accessible
window.PortfolioUtils = PortfolioUtils;

// Team Slider Utilities
const TeamUtils = {
    addModel: function(imageUrl, name, description, profileUrl) {
        const slider = document.getElementById('teamSlider');
        if (!slider) return;
        
        const newSlide = document.createElement('div');
        newSlide.className = 'team-slide';
        
        newSlide.innerHTML = `
            <div class="single-member">
                <div class="team-img">
                    <img src="${imageUrl}" alt="${name}">
                </div>
                <div class="team-content text-center">
                    <h4>${name}</h4>
                    <p>${description}</p>
                    <ul class="social-icon">
                        <li><a class="website" href="${profileUrl}" target="_blank" title="View Profile"><i class="fas fa-globe"></i></a></li>
                        <li><a class="telegram" href="https://t.me/singapore_geylang_angel" target="_blank" title="Contact on Telegram"><i class="fab fa-telegram"></i></a></li>
                    </ul>
                </div>
            </div>
        `;
        
        slider.appendChild(newSlide);
        
        // Reinitialize slider
        if (window.teamSlider) {
            window.teamSlider.slides = document.querySelectorAll('.team-slide');
            window.teamSlider.totalSlides = window.teamSlider.slides.length;
            window.teamSlider.maxIndex = Math.max(0, window.teamSlider.totalSlides - window.teamSlider.slidesToShow);
            window.teamSlider.createDots();
        }
    },
    
    removeModel: function(index) {
        const slides = document.querySelectorAll('.team-slide');
        if (slides[index]) {
            slides[index].remove();
            
            // Reinitialize slider
            if (window.teamSlider) {
                window.teamSlider.slides = document.querySelectorAll('.team-slide');
                window.teamSlider.totalSlides = window.teamSlider.slides.length;
                window.teamSlider.maxIndex = Math.max(0, window.teamSlider.totalSlides - window.teamSlider.slidesToShow);
                window.teamSlider.currentIndex = Math.min(window.teamSlider.currentIndex, window.teamSlider.maxIndex);
                window.teamSlider.createDots();
                window.teamSlider.updateSlider();
            }
        }
    },
    
    getCurrentSlide: function() {
        return window.teamSlider ? window.teamSlider.currentIndex : 0;
    },
    
    goToSlide: function(index) {
        if (window.teamSlider) {
            window.teamSlider.goToSlide(index);
        }
    },
    
    toggleAutoPlay: function() {
        if (window.teamSlider) {
            if (window.teamSlider.autoPlayInterval) {
                window.teamSlider.pauseAutoPlay();
            } else {
                window.teamSlider.startAutoPlay();
            }
        }
    }
};

// FAQ Animation and Enhancement
document.addEventListener('DOMContentLoaded', () => {
    // Animate FAQ items on scroll
    const animateFAQOnScroll = () => {
        const faqItems = document.querySelectorAll('.faq-item');
        
        faqItems.forEach((item, index) => {
            const itemTop = item.getBoundingClientRect().top;
            const itemVisible = 150;
            
            if (itemTop < window.innerHeight - itemVisible) {
                setTimeout(() => {
                    item.classList.add('animate');
                }, index * 100); // Stagger animation
            }
        });
    };

    // FAQ Collapse Enhancement
    const enhanceFAQCollapse = () => {
        const faqHeaders = document.querySelectorAll('.faq-header');
        
        faqHeaders.forEach(header => {
            header.addEventListener('click', () => {
                // Close other open items (optional accordion behavior)
                const isCurrentlyExpanded = header.getAttribute('aria-expanded') === 'true';
                
                if (!isCurrentlyExpanded) {
                    // Close all other items
                    faqHeaders.forEach(otherHeader => {
                        if (otherHeader !== header) {
                            otherHeader.setAttribute('aria-expanded', 'false');
                            const otherTarget = document.querySelector(otherHeader.getAttribute('data-bs-target'));
                            if (otherTarget && otherTarget.classList.contains('show')) {
                                otherTarget.classList.remove('show');
                            }
                        }
                    });
                }
                
                // Add smooth scroll to opened item
                setTimeout(() => {
                    if (header.getAttribute('aria-expanded') === 'true') {
                        header.scrollIntoView({
                            behavior: 'smooth',
                            block: 'nearest'
                        });
                    }
                }, 350);
            });
        });
    };

    // Search FAQ functionality
    const addFAQSearch = () => {
        // Create search input if doesn't exist
        const faqSection = document.querySelector('#faq');
        const existingSearch = document.querySelector('.faq-search');
        
        if (faqSection && !existingSearch) {
            const searchContainer = document.createElement('div');
            searchContainer.className = 'faq-search-container text-center mb-4';
            searchContainer.innerHTML = `
                <div class="faq-search">
                    <input type="text" id="faqSearchInput" class="form-control" placeholder="Search FAQ..." style="
                        background: rgba(42, 42, 42, 0.8);
                        border: 1px solid rgba(176, 141, 87, 0.3);
                        color: white;
                        border-radius: 25px;
                        padding: 12px 20px;
                        max-width: 400px;
                        margin: 0 auto;
                    ">
                </div>
            `;
            
            const faqAccordion = document.querySelector('.faq-accordion');
            faqAccordion.parentNode.insertBefore(searchContainer, faqAccordion);
            
            // Search functionality
            const searchInput = document.getElementById('faqSearchInput');
            searchInput.addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                const faqItems = document.querySelectorAll('.faq-item');
                
                faqItems.forEach(item => {
                    const question = item.querySelector('.faq-header h4').textContent.toLowerCase();
                    const answer = item.querySelector('.faq-body').textContent.toLowerCase();
                    
                    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                        item.style.display = 'block';
                        item.style.opacity = '1';
                    } else {
                        item.style.display = searchTerm === '' ? 'block' : 'none';
                    }
                });
            });
        }
    };

    // FAQ Analytics (track which questions are most opened)
    const trackFAQAnalytics = () => {
        const faqHeaders = document.querySelectorAll('.faq-header');
        
        faqHeaders.forEach((header, index) => {
            header.addEventListener('click', () => {
                // You can send this data to your analytics service
                console.log(`FAQ ${index + 1} opened:`, header.querySelector('h4').textContent);
                
                // Example: Send to Google Analytics
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'faq_open', {
                        'event_category': 'FAQ',
                        'event_label': `Question ${index + 1}`,
                        'value': index + 1
                    });
                }
            });
        });
    };

    // FAQ Auto-expand based on URL hash
    const handleFAQDeepLinking = () => {
        const hash = window.location.hash;
        if (hash && hash.startsWith('#faq')) {
            const faqNumber = hash.replace('#faq', '');
            const targetFAQ = document.querySelector(`#faq${faqNumber}`);
            
            if (targetFAQ) {
                // Open the FAQ
                const header = document.querySelector(`[data-bs-target="#faq${faqNumber}"]`);
                if (header) {
                    header.click();
                    
                    // Scroll to FAQ after a delay
                    setTimeout(() => {
                        targetFAQ.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }, 500);
                }
            }
        }
    };

    // Copy FAQ link functionality
    const addCopyLinkFeature = () => {
        const faqHeaders = document.querySelectorAll('.faq-header');
        
        faqHeaders.forEach((header, index) => {
            header.addEventListener('contextmenu', (e) => {
                e.preventDefault();
                
                const faqNumber = index + 1;
                const url = `${window.location.origin}${window.location.pathname}#faq${faqNumber}`;
                
                // Copy to clipboard
                navigator.clipboard.writeText(url).then(() => {
                    // Show temporary tooltip
                    const tooltip = document.createElement('div');
                    tooltip.textContent = 'Link copied!';
                    tooltip.style.cssText = `
                        position: absolute;
                        background: #B08D57;
                        color: white;
                        padding: 5px 10px;
                        border-radius: 5px;
                        font-size: 12px;
                        z-index: 1000;
                        pointer-events: none;
                    `;
                    
                    header.appendChild(tooltip);
                    
                    setTimeout(() => {
                        tooltip.remove();
                    }, 2000);
                });
            });
        });
    };

    // Initialize all FAQ enhancements
    window.addEventListener('scroll', animateFAQOnScroll);
    animateFAQOnScroll(); // Run once on load
    
    enhanceFAQCollapse();
    addFAQSearch();
    trackFAQAnalytics();
    handleFAQDeepLinking();
    addCopyLinkFeature();
    
    console.log('FAQ enhancements loaded successfully!');
});

// Make team utilities globally accessible
window.TeamUtils = TeamUtils;