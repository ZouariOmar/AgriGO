document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("Partenaire");
    const nameInput = form.querySelector('input[name="name"]');
    const emailInput = form.querySelector('input[name="email"]');
    const telephoneInput = form.querySelector('input[name="telephone"]');

    // Fonction pour afficher des messages d'erreur
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

        // Validation du nom
        if (nameInput.value.trim() === "") {
            showError(nameInput, "Le nom du partenaire est requis.");
            isValid = false;
        } else {
            clearError(nameInput);
        }

        // Validation de l'email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value)) {
            showError(emailInput, "Veuillez entrer un email valide.");
            isValid = false;
        } else {
            clearError(emailInput);
        }

        // Validation du téléphone
        const phoneRegex = /^[0-9]{8,15}$/;
        if (!phoneRegex.test(telephoneInput.value)) {
            showError(telephoneInput, "Le téléphone doit contenir entre 8 et 15 chiffres.");
            isValid = false;
        } else {
            clearError(telephoneInput);
        }

        // Empêche la soumission si un champ est invalide
        if (!isValid) {
            event.preventDefault();
        }
    });
});