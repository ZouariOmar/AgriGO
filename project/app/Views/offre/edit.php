<?php
// Check if the ID is set in the POST data, or initialize it to an empty string
$id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour une offre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fdf4;
            margin: 0;
            padding: 0;
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
            padding: 20px 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #155724;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            text-align: left;
        }

        input[type="text"], input[type="number"], input[type="email"], textarea {
            padding: 10px;
            font-size: 14px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        button {
            background-color: #28a745;
            color: #ffffff;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #218838;
        }

        button:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #6c757d;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: -15px;
            margin-bottom: 15px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mettre à jour une offre</h1>

        <form method="post" action="../../forms/HUO.php" id="offerForm">
            <label for="id">ID :</label>
            <input type="text" name="id" id="id" value="<?php echo $id; ?>" required>

            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" value="<?php echo htmlspecialchars(""); ?>" required>
            <div id="titreError" class="error-message"></div>

            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix" step="0.01" value="<?php echo htmlspecialchars(""); ?>" required>
            <div id="prixError" class="error-message"></div>

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="<?php echo htmlspecialchars(""); ?>" placeholder="+216 ** *** ***" required>
            <div id="telephoneError" class="error-message"></div>

            <label for="localisation">Localisation :</label>
            <input type="text" id="localisation" name="localisation" value="<?php echo htmlspecialchars(""); ?>" required>
            <div id="localisationError" class="error-message"></div>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars(""); ?>" required>
            <div id="emailError" class="error-message"></div>

            <label for="image">URL de l'image :</label>
            <input type="text" id="image" name="image" value="<?php echo htmlspecialchars(""); ?>" required>
            <div id="imageError" class="error-message"></div>

            <label for="detail">Détail :</label>
            <textarea id="detail" name="detail" rows="4" required><?php echo htmlspecialchars(""); ?></textarea>
            <div id="detailError" class="error-message"></div>

            <label for="categorie_id">ID de la catégorie :</label>
            <input type="number" id="categorie_id" name="categorie_id" value="<?php echo htmlspecialchars(""); ?>" required>

            <button type="submit">Mettre à jour l'offre</button>
        </form>

        <div class="footer">
            <p>Assurez-vous que les informations sont correctes avant de soumettre.</p>
        </div>
    </div>
    <script src="../../../public/js/off.js"></script>
</body>
</html>

