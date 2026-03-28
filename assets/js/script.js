document.addEventListener("DOMContentLoaded", () => {
    // Initialize Lucide Icons
    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    // --- Dynamic Event Rendering ---
    const eventsGrid = document.querySelector('.events-grid-compact');
    const featuredGrid = document.querySelector('.events-grid'); // On index.html
    const filterButtons = document.querySelectorAll('.filter-tag');
    const searchInput = document.querySelector('.search-input');

    let currentCategory = 'All';
    let currentSearch = '';

    function createEventCard(event, isCompact = true) {
        if (isCompact) {
            return `
                <a href="register.html?event=${event.id}" class="event-card-compact" data-category="${event.category}" style="display: block;">
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
                </a>
            `;
        } else {
            // Main style for Featured Events on index.html
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
                        <a href="register.html?event=${event.id}" class="event-action glass">
                            <i data-lucide="arrow-up-right"></i>
                        </a>
                    </div>
                </div>
            `;
        }
    }

    function renderEvents() {
        if (!eventsGrid || !window.eventsData) return;
        
        eventsGrid.innerHTML = '';
        
        const filtered = window.eventsData.filter(event => {
            const matchesCategory = currentCategory === 'All' || event.category === currentCategory;
            const matchesSearch = event.title.toLowerCase().includes(currentSearch.toLowerCase()) || 
                                event.location.toLowerCase().includes(currentSearch.toLowerCase());
            return matchesCategory && matchesSearch;
        });
        
        if (filtered.length === 0) {
            eventsGrid.innerHTML = `
                <div style="grid-column: 1/-1; text-align: center; padding: 4rem 2rem; color: rgba(255,255,255,0.5);">
                    <i data-lucide="search-x" style="width: 3rem; height: 3rem; margin-bottom: 1rem; display: block; margin-inline: auto;"></i>
                    <p style="font-size: 1.125rem;">No events found matching "${currentSearch}"</p>
                </div>
            `;
        } else {
            filtered.forEach(event => {
                eventsGrid.innerHTML += createEventCard(event, true);
            });
        }
        
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
                currentCategory = btn.textContent;
                renderEvents();
            });
        });
    }

    // Event Listener for Search
    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            currentSearch = e.target.value;
            renderEvents();
        });
    }

    // Initial Renders
    if (window.eventsData) {
        renderEvents();
        renderFeaturedEvents();
    }

    // --- Register Page Logic ---
    const eventSelect = document.getElementById('event-select');
    const registerImage = document.getElementById('register-event-image');
    
    if (eventSelect && registerImage && window.eventsData) {
        // Populate select
        eventSelect.innerHTML = '<option value="">Select an event</option>';
        window.eventsData.forEach(event => {
            const option = document.createElement('option');
            option.value = event.id;
            option.textContent = event.title;
            eventSelect.appendChild(option);
        });

        // Parse URL params
        const urlParams = new URLSearchParams(window.location.search);
        const eventIdFromUrl = urlParams.get('event');
        
        function updateRegisterImage(eventId) {
            if (!eventId) {
                registerImage.style.opacity = 0;
                setTimeout(() => {
                    registerImage.src = 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?auto=format&fit=crop&q=80&w=800'; // default image
                    registerImage.style.opacity = 1;
                }, 300);
                return;
            }
            const selectedEvent = window.eventsData.find(e => e.id === eventId);
            if (selectedEvent) {
                // Add a smooth fade transition effect
                registerImage.style.opacity = 0;
                setTimeout(() => {
                    registerImage.src = selectedEvent.image;
                    registerImage.style.opacity = 1;
                }, 300);
            }
        }

        if (eventIdFromUrl) {
            eventSelect.value = eventIdFromUrl;
            updateRegisterImage(eventIdFromUrl);
        }

        eventSelect.addEventListener('change', (e) => {
            updateRegisterImage(e.target.value);
        });
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
