/**
 * Creative Dark Theme - Advanced JavaScript
 * Includes: GSAP animations, scroll effects, parallax, interactions
 */

// ============================================
// GLOBAL VARIABLES & INITIALIZATION
// ============================================

let isLoaded = false;
let scrollY = 0;
let ticking = false;

// ============================================
// LANGUAGE SWITCHING FUNCTIONALITY
// ============================================
// Language switching is now handled by lang.js
// This section is kept for compatibility but the actual function is in lang.js

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeWebsite();
});

// ============================================
// FONT AWESOME ICONS FIX
// ============================================

function fixFontAwesomeIcons() {
    // Check if Font Awesome is loaded
    const checkFontAwesome = setInterval(() => {
        const testIcon = document.createElement('i');
        testIcon.className = 'fas fa-home';
        testIcon.style.position = 'absolute';
        testIcon.style.left = '-9999px';
        document.body.appendChild(testIcon);
        
        const computed = window.getComputedStyle(testIcon);
        const fontFamily = computed.getPropertyValue('font-family');
        
        if (fontFamily.includes('Font Awesome')) {
            // Font Awesome is loaded, apply fixes
            applyIconFixes();
            clearInterval(checkFontAwesome);
        }
        
        document.body.removeChild(testIcon);
    }, 100);
    
    // Clear interval after 5 seconds to avoid infinite loop
    setTimeout(() => {
        clearInterval(checkFontAwesome);
        applyIconFixes(); // Apply fixes anyway
    }, 5000);
}

function applyIconFixes() {
    // Force Font Awesome styles
    const style = document.createElement('style');
    style.textContent = `
        /* Force Font Awesome icons to display properly */
        .fas, .far, .fab, .fa {
            font-family: "Font Awesome 6 Free", "Font Awesome 6 Brands" !important;
            font-weight: 900 !important;
            font-style: normal !important;
            display: inline-block !important;
        }
        
        .far {
            font-weight: 400 !important;
        }
        
        .fab {
            font-weight: 400 !important;
            font-family: "Font Awesome 6 Brands" !important;
        }
        
        /* RTL specific icon fixes */
        .rtl-body .fas, .rtl-body .far, .rtl-body .fab, .rtl-body .fa {
            direction: ltr !important;
            unicode-bidi: normal !important;
        }
        
        /* Ensure all icons are visible */
        i[class*="fa-"] {
            opacity: 1 !important;
            visibility: visible !important;
        }
    `;
    
    document.head.appendChild(style);
    
    // Fix specific RTL icon directions
    if (document.body.classList.contains('rtl-body')) {
        // Force fix after all icons are loaded
        setTimeout(() => {
            fixRTLIcons();
        }, 100);
        
        // Also fix immediately
        fixRTLIcons();
    }
}

function fixRTLIcons() {
    // Reset all icons first
    resetIconDirections();
    
    // Only apply fixes if we're in RTL mode
    if (document.body.classList.contains('rtl-body')) {
        // Fix arrow directions in RTL
        const rightArrows = document.querySelectorAll('.rtl-body .fa-arrow-right');
        rightArrows.forEach(icon => {
            icon.classList.remove('fa-arrow-right');
            icon.classList.add('fa-arrow-left');
        });
        
        // Fix chevron directions in RTL - but reverse the logic for slider
        const sliderRightChevrons = document.querySelectorAll('.rtl-body .slider-nav.next-slide .fa-chevron-right');
        sliderRightChevrons.forEach(icon => {
            icon.classList.remove('fa-chevron-right');
            icon.classList.add('fa-chevron-left');
        });
        
        const sliderLeftChevrons = document.querySelectorAll('.rtl-body .slider-nav.prev-slide .fa-chevron-left');
        sliderLeftChevrons.forEach(icon => {
            icon.classList.remove('fa-chevron-left');
            icon.classList.add('fa-chevron-right');
        });
        
        // Fix other chevrons (non-slider)
        const rightChevrons = document.querySelectorAll('.rtl-body .fa-chevron-right:not(.slider-nav .fa-chevron-right)');
        rightChevrons.forEach(icon => {
            if (!icon.closest('.slider-nav')) {
                icon.classList.remove('fa-chevron-right');
                icon.classList.add('fa-chevron-left');
            }
        });
        
        const leftChevrons = document.querySelectorAll('.rtl-body .fa-chevron-left:not(.slider-nav .fa-chevron-left)');
        leftChevrons.forEach(icon => {
            if (!icon.closest('.slider-nav')) {
                icon.classList.remove('fa-chevron-left');
                icon.classList.add('fa-chevron-right');
            }
        });
    }
}

