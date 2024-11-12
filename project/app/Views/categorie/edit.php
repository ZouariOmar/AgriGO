<h1>Modifier une catégorie</h1>

<form method="post" action="?controller=categorie&action=update&id=<?= $categorie['id'] ?>">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" value="<?= $categorie['nom'] ?>" required>

    <label for="type">Type :</label>
    <input type="text" id="type" name="type" value="<?= $categorie['type'] ?>" required>

    <button type="submit">Mettre à jour la catégorie</button>
</form>