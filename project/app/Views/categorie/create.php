



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Nouvelle Catégorie</title>
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
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            margin-bottom: 8px;
            text-align: left;
        }

        input[type="text"] {
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

        
        .footer {
            font-size: 12px;
            color: #6c757d; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Créer une Nouvelle Catégorie</h1>
        <form method="post" action="../../forms/handleCreation.php">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Nom de la catégorie" required>

            <label for="type">Type :</label>
            <input type="text" id="type" name="type" placeholder="Type de la catégorie" required>

            <button type="submit">Créer la catégorie</button>
        </form>
            <p>Veuillez vérifier les informations avant de soumettre.</p>
        </div>
    </div>
</body>
</html>
