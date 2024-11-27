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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fdf4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #155724;
        }
        .container {
            background-color: #ffffff;
            border: 1px solid #c3e6cb;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #155724;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }
        .button {
            display: inline-block;
            background-color: #28a745;
            color: #ffffff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #218838;
        }
        form {
            text-align: left;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
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

            <label for="telephone">Téléphone:</label>
            <input type="tel" id="telephone" name="telephone" required>

            <label for="localisation">Localisation:</label>
            <input type="text" id="localisation" name="localisation" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="image">Image URL:</label>
            <input type="url" id="image" name="image" required>

            <label for="detail">Détail:</label>
            <textarea id="detail" name="detail" rows="4" required></textarea>

            <label for="categorie_id">ID de la catégorie:</label>
            <input type="number" id="categorie_id" name="categorie_id" required>

            <input type="submit" value="Créer l'offre" class="button">
        </form>
        <a href="../Store.php" class="button">Retour à la page d'accueil</a>
    </div>
    <script src="assets/js/off.js"></script>
</body>
</html>

