document.addEventListener("DOMContentLoaded", () => {
    // Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // Set active nav link based on current path
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
        // Very basic path matching for local dev
        if (link.getAttribute('href') === currentPath || 
           (currentPath === '/' && link.getAttribute('href') === 'index.html')) {
            link.classList.remove('text-white/50');
            link.classList.add('text-brand-primary');
        } else {
            // Remove active state if clicking around
            link.classList.remove('text-brand-primary');
            link.classList.add('text-white/50');
        }
    });
});
