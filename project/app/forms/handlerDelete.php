<?php
include_once '../Controllers/Categorie_Controller.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $categorieController = new CategorieController();
        $id = intval($_POST['id']); // Sanitize the input

        if ($categorieController->deleteCategorie($id)) {
            $message = "La catégorie avec l'ID $id a été supprimée avec succès.";
        } else {
            $message = "Erreur lors de la suppression de la catégorie avec l'ID $id.";
        }
    } else {
        $message = "Aucun ID de catégorie fourni.";
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
    <title>Suppression de la Catégorie</title>
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
        <h1>Suppression de la Catégorie</h1>
        <div class="message">
            <?php echo $message; ?>
        </div>
        <a href="../Views/sneat-1.0.0/html/MCindex.php" class="button">Retour à la page d'accueil</a>
    </div>
</body>
</html>

