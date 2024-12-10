document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");  // Sélectionner le formulaire
    const errorDivs = document.querySelectorAll(".error");  // Sélectionner toutes les divs d'erreur

    form.addEventListener("submit", function (e) {
        let errors = false;

        // Réinitialiser les messages d'erreur avant chaque soumission
        clearErrors();

        // Sélection des champs
        const ptitre = document.querySelector("[name='ptitre']");
        const description = document.querySelector("[name='description']");
        const dateCreation = document.querySelector("[name='date_creation']");
        const dateFin = document.querySelector("[name='date_fin']");

        // Validation du titre
        if (ptitre.value.trim() === "") {
            showError(ptitre, "Le titre du contrat est obligatoire.");
            errors = true;
        }

        // Validation de la description
        if (description.value.trim() === "") {
            showError(description, "La description est obligatoire.");
            errors = true;
        }

        // Validation de la date de création
        if (dateCreation.value.trim() === "") {
            showError(dateCreation, "La date de création est obligatoire.");
            errors = true;
        }

        // Validation de la date de fin
        if (dateFin.value.trim() === "") {
            showError(dateFin, "La date de fin est obligatoire.");
            errors = true;
        } else if (dateCreation.value && dateFin.value && dateCreation.value > dateFin.value) {
            // Vérification que la date de fin est après la date de création
            showError(dateFin, "La date de fin doit être après la date de création.");
            errors = true;
        }

        // Si des erreurs sont présentes, empêcher la soumission du formulaire
        if (errors) {
            e.preventDefault();  // Empêcher l'envoi du formulaire
        }
    });

    // Fonction pour afficher un message d'erreur sous un champ
    function showError(input, message) {
        const errorDiv = input.nextElementSibling;  // Trouver la div d'erreur après le champ
        errorDiv.textContent = message;
        errorDiv.classList.add("visible");  // Afficher la div d'erreur
    }

    // Fonction pour effacer les messages d'erreur
    function clearErrors() {
        errorDivs.forEach(function (errorDiv) {
            errorDiv.textContent = "";  // Effacer le texte
            errorDiv.classList.remove("visible");  // Masquer la div d'erreur
        });
    }
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

