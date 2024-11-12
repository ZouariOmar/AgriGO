<h1>Modifier une offre</h1>

<form method="post" action="?controller=offre&action=update&id=<?= $offre['id'] ?>">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" value="<?= $offre['titre'] ?>" required>

    <label for="prix">Prix :</label>
    <input type="number" id="prix" name="prix" value="<?= $offre['prix'] ?>" required>

    <label for="telephone">Téléphone :</label>
    <input type="tel" id="telephone" name="telephone" value="<?= $offre['telephone'] ?>" required>

    <label for="localisation">Localisation :</label>
    <input type="text" id="localisation" name="localisation" value="<?= $offre['localisation'] ?>" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" value="<?= $offre['email'] ?>" required>

    <label for="image">Image :</label>
    <input type="text" id="image" name="image" value="<?= $offre['image'] ?>" required>

    <label for="detail">Détails :</label>
    <textarea id="detail" name="detail" required><?= $offre['detail'] ?></textarea>

    <label for="categorie_id">Catégorie :</label>
    <select id="categorie_id" name="categorie_id" required>
        <?php foreach ($categories as $categorie) : ?>
        <option value="<?= $categorie['id'] ?>" <?= $offre['categorie_id'] == $categorie['id'] ? 'selected' : '' ?>><?= $categorie['nom'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Mettre à jour l'offre</button>
</form>