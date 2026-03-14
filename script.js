document.addEventListener("DOMContentLoaded", () => {
    // Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // --- Dynamic Event Rendering ---
    const eventsGrid = document.querySelector('.events-grid-compact');
    const featuredGrid = document.querySelector('.events-grid'); // On index.html
    const filterButtons = document.querySelectorAll('.filter-tag');

    function createEventCard(event, isCompact = true) {
        if (isCompact) {
            return `
                <div class="event-card-compact" data-category="${event.category}">
                    <div class="event-img-compact">
                        <img src="${event.image}" alt="${event.title}" class="event-img" referrerpolicy="no-referrer" />
                        <div class="event-overlay"></div>
                        <span class="event-tag" style="font-size: 0.625rem;">${event.category}</span>
                    </div>
                    <h3 class="event-title-compact">${event.title}</h3>
                    <div class="event-meta">
                        <span>
                            <i data-lucide="calendar" style="width: 1rem; height: 1rem; color: var(--color-brand-primary);"></i>
                            ${event.date}
                        </span>
                        <span>
                            <i data-lucide="map-pin" style="width: 1rem; height: 1rem; color: var(--color-brand-primary);"></i>
                            ${event.location}
                        </span>
                    </div>
                </div>
            `;
        } else {
            // Main style for Featured Events on indext.html
            return `
                <div class="event-card">
                    <div class="event-img-wrapper">
                        <img src="${event.image}" alt="${event.title}" class="event-img" referrerpolicy="no-referrer" />
                        <div class="event-overlay"></div>
                        <span class="event-tag btn-glass">${event.category}</span>
                        <div class="event-info">
                            <div class="event-date">
                                <span><i data-lucide="calendar"></i> ${event.date}</span>
                            </div>
                            <h3 class="event-title">${event.title}</h3>
                        </div>
                    </div>
                    <div class="event-footer">
                        <div class="event-location">
                            <i data-lucide="map-pin"></i>
                            <span>${event.location}</span>
                        </div>
                        <button class="event-action glass">
                            <i data-lucide="arrow-up-right"></i>
                        </button>
                    </div>
                </div>
            `;
        }
    }

    function renderEvents(filter = 'All') {
        if (!eventsGrid || !window.eventsData) return;
        
        eventsGrid.innerHTML = '';
        const filtered = filter === 'All' 
            ? window.eventsData 
            : window.eventsData.filter(e => e.category === filter);
        
        filtered.forEach(event => {
            eventsGrid.innerHTML += createEventCard(event, true);
        });
        
        // Re-create icons for new elements
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    function renderFeaturedEvents() {
        if (!featuredGrid || !window.eventsData) return;
        
        featuredGrid.innerHTML = '';
        // Take a few prominent ones
        const featured = window.eventsData.filter(e => 
            e.id === "spor-5" || e.id === "cult-2" || e.id === "bus-3"
        );
        
        featured.forEach(event => {
            featuredGrid.innerHTML += createEventCard(event, false);
        });

        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    }

    // Event Listeners for Filters
    if (filterButtons.length > 0) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                renderEvents(btn.textContent);
            });
        });
    }

    // Initial Renders
    if (window.eventsData) {
        renderEvents();
        renderFeaturedEvents();
    }

    // --- Original Nav Logic ---
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath || 
           (currentPath.endsWith('/') && link.getAttribute('href') === 'index.html')) {
            link.classList.add('active');
        }
    });
});
