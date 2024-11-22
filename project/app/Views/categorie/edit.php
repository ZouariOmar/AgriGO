<?php
// Check if the ID is set in the POST data, or initialize it to an empty string
$id = isset($_POST['id']) ? htmlspecialchars($_POST['id']) : '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour une catégorie</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fdf4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #155724;
        }

        .container {
            background-color: #ffffff;
            border: 1px solid #c3e6cb;
            border-radius: 10px;
            padding: 20px 40px;
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

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            text-align: left;
        }

        input[type="text"], input[type="number"] {
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
        <h1>Mettre à jour une catégorie</h1>

        <form method="post" action="../../forms/handlerUpdate.php" id="categoryForm">
            <label for="id">ID :</label>
            <input type="text" name="id" id="id" value="<?php echo $id; ?>" required>

            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars(""); ?>" required>

            <label for="type">Type :</label>
            <input type="text" id="type" name="type" placeholder="job, lending, ou produce" required>
            <div id="typeError" class="error-message"></div>

            <button type="submit">Mettre à jour la catégorie</button>
        </form>

        <div class="footer">
            <p>Assurez-vous que les informations sont correctes avant de soumettre.</p>
        </div>
    </div>
    <script src="../../../public/js/Cat.js"></script>
</body>
</html>

