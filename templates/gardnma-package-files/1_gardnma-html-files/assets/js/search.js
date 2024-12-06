document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('inputGroup');
    const searchButton = document.querySelector('#search_manu .input-group-addon a');
    const offerContainer = document.querySelector('.product-layout_width');

    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase();
        const offerForms = offerContainer.querySelectorAll('form');

        offerForms.forEach(form => {
            const title = form.querySelector('.product_title a').textContent.toLowerCase();
            if (title.includes(searchTerm)) {
                form.style.display = '';
            } else {
                form.style.display = 'none';
            }
        });
    }

    // Perform search when the search button is clicked
    searchButton.addEventListener('click', function(e) {
        e.preventDefault();
        performSearch();
    });

    // Perform search when Enter key is pressed in the search input
    searchInput.addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });

    // Optional: Perform search as the user types (real-time filtering)
    searchInput.addEventListener('input', performSearch);
});