function resetIconDirections() {
    // Reset all modified icons to their original state
    const modifiedIcons = document.querySelectorAll('.fa-arrow-left[data-original="right"], .fa-arrow-right[data-original="left"], .fa-chevron-left[data-original="right"], .fa-chevron-right[data-original="left"]');
    modifiedIcons.forEach(icon => {
        const original = icon.getAttribute('data-original');
        if (original) {
            icon.className = icon.className.replace(/fa-(arrow|chevron)-(left|right)/, `fa-$1-${original}`);
            icon.removeAttribute('data-original');
        }
    });
}

// بهینه‌سازی کیفیت ویدیو
function optimizeVideoQuality() {
    const videos = document.querySelectorAll('.slide-video');
    
    videos.forEach(video => {
        // تنظیمات کیفیت ویدیو
        video.setAttribute('playsinline', '');
        video.setAttribute('webkit-playsinline', '');
        video.preload = 'metadata';
        
        // رویداد بارگذاری ویدیو
        video.addEventListener('loadeddata', function() {
            // بهبود کیفیت رندرینگ
            this.style.imageRendering = 'crisp-edges';
            this.style.imageRendering = '-webkit-optimize-contrast';
            
            // اطمینان از پخش نرم
            this.currentTime = 0;
        });
        
        // رویداد خطا در بارگذاری
        video.addEventListener('error', function() {
            console.log('Video failed to load, showing fallback image');
            const fallback = this.parentNode.querySelector('.slide-image-fallback');
            if (fallback) {
                this.style.display = 'none';
                fallback.style.display = 'block';
            }
        });
        
        // تنظیمات پخش ویدیو
        video.addEventListener('canplay', function() {
            this.play().catch(e => {
                console.log('Autoplay prevented:', e);
                // نمایش fallback در صورت عدم پخش خودکار
                const fallback = this.parentNode.querySelector('.slide-image-fallback');
                if (fallback) {
                    fallback.style.display = 'block';
                }
            });
        });
        
        // بهینه‌سازی برای موبایل
        if (window.innerWidth <= 768) {
            video.style.filter = 'brightness(0.7) contrast(1.2) saturate(1.0)';
        }
    });
}

// Initialize website functionality
function initializeWebsite() {
    // Core functionality
    initializeLoading();
    initializeNavigation();
    initializeCursor();
    initializeScrollEffects();
    initializeAnimations();
    initializeInteractions();
    initializeParallax();
    initializeCounters();
    initializePortfolio();
    initializeForms();
    initializeHeroSlider();
    initializeGalleries();
    
    // Mark as loaded
    isLoaded = true;
}

// ============================================
// LOADING SCREEN
// ============================================

function initializeLoading() {
    const loadingScreen = document.getElementById('loading-screen');
    
    if (!loadingScreen) {
        // If no loading screen, just initialize entrance animations
        initializeEntranceAnimations();
        return;
    }
    
    const hideLoading = () => {
        if (!loadingScreen) return;
        
        loadingScreen.classList.add('fade-out');
        
        // Remove loading screen after fade animation
        setTimeout(() => {
            if (loadingScreen) {
                loadingScreen.style.display = 'none';
            }
            initializeEntranceAnimations();
        }, 800);
    };
    
    // Prefer DOM readiness over full asset load to show page faster
    if (document.readyState === 'interactive' || document.readyState === 'complete') {
        hideLoading();
    } else {
        document.addEventListener('DOMContentLoaded', hideLoading, { once: true });
    }
}

// ============================================
// CURSOR EFFECTS
// ============================================

function initializeCursor() {
    const cursor = document.querySelector('.cursor-follower');
    const cursorDot = document.querySelector('.cursor-dot');
    
    if (!cursor || !cursorDot) return;
    
    let mouseX = 0;
    let mouseY = 0;
    let cursorX = 0;
    let cursorY = 0;
    let dotX = 0;
    let dotY = 0;
    
    // Update mouse position
    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
    });
    
    // Animate cursor
    function animateCursor() {
        // Smooth cursor following
        cursorX += (mouseX - cursorX) * 0.1;
        cursorY += (mouseY - cursorY) * 0.1;
        
        dotX += (mouseX - dotX) * 0.8;
        dotY += (mouseY - dotY) * 0.8;
        
        cursor.style.transform = `translate(${cursorX - 20}px, ${cursorY - 20}px)`;
        cursorDot.style.transform = `translate(${dotX - 4}px, ${dotY - 4}px)`;
        
        requestAnimationFrame(animateCursor);
    }
    
    animateCursor();
    
    // Cursor interactions
    const interactiveElements = document.querySelectorAll('a, button, .service-card, .portfolio-card, .filter-btn');
    
    interactiveElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            cursor.style.transform += ' scale(1.5)';
            cursorDot.style.transform += ' scale(2)';
        });
        
        element.addEventListener('mouseleave', () => {
            cursor.style.transform = cursor.style.transform.replace(' scale(1.5)', '');
            cursorDot.style.transform = cursorDot.style.transform.replace(' scale(2)', '');
        });
    });
}

