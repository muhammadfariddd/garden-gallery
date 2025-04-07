/**
 * Garden Studio - Custom JavaScript
 * Additional functionality for enhancing the user experience
 */

/**
 * Header and Navigation Scroll Behavior
 * - Hides contact info on scroll
 * - Changes navbar style on scroll
 */
function initHeaderScroll() {
    const header = document.getElementById('header-container');
    const navbar = document.getElementById('navbar');
    
    if (header && navbar) {
        // Check initial scroll position
        updateHeaderOnScroll();
        
        // Add scroll event listener
        window.addEventListener('scroll', updateHeaderOnScroll);
        
        function updateHeaderOnScroll() {
            if (window.scrollY > 10) {
                header.classList.add('scrolled');
                navbar.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
                navbar.classList.remove('scrolled');
            }
        }
    }
}

/**
 * Plant Cards Hover Effect
 * Enhances the hover effect for plant cards
 */
function initPlantCards() {
    const plantCards = document.querySelectorAll('.plant-card');
    
    if (plantCards.length > 0) {
        plantCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('hover-active');
            });
            
            card.addEventListener('mouseleave', function() {
                this.classList.remove('hover-active');
            });
        });
    }
}

/**
 * Smooth Scroll to Anchor
 * Adds smooth scrolling to anchor links
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                // Offset for fixed header
                const offset = 80;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - offset;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/**
 * Shop Filter Functionality
 * Basic filtering for shop items
 */
function initShopFilters() {
    const categorySelect = document.querySelector('select[name="category-filter"]');
    const sizeSelect = document.querySelector('select[name="size-filter"]');
    const sortSelect = document.querySelector('select[name="sort-option"]');
    const productItems = document.querySelectorAll('.product-item');
    
    if (categorySelect && productItems.length > 0) {
        categorySelect.addEventListener('change', filterProducts);
    }
    
    if (sizeSelect && productItems.length > 0) {
        sizeSelect.addEventListener('change', filterProducts);
    }
    
    if (sortSelect && productItems.length > 0) {
        sortSelect.addEventListener('change', sortProducts);
    }
    
    function filterProducts() {
        const categoryValue = categorySelect ? categorySelect.value : 'all';
        const sizeValue = sizeSelect ? sizeSelect.value : 'all';
        
        productItems.forEach(item => {
            const itemCategory = item.getAttribute('data-category');
            const itemSize = item.getAttribute('data-size');
            
            const categoryMatch = categoryValue === 'all' || itemCategory === categoryValue;
            const sizeMatch = sizeValue === 'all' || itemSize === sizeValue;
            
            if (categoryMatch && sizeMatch) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    }
    
    function sortProducts() {
        if (!sortSelect) return;
        
        const sortValue = sortSelect.value;
        const productsContainer = productItems[0].parentNode;
        const productArray = Array.from(productItems);
        
        switch (sortValue) {
            case 'price-low':
                productArray.sort((a, b) => {
                    const priceA = parseFloat(a.getAttribute('data-price'));
                    const priceB = parseFloat(b.getAttribute('data-price'));
                    return priceA - priceB;
                });
                break;
                
            case 'price-high':
                productArray.sort((a, b) => {
                    const priceA = parseFloat(a.getAttribute('data-price'));
                    const priceB = parseFloat(b.getAttribute('data-price'));
                    return priceB - priceA;
                });
                break;
                
            case 'newest':
                productArray.sort((a, b) => {
                    const dateA = new Date(a.getAttribute('data-date'));
                    const dateB = new Date(b.getAttribute('data-date'));
                    return dateB - dateA;
                });
                break;
                
            default:
                // Featured or default sorting
                productArray.sort((a, b) => {
                    const orderA = parseInt(a.getAttribute('data-featured-order') || '999');
                    const orderB = parseInt(b.getAttribute('data-featured-order') || '999');
                    return orderA - orderB;
                });
        }
        
        // Re-append items in the new order
        productArray.forEach(item => {
            productsContainer.appendChild(item);
        });
    }
}

/**
 * Image Gallery (for plant details)
 */
function initImageGallery() {
    const mainImage = document.querySelector('.gallery-main-image');
    const thumbnails = document.querySelectorAll('.gallery-thumbnail');
    
    if (mainImage && thumbnails.length > 0) {
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                // Update main image
                const newSrc = this.getAttribute('data-full-image');
                mainImage.src = newSrc;
                
                // Update active state
                thumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
            });
        });
    }
}

/**
 * Mobile Navigation Functionality
 * - Handles active state for mobile navigation
 */
function initMobileNav() {
    // Get all mobile nav links
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');
    
    // Get current path
    const currentPath = window.location.pathname;
    
    if (mobileNavLinks.length > 0) {
        // Set active state based on current path
        mobileNavLinks.forEach(link => {
            const linkPath = link.getAttribute('href');
            
            if (linkPath === currentPath || 
                (currentPath === '/' && linkPath === '/') ||
                (currentPath.includes('plants') && linkPath === '/plants') ||
                (currentPath.includes('shop') && linkPath === '/shop') ||
                (currentPath.includes('care-guide') && linkPath === '/care-guide')) {
                link.classList.add('active');
            }
            
            // Add click event listener
            link.addEventListener('click', function() {
                mobileNavLinks.forEach(navLink => {
                    navLink.classList.remove('active');
                });
                
                this.classList.add('active');
            });
        });
    }
}

/**
 * Initialize all functions when DOM is ready
 */
document.addEventListener('DOMContentLoaded', function() {
    initHeaderScroll();
    initPlantCards();
    initSmoothScroll();
    initShopFilters();
    initImageGallery();
    initMobileNav();
}); 