document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector('input[type="text"]');
    const searchButton = document.querySelector('button');

    // Add an event listener to the search button
    searchButton.addEventListener("click", function (e) {
        if (searchInput.value.trim() === "") {
            alert("Please enter a keyword to search.");
            e.preventDefault(); // Prevent form submission
        }
    });

    // Add live feedback for the search input field
    searchInput.addEventListener("input", function () {
        if (searchInput.value.trim() !== "") {
            searchInput.style.border = "1px solid #28a745";
        } else {
            searchInput.style.border = "1px solid #ccc";
        }
    });
});
