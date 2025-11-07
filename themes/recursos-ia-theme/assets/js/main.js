document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchBox = document.getElementById('searchBox');

    if (searchBox) {
        searchBox.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const cards = document.querySelectorAll('.link-card');
            const sections = document.querySelectorAll('.category-section');

            if (!searchTerm) {
                cards.forEach(card => card.classList.remove('hidden'));
                sections.forEach(section => section.classList.remove('hidden'));
                return;
            }

            cards.forEach(card => {
                const title = card.querySelector('.link-title').textContent.toLowerCase();
                const description = card.querySelector('.link-description').textContent.toLowerCase();
                const url = card.querySelector('.link-url').textContent.toLowerCase();

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
