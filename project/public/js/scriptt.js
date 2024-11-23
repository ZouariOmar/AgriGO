document.addEventListener("DOMContentLoaded", () => {
    const deleteLinks = document.querySelectorAll('a[href^="deletePartenaire.php"]');

    deleteLinks.forEach(link => {
        link.addEventListener("click", (event) => {
            const partnerName = link.closest("tr").querySelector("td:nth-child(2)").textContent;
            if (!confirm(`Êtes-vous sûr de vouloir supprimer le partenaire "${partnerName}" ?`)) {
                event.preventDefault(); // Annule la suppression si non confirmé
            }
        });
    });
});
