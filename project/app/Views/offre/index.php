<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Offres</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fdf4; 
            margin: 0;
            padding: 20px;
            color: #155724; 
        }

        .container {
            background-color: #ffffff;
            border: 1px solid #c3e6cb;
            border-radius: 100spx;
            padding: 50px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 3000px;
            margin: 0 auto;
        }

        h1, h2 {
            color: #155724;
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        h2 {
            font-size: 20px;
        }

        .table-container {
            overflow-x: auto;
        }

        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #ffffff;
        }

        .styled-table th, .styled-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }

        .styled-table thead tr {
            background-color: #28a745;
            color: #ffffff;
            text-align: left;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #28a745;
        }

        .error-message {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
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

        input[type="number"] {
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
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #218838; 
        }
        .action-btn {
            padding: 5px 10px;
            font-size: 14px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 5px;
        }

        .delete-btn {
            background-color: #dc3545;
            color: #ffffff;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .edit-btn {
            background-color: #28a745;
            color: #ffffff;
        }

        .edit-btn:hover {
            background-color: #218838;
        }

        .update-btn {
            background-color: #28a745;
            color: #ffffff;
        }

        .update-btn:hover {
            background-color: #218838;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestion des Offres</h1>
        
        <?php include '../../forms/HRO.php'; ?>


        <form method="get" action="create.php">
            <button type="submit">Créer une nouvelle offre</button>
        </form>

        <div class="footer">
            <p>Gestion des offres - Tous droits réservés ( AgriGO.com ) </p>
        </div>
    </div>
</body>
</html>

