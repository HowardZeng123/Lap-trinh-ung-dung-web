// Custom Header JavaScript for OnlineNews

document.addEventListener('DOMContentLoaded', function() {
    // Search Toggle Functionality
    const searchToggle = document.getElementById('searchToggle');
    const searchBar = document.getElementById('searchBar');
    
    if (searchToggle && searchBar) {
        searchToggle.addEventListener('click', function() {
            if (searchBar.style.display === 'none' || searchBar.style.display === '') {
                searchBar.style.display = 'block';
                searchBar.style.animation = 'slideDown 0.3s ease';
                // Focus on search input
                const searchInput = searchBar.querySelector('input[name="search"]');
                if (searchInput) {
                    setTimeout(() => searchInput.focus(), 300);
                }
            } else {
                searchBar.style.animation = 'slideUp 0.3s ease';
                setTimeout(() => {
                    searchBar.style.display = 'none';
                }, 300);
            }
        });
    }
    
    // Close search bar when clicking outside
    document.addEventListener('click', function(event) {
        if (searchBar && searchToggle) {
            if (!searchBar.contains(event.target) && !searchToggle.contains(event.target)) {
                if (searchBar.style.display === 'block') {
                    searchBar.style.animation = 'slideUp 0.3s ease';
                    setTimeout(() => {
                        searchBar.style.display = 'none';
                    }, 300);
                }
            }
        }
    });
    
    // Handle search form submission
    const searchForm = document.querySelector('.search-form');
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const searchInput = this.querySelector('input[name="search"]');
            if (searchInput && searchInput.value.trim()) {
                // Here you can implement your search functionality
                console.log('Searching for:', searchInput.value);
                // For now, we'll just redirect to a search URL
                window.location.href = `${window.location.origin}/search?q=${encodeURIComponent(searchInput.value)}`;
            }
        });
    }
    
    // Smooth scroll for navigation links (if they are anchor links)
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href && href.startsWith('#')) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
    
    // Add active state to current page navigation
    const currentUrl = window.location.pathname;
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && (currentUrl.includes(href) || (href === '/' && currentUrl === '/'))) {
            link.classList.add('active');
            link.style.backgroundColor = 'rgba(255,255,255,0.2)';
            link.style.borderRadius = '5px';
        }
    });
    
    // Header scroll effect
    let lastScrollTop = 0;
    const header = document.querySelector('header');
    
    if (header) {
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 100) {
                header.classList.add('scrolled');
                header.style.boxShadow = '0 4px 20px rgba(102, 126, 234, 0.1)';
            } else {
                header.classList.remove('scrolled');
                header.style.boxShadow = 'none';
            }
            
            // Hide/show header on scroll
            if (scrollTop > lastScrollTop && scrollTop > 200) {
                header.style.transform = 'translateY(-100%)';
            } else {
                header.style.transform = 'translateY(0)';
            }
            
            lastScrollTop = scrollTop;
        });
        
        // Add transition to header
        header.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
    }
});

// Add slideUp animation
const style = document.createElement('style');
style.textContent = `
    @keyframes slideUp {
        from {
            opacity: 1;
            transform: translateY(0);
        }
        to {
            opacity: 0;
            transform: translateY(-20px);
        }
    }
`;
document.head.appendChild(style);
