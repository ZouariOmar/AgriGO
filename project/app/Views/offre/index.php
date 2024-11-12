<h1>Liste des offres</h1>

<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Prix</th>
            <th>Téléphone</th>
            <th>Localisation</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($offres as $offre) : ?>
        <tr>
            <td><?= $offre['titre'] ?></td>
            <td><?= $offre['prix'] ?></td>
            <td><?= $offre['telephone'] ?></td>
            <td><?= $offre['localisation'] ?></td>
            <td><?= $offre['categorie_id'] ?></td>
            <td>
                <a href="?controller=offre&action=show&id=<?= $offre['id'] ?>">Voir</a>
                <a href="?controller=offre&action=edit&id=<?= $offre['id'] ?>">Modifier</a>
                <a href="?controller=offre&action=delete&id=<?= $offre['id'] ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>