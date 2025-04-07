import './bootstrap';

/**
 * Mobile Navigation Functionality
 * - Handles active state for mobile navigation
 * - Sets up navigation based on current URL
 */
document.addEventListener('DOMContentLoaded', function() {
    // Get all mobile nav links
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
    
    // Get current path
    const currentPath = window.location.pathname;
    
    // Add click event listener to each link
    mobileNavLinks.forEach(link => {
        // Check if this link matches the current path
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active');
        }
        
        link.addEventListener('click', function(e) {
            // Remove active class from all links
            mobileNavLinks.forEach(navLink => {
                navLink.classList.remove('active');
            });
            
            // Add active class to clicked link
            this.classList.add('active');
        });
    });

    // If no active link is found (like when directly loading a page)
    // then set the appropriate one as active
    let hasActive = false;
    mobileNavLinks.forEach(link => {
        if (link.classList.contains('active')) {
            hasActive = true;
        }
    });

    // If no active link and we're on the home page
    if (!hasActive) {
        if (currentPath === '/' && mobileNavLinks.length > 0) {
            mobileNavLinks[0].classList.add('active');
        }
    }
});

/**
 * Navbar Scroll Behavior
 * - Changes navbar style on scroll
 */
document.addEventListener('DOMContentLoaded', function() {
    const navbar = document.getElementById('navbar');
    
    if (navbar) {
        // Check initial scroll position
        if (window.scrollY > 10) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        
        // Add scroll event listener
        window.addEventListener('scroll', function() {
            if (window.scrollY > 10) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }
});

/**
 * Mobile Menu Toggle
 * - Handles mobile menu opening/closing
 */
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');
    
    if (menuToggle && menu) {
        menuToggle.addEventListener('change', function() {
            if (this.checked) {
                menu.classList.remove('hidden');
            } else {
                menu.classList.add('hidden');
            }
        });
    }
});
