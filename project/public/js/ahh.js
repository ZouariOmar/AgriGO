document.addEventListener('DOMContentLoaded', function() {
    console.log("nik ekhdem asba");
    const searchInput = document.getElementById('inputGroup');
    const searchButton = document.querySelector('.input-group-addon a');
    const productContainer = document.querySelector('.product-layout_width');

    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase();
        const productForms = productContainer.querySelectorAll('.col-md-4');

        productForms.forEach(form => {
            const title = form.querySelector('.product_title a').textContent.toLowerCase();
            if (title.includes(searchTerm)) {
                form.style.display = 'block';
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