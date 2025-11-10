document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchBox = document.getElementById('searchBox');
    const searchForm = document.getElementById('searchForm');

    // Function to perform search
    function performSearch(searchTerm) {
        const cards = document.querySelectorAll('.link-card');
        const sections = document.querySelectorAll('.category-section');

        if (!searchTerm) {
            cards.forEach(card => card.classList.remove('hidden'));
            sections.forEach(section => section.classList.remove('hidden'));
            return;
        }

        cards.forEach(card => {
            const titleEl = card.querySelector('.link-title');
            const descriptionEl = card.querySelector('.link-description');
            const urlEl = card.querySelector('.link-url');

            const title = titleEl ? titleEl.textContent.toLowerCase() : '';
            const description = descriptionEl ? descriptionEl.textContent.toLowerCase() : '';
            const url = urlEl ? urlEl.textContent.toLowerCase() : '';

            if (title.includes(searchTerm) || description.includes(searchTerm) || url.includes(searchTerm)) {
                card.classList.remove('hidden');
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