// ============================================
// NAVIGATION
// ============================================

function initializeNavigation() {
    const navbar = document.getElementById('navbar');
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('section[id]');
    
    // Navbar scroll effect
    function updateNavbar() {
        if (window.scrollY > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        
        // Update active nav link
        updateActiveNavLink();
    }
    
    // Update active navigation link based on scroll position
    function updateActiveNavLink() {
        let current = '';
        
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 150;
            if (window.scrollY >= sectionTop) {
                current = section.getAttribute('id');
            }
        });
        
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${current}`) {
                link.classList.add('active');
            }
        });
    }
    
    // Smooth scroll for navigation links
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            
            if (targetId.startsWith('#')) {
                const targetSection = document.querySelector(targetId);
                if (targetSection) {
                    smoothScrollTo(targetSection.offsetTop - 80);
                }
            }
        });
    });
    
    // Listen to scroll events
    window.addEventListener('scroll', updateNavbar);
    
    // Mobile menu toggle
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    
    if (navbarToggler && navbarCollapse) {
        // Remove any existing event listeners
        navbarToggler.removeEventListener('click', handleMenuToggle);
        
        function handleMenuToggle(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const isExpanded = navbarToggler.getAttribute('aria-expanded') === 'true';
            
            // Toggle states
            navbarToggler.setAttribute('aria-expanded', !isExpanded);
            
            if (isExpanded) {
                navbarCollapse.classList.remove('show');
            } else {
                navbarCollapse.classList.add('show');
            }
        }
        
        navbarToggler.addEventListener('click', handleMenuToggle);
        
        // Close mobile menu when clicking on links
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                if (navbarCollapse.classList.contains('show')) {
                    navbarCollapse.classList.remove('show');
                    navbarToggler.setAttribute('aria-expanded', 'false');
                }
            });
        });
        
        // Close menu when clicking outside (but not on toggler)
        document.addEventListener('click', (e) => {
            if (navbarCollapse.classList.contains('show')) {
                const isClickInsideNav = navbarCollapse.contains(e.target);
                const isClickOnToggler = navbarToggler.contains(e.target);
                
                if (!isClickInsideNav && !isClickOnToggler) {
                    navbarCollapse.classList.remove('show');
                    navbarToggler.setAttribute('aria-expanded', 'false');
                }
            }
        });
    }
}

// ============================================
// SCROLL EFFECTS
// ============================================

function initializeScrollEffects() {
    // Back to top button
    const backToTopBtn = document.getElementById('back-to-top');
    
    if (backToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });
        
        backToTopBtn.addEventListener('click', () => {
            smoothScrollTo(0);
        });
    }
    
    // Scroll-based animations using Intersection Observer
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                
                // Trigger specific animations
                if (entry.target.classList.contains('stat-number')) {
                    animateCounter(entry.target);
                }
            }
        });
    }, observerOptions);
    
    // Observe elements for scroll animations
    const animateElements = document.querySelectorAll('[data-aos], .service-card, .portfolio-card, .stat-item, .feature-item');
    animateElements.forEach(el => observer.observe(el));
}

// Smooth scroll function
function smoothScrollTo(target) {
    const start = window.pageYOffset;
    const distance = target - start;
    const duration = 1000;
    let startTime = null;
    
    function scrollAnimation(currentTime) {
        if (startTime === null) startTime = currentTime;
        const timeElapsed = currentTime - startTime;
        const run = easeInOutQuad(timeElapsed, start, distance, duration);
        window.scrollTo(0, run);
        if (timeElapsed < duration) requestAnimationFrame(scrollAnimation);
    }
    
    function easeInOutQuad(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return c / 2 * t * t + b;
        t--;
        return -c / 2 * (t * (t - 2) - 1) + b;
    }
    
    requestAnimationFrame(scrollAnimation);
}

// ============================================
// GSAP ANIMATIONS
// ============================================

function initializeAnimations() {
    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);
    
    // Hero section animations
    initializeHeroAnimations();
    
    // Section animations
    initializeSectionAnimations();
    
    // Floating shapes animation
    initializeFloatingShapes();
    
    // Parallax effects
    initializeGSAPParallax();
}

function initializeHeroAnimations() {
    const heroTl = gsap.timeline({ delay: 2.5 });
    
    heroTl
        .from('.hero-title', {
            duration: 1.2,
            y: 100,
            opacity: 0,
            ease: 'power4.out'
        })
        .from('.hero-subtitle', {
            duration: 1,
            y: 50,
            opacity: 0,
            ease: 'power3.out'
        }, '-=0.8')
        .from('.hero-description', {
            duration: 1,
            y: 30,
            opacity: 0,
            ease: 'power3.out'
        }, '-=0.6')
        .from('.hero-buttons .btn', {
            duration: 0.8,
            y: 30,
            opacity: 0,
            stagger: 0.2,
            ease: 'power3.out'
        }, '-=0.4')
        .from('.scroll-indicator', {
            duration: 0.6,
            y: 20,
            opacity: 0,
            ease: 'power2.out'
        }, '-=0.2');
}

function initializeSectionAnimations() {
    // Animate section headers
    gsap.utils.toArray('.section-header').forEach(header => {
        gsap.from(header.children, {
            scrollTrigger: {
                trigger: header,
                start: 'top 80%',
                toggleActions: 'play none none reverse'
            },
            duration: 1,
            y: 50,
            opacity: 0,
            stagger: 0.2,
            ease: 'power3.out'
        });
    });
    
    // Service cards animation
    gsap.utils.toArray('.service-card').forEach((card, index) => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            duration: 0.8,
            y: 60,
            opacity: 0,
            delay: index * 0.1,
            ease: 'power3.out'
        });
    });
    
    // Portfolio cards animation
    gsap.utils.toArray('.portfolio-card').forEach((card, index) => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            duration: 0.8,
            scale: 0.8,
            opacity: 0,
            delay: index * 0.1,
            ease: 'back.out(1.7)'
        });
    });
    
    // Stats animation
    gsap.utils.toArray('.stats-section .stat-item').forEach((item, index) => {
        gsap.from(item, {
            scrollTrigger: {
                trigger: item,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            duration: 0.8,
            y: 40,
            opacity: 0,
            delay: index * 0.2,
            ease: 'power3.out'
        });
    });
}

function initializeFloatingShapes() {
    // Animate floating shapes
    gsap.utils.toArray('.floating-shape').forEach(shape => {
        gsap.to(shape, {
            duration: gsap.utils.random(4, 8),
            y: gsap.utils.random(-20, 20),
            x: gsap.utils.random(-20, 20),
            rotation: gsap.utils.random(-180, 180),
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut',
            delay: gsap.utils.random(0, 2)
        });
    });
}

function initializeGSAPParallax() {
    // Parallax effect for backgrounds
    gsap.utils.toArray('.hero-background, .services-background, .contact-background').forEach(bg => {
        gsap.to(bg, {
            yPercent: -50,
            ease: 'none',
            scrollTrigger: {
                trigger: bg.closest('section'),
                start: 'top bottom',
                end: 'bottom top',
                scrub: true
            }
        });
    });
    
    // Parallax for particles
    gsap.utils.toArray('.hero-particles, .services-particles, .contact-particles').forEach(particles => {
        gsap.to(particles, {
            yPercent: -30,
            ease: 'none',
            scrollTrigger: {
                trigger: particles.closest('section'),
                start: 'top bottom',
                end: 'bottom top',
                scrub: true
            }
        });
    });
}

// ============================================
// ENTRANCE ANIMATIONS
// ============================================

function initializeEntranceAnimations() {
    // Create entrance timeline
    const entranceTl = gsap.timeline();
    
    // Animate navbar
    entranceTl.from('.navbar', {
        duration: 0.8,
        y: -100,
        opacity: 0,
        ease: 'power3.out'
    });
    
    // Trigger hero animations
    setTimeout(() => {
        document.body.classList.add('loaded');
    }, 500);
}

// ============================================
// PARALLAX EFFECTS
// ============================================

function initializeParallax() {
    // Smooth parallax scrolling
    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(updateParallax);
            ticking = true;
        }
    });
    
    function updateParallax() {
        scrollY = window.pageYOffset;
        
        // Hero parallax
        const heroVideo = document.querySelector('.hero-video');
        if (heroVideo) {
            const speed = scrollY * 0.5;
            heroVideo.style.transform = `translateY(${speed}px)`;
        }
        
        // Floating shapes parallax
        const shapes = document.querySelectorAll('.floating-shape');
        shapes.forEach((shape, index) => {
            const speed = scrollY * (0.1 + index * 0.05);
            shape.style.transform += ` translateY(${speed}px)`;
        });
        
        ticking = false;
    }
}

// ============================================
// INTERACTIVE ELEMENTS
// ============================================

function initializeInteractions() {
    // Button hover effects
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(btn => {
        btn.addEventListener('mouseenter', function() {
            gsap.to(this, {
                duration: 0.3,
                scale: 1.05,
                ease: 'power2.out'
            });
        });
        
        btn.addEventListener('mouseleave', function() {
            gsap.to(this, {
                duration: 0.3,
                scale: 1,
                ease: 'power2.out'
            });
        });
    });
    
    // Card hover effects
    const cards = document.querySelectorAll('.service-card, .portfolio-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            gsap.to(this, {
                duration: 0.4,
                y: -10,
                boxShadow: '0 20px 40px rgba(0, 212, 255, 0.3)',
                ease: 'power2.out'
            });
        });
        
        card.addEventListener('mouseleave', function() {
            gsap.to(this, {
                duration: 0.4,
                y: 0,
                boxShadow: '0 8px 40px rgba(0, 212, 255, 0.2)',
                ease: 'power2.out'
            });
        });
    });
    
    // Logo animation
    const logo = document.querySelector('.logo-container');
    if (logo) {
        logo.addEventListener('mouseenter', function() {
            gsap.to('.logo-dot', {
                duration: 0.3,
                rotation: 360,
                scale: 1.2,
                ease: 'back.out(1.7)'
            });
        });
    }
    
    // Social links animation
    const socialLinks = document.querySelectorAll('.social-link');
    socialLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            gsap.to(this, {
                duration: 0.3,
                y: -5,
                rotation: 5,
                ease: 'power2.out'
            });
        });
        
        link.addEventListener('mouseleave', function() {
            gsap.to(this, {
                duration: 0.3,
                y: 0,
                rotation: 0,
                ease: 'power2.out'
            });
        });
    });
}

// ============================================
// COUNTERS ANIMATION
// ============================================

function initializeCounters() {
    const counters = document.querySelectorAll('.stat-number[data-count]');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target, target, duration);
                    observer.unobserve(entry.target);
                }
            });
        });
        
        observer.observe(counter);
    });
}

function animateCounter(element, target = null, duration = 2000) {
    if (!target) {
        target = parseInt(element.getAttribute('data-count'));
    }
    
    let start = 0;
    const increment = target / (duration / 16);
    
    const timer = setInterval(() => {
        start += increment;
        element.textContent = Math.floor(start);
        
        if (start >= target) {
            element.textContent = target;
            clearInterval(timer);
            
            // Add completion animation
            gsap.to(element, {
                duration: 0.3,
                scale: 1.1,
                ease: 'back.out(1.7)',
                yoyo: true,
                repeat: 1
            });
        }
    }, 16);
}

// ============================================
// PORTFOLIO FILTERING
// ============================================

function initializePortfolio() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            // Filter items with animation
            portfolioItems.forEach((item, index) => {
                const shouldShow = filter === '*' || item.classList.contains(filter.slice(1));
                
                if (shouldShow) {
                    gsap.to(item, {
                        duration: 0.5,
                        opacity: 1,
                        scale: 1,
                        y: 0,
                        delay: index * 0.1,
                        ease: 'power3.out'
                    });
                    item.style.display = 'block';
                } else {
                    gsap.to(item, {
                        duration: 0.3,
                        opacity: 0,
                        scale: 0.8,
                        y: 20,
                        ease: 'power3.in',
                        onComplete: () => {
                            item.style.display = 'none';
                        }
                    });
                }
            });
        });
    });
}

// ============================================
// FORM HANDLING
// ============================================

function initializeForms() {
    // Contact form
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual form handling)
            setTimeout(() => {
                // Show success message
                showNotification('Message sent successfully!', 'success');
                
                // Reset form
                this.reset();
                
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
    }
    
    // Newsletter form
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = this.querySelector('input[type="email"]').value;
            const btn = this.querySelector('.newsletter-btn');
            
            // Animate button
            gsap.to(btn, {
                duration: 0.3,
                scale: 1.1,
                ease: 'back.out(1.7)',
                yoyo: true,
                repeat: 1
            });
            
            // Show success message
            showNotification('Subscribed successfully!', 'success');
            
            // Reset form
            this.reset();
        });
    }
}

// ============================================
// NOTIFICATIONS
// ============================================

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas fa-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        </div>
    `;
    
    // Add styles
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#06ffa5' : '#00d4ff'};
        color: #0a0a0a;
        padding: 15px 20px;
        border-radius: 12px;
        font-weight: 600;
        z-index: 10000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        box-shadow: 0 8px 40px rgba(0, 212, 255, 0.3);
    `;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Remove after delay
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// ============================================
// UTILITY FUNCTIONS
// ============================================

// Debounce function for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Throttle function for scroll events
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

// Check if element is in viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// ============================================
// PERFORMANCE OPTIMIZATION
// ============================================

// Optimize scroll events
const optimizedScrollHandler = throttle(() => {
    if (isLoaded) {
        // Handle scroll-based updates here
        updateScrollProgress();
    }
}, 16);

function updateScrollProgress() {
    const scrolled = window.pageYOffset;
    const maxHeight = document.body.scrollHeight - window.innerHeight;
    const progress = (scrolled / maxHeight) * 100;
    
    // Update any progress indicators
    const progressBar = document.querySelector('.scroll-progress');
    if (progressBar) {
        progressBar.style.width = `${progress}%`;
    }
}

window.addEventListener('scroll', optimizedScrollHandler);

// ============================================
// RESPONSIVE HANDLING
// ============================================

function handleResize() {
    // Update any size-dependent calculations
    if (window.innerWidth <= 768) {
        // Mobile optimizations
        document.body.classList.add('mobile');
    } else {
        document.body.classList.remove('mobile');
    }
}

window.addEventListener('resize', debounce(handleResize, 250));

// ============================================
// ERROR HANDLING
// ============================================

window.addEventListener('error', function(e) {
    console.error('JavaScript Error:', e.error);
});

// ============================================
// ACCESSIBILITY IMPROVEMENTS
// ============================================

// Keyboard navigation support
document.addEventListener('keydown', function(e) {
    // ESC key closes mobile menu
    if (e.key === 'Escape') {
        const mobileMenu = document.querySelector('.navbar-collapse.show');
        const navbarToggler = document.querySelector('.navbar-toggler');
        if (mobileMenu) {
            mobileMenu.classList.remove('show');
            if (navbarToggler) {
                navbarToggler.setAttribute('aria-expanded', 'false');
            }
        }
    }
    
    // Enter key activates focused elements
    if (e.key === 'Enter') {
        const focused = document.activeElement;
        if (focused && focused.classList.contains('filter-btn')) {
            focused.click();
        }
    }
});

// Reduce motion for users who prefer it
if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    // Disable animations for users who prefer reduced motion
    document.documentElement.style.setProperty('--transition-fast', 'none');
    document.documentElement.style.setProperty('--transition-smooth', 'none');
    document.documentElement.style.setProperty('--transition-slow', 'none');
}

// ============================================
// HERO SLIDER FUNCTIONALITY
// ============================================

function initializeHeroSlider() {
    const slides = document.querySelectorAll('.hero-slide');
    const indicators = document.querySelectorAll('.indicator');
    const prevBtn = document.querySelector('.prev-slide');
    const nextBtn = document.querySelector('.next-slide');
    
    if (!slides.length) return;
    
    let currentSlide = 0;
    let slideInterval;
    
    // بهبود کیفیت ویدیوها
    optimizeVideoQuality();
    let isTransitioning = false;
    
    // Auto-play settings
    const autoPlayDelay = 6000; // 6 seconds
    
    function showSlide(index) {
        if (isTransitioning) return;
        isTransitioning = true;
        
        // Remove active classes
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(indicator => indicator.classList.remove('active'));
        
        // Add active classes
        slides[index].classList.add('active');
        indicators[index].classList.add('active');
        
        // Update current slide
        currentSlide = index;
        
        // Reset transition flag after animation
        setTimeout(() => {
            isTransitioning = false;
        }, 1000);
        
        // Animate slide content
        animateSlideContent(slides[index]);
    }
    
    function animateSlideContent(slide) {
        const content = slide.querySelector('.slide-content');
        const title = slide.querySelector('.slide-title');
        const subtitle = slide.querySelector('.slide-subtitle');
        const description = slide.querySelector('.slide-description');
        const buttons = slide.querySelectorAll('.slide-btn-primary, .slide-btn-secondary');
        
        // Reset animations
        gsap.set([title, subtitle, description, buttons], {
            opacity: 0,
            y: 50
        });
        
        // Animate elements in sequence
        const tl = gsap.timeline();
        
        tl.to(title, {
            duration: 0.8,
            opacity: 1,
            y: 0,
            ease: 'power3.out'
        })
        .to(subtitle, {
            duration: 0.6,
            opacity: 1,
            y: 0,
            ease: 'power3.out'
        }, '-=0.4')
        .to(description, {
            duration: 0.6,
            opacity: 1,
            y: 0,
            ease: 'power3.out'
        }, '-=0.3')
        .to(buttons, {
            duration: 0.5,
            opacity: 1,
            y: 0,
            stagger: 0.1,
            ease: 'power3.out'
        }, '-=0.2');
    }
    
    function nextSlide() {
        const next = (currentSlide + 1) % slides.length;
        showSlide(next);
    }
    
    function prevSlide() {
        const prev = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(prev);
    }
    
    function startAutoPlay() {
        slideInterval = setInterval(nextSlide, autoPlayDelay);
    }
    
    function stopAutoPlay() {
        clearInterval(slideInterval);
    }
    
    // Event listeners
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            nextSlide();
            stopAutoPlay();
            setTimeout(startAutoPlay, 10000); // Restart after 10s
        });
    }
    
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            stopAutoPlay();
            setTimeout(startAutoPlay, 10000); // Restart after 10s
        });
    }
    
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            if (index !== currentSlide) {
                showSlide(index);
                stopAutoPlay();
                setTimeout(startAutoPlay, 10000); // Restart after 10s
            }
        });
    });
    
    // Pause on hover
    const sliderContainer = document.querySelector('.hero-slider-container');
    if (sliderContainer) {
        sliderContainer.addEventListener('mouseenter', stopAutoPlay);
        sliderContainer.addEventListener('mouseleave', startAutoPlay);
    }
    
    // Touch/swipe support for mobile
    let startX = 0;
    let endX = 0;
    
    if (sliderContainer) {
        sliderContainer.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });
        
        sliderContainer.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            handleSwipe();
        });
    }
    
    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = startX - endX;
        
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                nextSlide(); // Swipe left - next slide
            } else {
                prevSlide(); // Swipe right - previous slide
            }
            stopAutoPlay();
            setTimeout(startAutoPlay, 10000);
        }
    }
    
    // Initialize first slide
    showSlide(0);
    startAutoPlay();
    
    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            prevSlide();
            stopAutoPlay();
            setTimeout(startAutoPlay, 10000);
        } else if (e.key === 'ArrowRight') {
            nextSlide();
            stopAutoPlay();
            setTimeout(startAutoPlay, 10000);
        }
    });
}

// ============================================
// INTERACTIVE GALLERIES
// ============================================

function initializeGalleries() {
    // Initialize gallery hover effects with GSAP
    initializeGalleryHoverEffects();
    
    // Initialize gallery scroll animations
    initializeGalleryScrollAnimations();
    
    // Initialize gallery lightbox (if needed)
    initializeGalleryLightbox();
}

function initializeGalleryHoverEffects() {
    // Enhanced hover effects for gallery items
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    galleryItems.forEach(item => {
        const image = item.querySelector('.gallery-image');
        const overlay = item.querySelector('.gallery-overlay');
        const content = item.querySelector('.gallery-content');
        const link = item.querySelector('.gallery-link');
        
        // Create hover timeline
        const hoverTl = gsap.timeline({ paused: true });
        
        hoverTl
            .to(overlay, {
                duration: 0.3,
                opacity: 0.95,
                ease: 'power2.out'
            })
            .to(content, {
                duration: 0.4,
                y: 0,
                opacity: 1,
                ease: 'back.out(1.7)'
            }, '-=0.2')
            .to(link, {
                duration: 0.3,
                scale: 1.1,
                rotation: 360,
                ease: 'back.out(1.7)'
            }, '-=0.1');
        
        item.addEventListener('mouseenter', () => {
            hoverTl.play();
        });
        
        item.addEventListener('mouseleave', () => {
            hoverTl.reverse();
        });
    });
    
    // Showcase items special effects
    const showcaseItems = document.querySelectorAll('.showcase-item');
    
    showcaseItems.forEach(item => {
        const image = item.querySelector('.showcase-image');
        const overlay = item.querySelector('.showcase-overlay');
        const icon = item.querySelector('.showcase-icon');
        
        item.addEventListener('mouseenter', () => {
            gsap.to(image, {
                duration: 0.5,
                scale: 1.1,
                filter: 'grayscale(0) brightness(1.1)',
                ease: 'power2.out'
            });
            
            gsap.to(overlay, {
                duration: 0.3,
                opacity: 1,
                ease: 'power2.out'
            });
            
            gsap.to(icon, {
                duration: 0.4,
                scale: 1,
                rotation: 360,
                ease: 'back.out(1.7)'
            });
        });
        
        item.addEventListener('mouseleave', () => {
            gsap.to(image, {
                duration: 0.5,
                scale: 1,
                filter: 'grayscale(0.3) brightness(1)',
                ease: 'power2.out'
            });
            
            gsap.to(overlay, {
                duration: 0.3,
                opacity: 0,
                ease: 'power2.out'
            });
            
            gsap.to(icon, {
                duration: 0.3,
                scale: 0.5,
                rotation: 0,
                ease: 'power2.out'
            });
        });
    });
}

function initializeGalleryScrollAnimations() {
    // Advanced scroll animations for gallery sections
    gsap.utils.toArray('.image-gallery-section').forEach(section => {
        const items = section.querySelectorAll('.gallery-item, .showcase-item');
        
        items.forEach((item, index) => {
            gsap.from(item, {
                scrollTrigger: {
                    trigger: item,
                    start: 'top 85%',
                    toggleActions: 'play none none reverse'
                },
                duration: 0.8,
                y: 60,
                opacity: 0,
                scale: 0.8,
                rotation: gsap.utils.random(-5, 5),
                delay: index * 0.1,
                ease: 'back.out(1.7)'
            });
        });
    });
    
    // Parallax effect for gallery backgrounds
    gsap.utils.toArray('.gallery-background').forEach(bg => {
        gsap.to(bg, {
            yPercent: -30,
            ease: 'none',
            scrollTrigger: {
                trigger: bg.closest('.image-gallery-section'),
                start: 'top bottom',
                end: 'bottom top',
                scrub: true
            }
        });
    });
    
    // Staggered animation for showcase row
    const showcaseRow = document.querySelector('.gallery-showcase-row');
    if (showcaseRow) {
        const showcaseItems = showcaseRow.querySelectorAll('.showcase-item');
        
        gsap.from(showcaseItems, {
            scrollTrigger: {
                trigger: showcaseRow,
                start: 'top 80%',
                toggleActions: 'play none none reverse'
            },
            duration: 1,
            y: 100,
            opacity: 0,
            stagger: {
                amount: 1,
                from: 'random'
            },
            ease: 'power3.out'
        });
    }
}

function initializeGalleryLightbox() {
    // Simple lightbox functionality for gallery items
    const galleryLinks = document.querySelectorAll('.gallery-link, .showcase-item');
    
    galleryLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            
            // Add click animation
            gsap.to(link, {
                duration: 0.1,
                scale: 0.95,
                ease: 'power2.out',
                yoyo: true,
                repeat: 1
            });
            
            // Here you could integrate with a lightbox library
            // For now, we'll show a notification
            showNotification('Gallery item clicked!', 'info');
        });
    });
}

// ============================================
// ENHANCED SCROLL EFFECTS FOR NEW SECTIONS
// ============================================

function initializeEnhancedScrollEffects() {
    // Enhanced scroll effects for new gallery sections
    const galleryObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const section = entry.target;
                const items = section.querySelectorAll('.gallery-item, .showcase-item');
                
                items.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add('animate-in');
                    }, index * 100);
                });
                
                galleryObserver.unobserve(section);
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    // Observe gallery sections
    const gallerySections = document.querySelectorAll('.image-gallery-section');
    gallerySections.forEach(section => galleryObserver.observe(section));
}

// Update the main initialization to include enhanced scroll effects
document.addEventListener('DOMContentLoaded', function() {
    // ... existing initialization code ...
    initializeEnhancedScrollEffects();
});

// ============================================
// CONSOLE WELCOME MESSAGE
// ============================================

console.log(`
🎨 Creative Dark Theme Website - UPDATED
🚀 Built with modern web technologies
⚡ Optimized for performance and accessibility
🌟 Featuring advanced animations and interactions
🎭 New: Hero Slider & Interactive Galleries

Developer: Creative Studio
Version: 2.0.0
`);

// Export functions for external use if needed
window.CreativeTheme = {
    showNotification,
    smoothScrollTo,
    animateCounter,
    isInViewport,
    initializeHeroSlider,
    initializeGalleries,
    changeLanguage
};

// Make changeLanguage globally available
window.changeLanguage = changeLanguage;