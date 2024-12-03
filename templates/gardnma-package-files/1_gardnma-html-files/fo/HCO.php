<?php
include '../../../../project/app/Controllers/Offre_Controller.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['titre']) && isset($_POST['prix']) && isset($_POST['telephone']) && 
        isset($_POST['localisation']) && isset($_POST['email']) && isset($_POST['image']) && 
        isset($_POST['detail']) && isset($_POST['categorie_id'])) {
        
        $titre = htmlspecialchars(trim($_POST['titre']));
        $prix = floatval($_POST['prix']);
        $telephone = htmlspecialchars(trim($_POST['telephone']));
        $localisation = htmlspecialchars(trim($_POST['localisation']));
        $email = htmlspecialchars(trim($_POST['email']));
        $image = htmlspecialchars(trim($_POST['image']));
        $detail = htmlspecialchars(trim($_POST['detail']));
        $categorie_id = intval($_POST['categorie_id']);

        $offreController = new OffreController();
        if ($offreController->createOffre($titre, $prix, $telephone, $localisation, $email, $image, $detail, $categorie_id)) {
            $message = "L'offre a été créée avec succès.";
        } else {
            $message = "Erreur lors de la création de l'offre. Veuillez réessayer.";
        }
    } else {
        $message = "Veuillez fournir tous les champs requis.";
    }
} else {
    $message = "Méthode de requête invalide.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'Offre</title>
</head>
<body>
    <div class="container">
        <h1>Création d'Offre</h1>
        <div class="message">
            <?php echo $message; ?>
        </div>
        <form method="POST" action="">
            <label for="titre">Titre:</label>
            <input type="text" id="titre" name="titre" required>

            <label for="prix">Prix:</label>
            <input type="number" id="prix" name="prix" step="0.01" required>

            <input type="hidden" id="telephone" name="telephone" value="+216 56 678 345">

            <label for="localisation">Localisation:</label>
            <input type="text" id="localisation" name="localisation" required>

            <input type="hidden" id="email" name="email" value="SDFGH@DFGH.com">

            <label for="image">Image URL:</label>
            <input type="url" id="image" name="image" required>

            <label for="detail">Détail:</label>
            <textarea id="detail" name="detail" rows="4" required></textarea>

            <input type="hidden" id="categorie_id" name="categorie_id" value="1">

            <input type="submit" value="Créer l'offre" class="button">
        </form>
        <a href="../Store.php" class="button">Retour à la page d'accueil</a>
    </div>
    <script src="assets/js/off.js"></script>
</body>
</html>

