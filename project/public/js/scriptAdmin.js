// Récupérer l'élément bouton et vérifier l'état du thème stocké
const themeToggleButton = document.getElementById("theme-toggle");

// Vérifier si un mode a été enregistré dans localStorage
if (localStorage.getItem("theme") === "dark") {
    document.body.classList.add("dark-mode");
    themeToggleButton.textContent = "Switch to Light Mode";
}

// Ajouter un événement au bouton pour changer le thème
themeToggleButton.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
    
    // Si le mode sombre est activé, on le sauvegarde, sinon on désactive le stockage
    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
        themeToggleButton.textContent = "Switch to Light Mode";
    } else {
        localStorage.removeItem("theme");
        themeToggleButton.textContent = "Switch to Dark Mode";
    }
});
