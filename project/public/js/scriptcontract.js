document.addEventListener("DOMContentLoaded", () => {
    const deleteLinks = document.querySelectorAll('a[href*="deletecontract.php"]');

    deleteLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            const confirmDelete = confirm("Are you sure you want to delete this contract?");
            if (!confirmDelete) {
                event.preventDefault();
            }
        });
    });
});
// Sélectionne le bouton et le corps
const themeToggleButton = document.getElementById('theme-toggle');
const body = document.body;

// Vérifie si le mode sombre est déjà activé
if (localStorage.getItem('dark-mode') === 'true') {
    body.classList.add('dark-mode');
    themeToggleButton.textContent = 'Switch to Light Mode';
}

// Ajoute un événement pour basculer le mode
themeToggleButton.addEventListener('click', () => {
    const darkModeEnabled = body.classList.toggle('dark-mode');
    localStorage.setItem('dark-mode', darkModeEnabled);
    themeToggleButton.textContent = darkModeEnabled ? 'Switch to Light Mode' : 'Switch to Dark Mode';
});
