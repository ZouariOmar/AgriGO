<h1>Liste des catégories</h1>

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $categorie) : ?>
        <tr>
            <td><?= $categorie['nom'] ?></td>
            <td><?= $categorie['type'] ?></td>
            <td>
                <a href="?controller=categorie&action=show&id=<?= $categorie['id'] ?>">Voir</a>
                <a href="?controller=categorie&action=edit&id=<?= $categorie['id'] ?>">Modifier</a>
                <a href="?controller=categorie&action=delete&id=<?= $categorie['id'] ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>