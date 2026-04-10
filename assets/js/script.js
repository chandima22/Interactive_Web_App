document.addEventListener("DOMContentLoaded", () => {
    // Initialize Lucide Icons
    const initIcons = () => {
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    };
    initIcons();

    // --- State Management ---
    let currentCategory = 'All';
    let currentSearch = '';

    const eventsContainer = document.getElementById('events-container');
    const searchInput = document.querySelector('.search-input');
    const filterButtons = document.querySelectorAll('.filter-tag');

    // --- Components ---
    const createSpinner = () => `
        <div class="col-12 text-center py-5 my-5">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-3 opacity-50">Finding amazing events...</p>
        </div>
    `;

    const createNoResults = (query) => `
        <div class="col-12 text-center py-5 my-5 opacity-50">
            <i data-lucide="search-x" style="width: 4rem; height: 4rem;" class="mb-3"></i>
            <h3 class="h4">No events found</h3>
            <p>We couldn't find anything matching "${query}"</p>
        </div>
    `;

    const createEventCard = (event) => `
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card h-100 border-0 bg-transparent overflow-hidden h-card shadow-lg rounded-4">
                <div class="position-relative overflow-hidden" style="aspect-ratio: 4/5;">
                    <img src="${event.image}" class="card-img-top h-100 object-fit-cover transition-scale" alt="${event.title}" referrerpolicy="no-referrer">
                    <div class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-to-t opacity-25"></div>
                    <span class="badge position-absolute bg-glass rounded-pill px-3 py-2 text-uppercase fw-bold" style="font-size: 0.65rem; top: 1.5rem; left: 1.5rem;">
                        ${event.category}
                    </span>
                </div>
                <div class="card-body px-1 py-4">
                    <h3 class="h5 fw-bold mb-3 text-white">${event.title}</h3>
                    
                    <div class="d-flex flex-column gap-2 mb-4">
                        <div class="d-flex align-items-center gap-2 text-white-50 small fw-medium">
                            <i data-lucide="calendar" style="width: 1rem;"></i>
                            ${event.event_date}
                        </div>
                        <div class="d-flex align-items-center gap-2 text-white-50 small fw-medium">
                            <i data-lucide="clock" style="width: 1rem;"></i>
                            09:00 AM - 05:00 PM
                        </div>
                        <div class="d-flex align-items-center gap-2 text-white-50 small fw-medium">
                            <i data-lucide="map-pin" style="width: 1rem;"></i>
                            <span class="text-truncate">${event.location}</span>
                        </div>
                    </div>

                    <a href="register.php?event=${event.id}" class="btn btn-primary w-100 rounded-3 py-2 fw-bold d-flex align-items-center justify-content-center gap-2">
                        Register Now
                        <i data-lucide="arrow-right" style="width: 1.25rem;"></i>
                    </a>
                </div>
            </div>
        </div>
    `;

    // --- Core Logic ---
    const renderEvents = () => {
        if (!eventsContainer || !window.eventsData) return;

        // Show spinner during "filtering" (simulated delay for UX)
        eventsContainer.innerHTML = createSpinner();
        initIcons();

        setTimeout(() => {
            const filtered = window.eventsData.filter(event => {
                const matchesCategory = currentCategory === 'All' || event.category === currentCategory;
                const matchesSearch = event.title.toLowerCase().includes(currentSearch.toLowerCase()) || 
                                    event.location.toLowerCase().includes(currentSearch.toLowerCase());
                return matchesCategory && matchesSearch;
            });

            if (filtered.length === 0) {
                eventsContainer.innerHTML = createNoResults(currentSearch);
            } else {
                eventsContainer.innerHTML = filtered.map(e => createEventCard(e)).join('');
            }
            initIcons();
        }, 400);
    };

    // --- Event Listeners ---
    if (filterButtons) {
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                currentCategory = btn.dataset.category || 'All';
                renderEvents();
            });
        });
    }

    if (searchInput) {
        searchInput.addEventListener('input', (e) => {
            currentSearch = e.target.value;
            renderEvents();
        });
    }

    // --- Register Page Logic ---
    const eventSelect = document.getElementById('event-select');
    const registerImage = document.getElementById('register-event-image');
    
    if (eventSelect && registerImage && window.eventsData) {
        eventSelect.addEventListener('change', (e) => {
            const selectedEvent = window.eventsData.find(evt => evt.id === e.target.value);
            if (selectedEvent) {
                registerImage.style.opacity = 0;
                setTimeout(() => {
                    registerImage.src = selectedEvent.image;
                    registerImage.style.opacity = 1;
                }, 200);
            }
        });
    }

    // Initialize
    if (eventsContainer) renderEvents();
});

