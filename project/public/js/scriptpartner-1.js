// Sélecteur du bouton de bascule de thème
const themeToggle = document.getElementById('theme-toggle');

// Appliquer le mode sombre si déjà activé
if (localStorage.getItem('darkMode') === 'enabled') {
    document.body.classList.add('dark-mode');
    themeToggle.textContent = 'Switch to Light Mode';
}

// Événement pour basculer entre les thèmes
themeToggle.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');

    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('darkMode', 'enabled');
        themeToggle.textContent = 'Switch to Light Mode';
    } else {
        localStorage.setItem('darkMode', 'disabled');
        themeToggle.textContent = 'Switch to Dark Mode';
    }
});

// Validation en temps réel du formulaire
const form = document.querySelector('form');
const nameInput = form.querySelector('input[name="pName"]');
const emailInput = form.querySelector('input[name="email"]');
const numberInput = form.querySelector('input[name="number"]');

// Fonction pour afficher un message d'erreur
function showError(input, message) {
    const errorDiv = input.nextElementSibling;
    errorDiv.textContent = message;
    input.classList.add('error-border');
}

// Fonction pour effacer le message d'erreur
function clearError(input) {
    const errorDiv = input.nextElementSibling;
    errorDiv.textContent = '';
    input.classList.remove('error-border');
}

// Vérification des champs
nameInput.addEventListener('input', () => {
    if (nameInput.value.trim() === '') {
        showError(nameInput, 'Partner name is required');
    } else {
        clearError(nameInput);
    }
});

emailInput.addEventListener('input', () => {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(emailInput.value.trim())) {
        showError(emailInput, 'Enter a valid email address');
    } else {
        clearError(emailInput);
    }
});

numberInput.addEventListener('input', () => {
    const phonePattern = /^\d{8,12}$/; // Ex: 8 à 12 chiffres
    if (!phonePattern.test(numberInput.value.trim())) {
        showError(numberInput, 'Enter a valid number (8-12 digits)');
    } else {
        clearError(numberInput);
    }
});

// Validation finale à la soumission du formulaire
form.addEventListener('submit', (e) => {
    let isValid = true;

    if (nameInput.value.trim() === '') {
        showError(nameInput, 'Partner name is required');
        isValid = false;
    }
    if (emailInput.value.trim() === '' || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value.trim())) {
        showError(emailInput, 'Enter a valid email address');
        isValid = false;
    }
    if (numberInput.value.trim() === '' || !/^\d{8,12}$/.test(numberInput.value.trim())) {
        showError(numberInput, 'Enter a valid number (8-12 digits)');
        isValid = false;
    }

    if (!isValid) {
        e.preventDefault(); // Empêcher l'envoi du formulaire si des erreurs existent
    }
});
