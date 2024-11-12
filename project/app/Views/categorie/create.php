<h1>Créer une nouvelle catégorie</h1>

<form method="post" action="?controller=categorie&action=create">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="type">Type :</label>
    <input type="text" id="type" name="type" required>

    <button type="submit">Créer la catégorie</button>
</form>