<h1>Créer une nouvelle offre</h1>

<form method="post" action="?controller=offre&action=create">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required>

    <label for="prix">Prix :</label>
    <input type="number" id="prix" name="prix" required>

    <label for="telephone">Téléphone :</label>
    <input type="tel" id="telephone" name="telephone" required>

    <label for="localisation">Localisation :</label>
    <input type="text" id="localisation" name="localisation" required>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="image">Image :</label>
    <input type="text" id="image" name="image" required>

    <label for="detail">Détails :</label>
    <textarea id="detail" name="detail" required></textarea>

    <label for="categorie_id">Catégorie :</label>
    <select id="categorie_id" name="categorie_id" required>
        <?php foreach ($categories as $categorie) : ?>
        <option value="<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Créer l'offre</button>
</form>