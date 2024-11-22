<?php
require_once '../Controllers/Offre_Controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are provided
    if (isset($_POST['id']) && isset($_POST['titre']) && isset($_POST['prix']) && isset($_POST['telephone']) && 
        isset($_POST['localisation']) && isset($_POST['email']) && isset($_POST['image']) && 
        isset($_POST['detail']) && isset($_POST['categorie_id'])) {
        
        // Sanitize and trim input data to avoid SQL injection and XSS attacks
        $id = intval($_POST['id']); // Ensure ID is an integer
        $titre = htmlspecialchars(trim($_POST['titre']));
        $prix = floatval($_POST['prix']);
        $telephone = htmlspecialchars(trim($_POST['telephone']));
        $localisation = htmlspecialchars(trim($_POST['localisation']));
        $email = htmlspecialchars(trim($_POST['email']));
        $image = htmlspecialchars(trim($_POST['image']));
        $detail = htmlspecialchars(trim($_POST['detail']));
        $categorie_id = intval($_POST['categorie_id']);

        // Instantiate the controller
        $offreController = new OffreController();

        // Call the update method
        if ($offreController->updateOffre($id, $titre, $prix, $telephone, $localisation, $email, $image, $detail, $categorie_id)) {
            $message = "L'offre a été mise à jour avec succès.";
        } else {
            $message = "Erreur lors de la mise à jour de l'offre. Veuillez réessayer.";
        }
    } else {
        $message = "Veuillez fournir tous les champs requis.";
    }
} else {
    $message = "Méthode de requête non valide.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour de l'Offre</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Mise à jour de l'Offre</h1>
        <div class="message">
            <?php echo $message; ?>
        </div>
        <a href="../Views/offre/index.php" class="button">Retour à la page d'accueil</a>
    </div>
</body>
</html>

