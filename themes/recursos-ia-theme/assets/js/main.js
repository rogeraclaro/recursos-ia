document.addEventListener('DOMContentLoaded', function() {
    // Load favicons progressively with error handling
    function loadFavicons() {
        const wrappers = document.querySelectorAll('.link-favicon-wrapper[data-domain]');

        wrappers.forEach((wrapper, index) => {
            const domain = wrapper.dataset.domain;
            if (!domain) return;

            // Stagger loading to avoid overwhelming the server
            setTimeout(() => {
                const img = new Image();

                // Silently handle errors - no console output
                img.onerror = function() {
                    wrapper.classList.add('favicon-error');
                };

                img.onload = function() {
                    wrapper.classList.add('favicon-loaded');
                    // Add the image to the DOM only if it loaded successfully
                    img.className = 'link-favicon';
                    img.alt = '';
                    wrapper.insertBefore(img, wrapper.firstChild);
                };

                // Start loading
                img.src = `https://www.google.com/s2/favicons?domain=${domain}&sz=32`;
            }, index * 10); // Stagger by 10ms per favicon
        });
    }

    // Load favicons after page loads
    loadFavicons();

    // Search functionality
    const searchBox = document.getElementById('searchBox');
    const searchForm = document.getElementById('searchForm');
    const indexSection = document.getElementById('index');

    // Create no results message
    const noResultsMessage = document.createElement('div');
    noResultsMessage.className = 'no-results-message hidden';
    noResultsMessage.innerHTML = `
        <div class="no-results-content">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
            <h3>No s'han trobat resultats</h3>
            <p>Prova amb altres paraules clau o neteja la cerca per veure tots els recursos.</p>
        </div>
    `;
    const contentDiv = document.getElementById('content');
    if (contentDiv) {
        contentDiv.appendChild(noResultsMessage);
    }

    // Function to perform search
    function performSearch(searchTerm) {
        const cards = document.querySelectorAll('.link-card');
        const sections = document.querySelectorAll('.category-section');

        // Show/hide index based on search
        if (!searchTerm) {
            // No search - show everything
            cards.forEach(card => card.classList.remove('hidden'));
            sections.forEach(section => section.classList.remove('hidden'));
            if (indexSection) indexSection.classList.remove('hidden');
            noResultsMessage.classList.add('hidden');
            return;
        }

        // Active search - hide index
        if (indexSection) indexSection.classList.add('hidden');

        let totalVisibleCards = 0;

        cards.forEach(card => {
            const titleEl = card.querySelector('.link-title');
            const descriptionEl = card.querySelector('.link-description');
            const urlEl = card.querySelector('.link-url');

            const title = titleEl ? titleEl.textContent.toLowerCase() : '';
            const description = descriptionEl ? descriptionEl.textContent.toLowerCase() : '';
            const url = urlEl ? urlEl.textContent.toLowerCase() : '';

            if (title.includes(searchTerm) || description.includes(searchTerm) || url.includes(searchTerm)) {
                card.classList.remove('hidden');
                totalVisibleCards++;
            } else {
                card.classList.add('hidden');
            }
        });

        sections.forEach(section => {
            const visibleCards = section.querySelectorAll('.link-card:not(.hidden)');
            if (visibleCards.length === 0) {
                section.classList.add('hidden');
            } else {
                section.classList.remove('hidden');
            }
        });

        // Show no results message if needed
        if (totalVisibleCards === 0) {
            noResultsMessage.classList.remove('hidden');
        } else {
            noResultsMessage.classList.add('hidden');
        }
    }

    // Real-time search on input
    if (searchBox) {
        searchBox.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            performSearch(searchTerm);
        });
    }

    // Handle form submit
    if (searchForm) {
        searchForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const searchTerm = searchBox.value.toLowerCase();
            performSearch(searchTerm);
        });
    }
});

// Smooth scroll to section
function scrollToSection(sectionId) {
    const section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }
}
