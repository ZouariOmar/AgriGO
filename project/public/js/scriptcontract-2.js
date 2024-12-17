document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("contract");
    const titleInput = document.getElementById("name");
    const descriptionInput = document.getElementById("description");
    const startDateInput = document.getElementById("date_creation");
    const endDateInput = document.getElementById("date_fin");

    const showError = (input, message) => {
        let error = input.nextElementSibling;
        if (!error || !error.classList.contains("error")) {
            error = document.createElement("div");
            error.classList.add("error");
            input.parentNode.insertBefore(error, input.nextSibling);
        }
        error.textContent = message;
        error.style.display = "block";
    };

    const clearError = (input) => {
        const error = input.nextElementSibling;
        if (error && error.classList.contains("error")) {
            error.style.display = "none";
        }
    };

    form.addEventListener("submit", (event) => {
        let isValid = true;

        if (titleInput.value.trim() === "") {
            showError(titleInput, "Le titre est requis.");
            isValid = false;
        } else {
            clearError(titleInput);
        }

        if (descriptionInput.value.trim() === "") {
            showError(descriptionInput, "La description est requise.");
            isValid = false;
        } else {
            clearError(descriptionInput);
        }

        if (startDateInput.value === "") {
            showError(startDateInput, "La date de création est requise.");
            isValid = false;
        } else {
            clearError(startDateInput);
        }

        if (endDateInput.value === "") {
            showError(endDateInput, "La date de fin est requise.");
            isValid = false;
        } else {
            clearError(endDateInput);
        }

        if (isValid && new Date(startDateInput.value) > new Date(endDateInput.value)) {
            showError(endDateInput, "La date de fin doit être après la date de création.");
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
        }
    });
});
// Toggle dark/light mode
document.getElementById('theme-toggle').addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    
    // Change the button text based on the mode
    if (document.body.classList.contains('dark-mode')) {
        this.textContent = 'Switch to Light Mode';
    } else {
        this.textContent = 'Switch to Dark Mode';
    }
});