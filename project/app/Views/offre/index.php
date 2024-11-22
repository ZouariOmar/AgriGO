<?php
// Includ the config file (DB)
/**
 * ! Fetch offers from offers table (like:
 * $sql = "SELECT * FROM offers";
 * $stmt = $this->db->execu($sql);
 * $offers = $stmt->fetch(PDO::FETCH_ASSOC);
 */
// 

?>




<h1>Liste des offres</h1>

<?php if (!empty($offres)) : ?>
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
                    <td><?= htmlspecialchars($offre['titre']) ?></td>
                    <td><?= htmlspecialchars($offre['prix']) ?></td>
                    <td><?= htmlspecialchars($offre['telephone']) ?></td>
                    <td><?= htmlspecialchars($offre['localisation']) ?></td>
                    <td><?= htmlspecialchars($offre['categorie_id']) ?></td>
                    <td>
                        <a href="?controller=offre&action=show&id=<?= $offre['id'] ?>">Voir</a>
                        <a href="?controller=offre&action=edit&id=<?= $offre['id'] ?>">Modifier</a>
                        <a href="?controller=offre&action=delete&id=<?= $offre['id'] ?>">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Aucune offre trouvée.</p>
<?php endif; ?>
