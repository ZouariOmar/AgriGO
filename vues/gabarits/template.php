<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=$titre?></title>
    
    <!-- Using Bootstrap 4 for modern styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/style.css" />

    <!-- Optional Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6; /* Light background for a clean feel */
            color: #2c3e50; /* Dark text for readability */
        }

        .header-logo {
            font-size: 3rem;
            color: #2c6e49; /* Earthy green */
            font-weight: 700;
            padding: 10px;
        }

        .header-logo span {
            font-size: 1.5rem;
        }

        .footer {
            background-color: #2c6e49; /* Matching green theme */
            color: white;
            padding: 25px;
            text-align: center;
        }

        .footer h4 {
            margin: 0;
            font-size: 1.1rem;
        }

        .container {
            margin-top: 40px;
        }

        .animation-container img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }

        .nav-link {
            font-size: 1.2rem;
            color: #2c6e49;
        }

        .nav-link:hover {
            color: #1a4d34; /* Darker green for hover */
        }

        /* Custom styling for the content area */
        .content-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .content-section h2 {
            color: #2c6e49; /* Headings in green */
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <header class="text-center py-4">
        <h1 class="header-logo">
            <span class="glyphicon glyphicon-grain"></span> PRODUCTS LIST <span class="glyphicon glyphicon-grain"></span>
        </h1>
    </header>

    <!-- Main Content -->
    <main>
        <div class="container">
            <!-- Animations (Hidden initially) -->
            <div class="animation-container">
                <img id="arbre" src="/images/animations/arbre.jpg" alt="Petit arbre" />
                <img id="animation1" src="/images/animations/b_dodo.jpg" alt="Bonhomme faisant dodo" />
                <img id="animation2" src="/images/animations/b_souriant.jpg" alt="Bonhomme souriant" />
            </div>

            <!-- Content Section -->
            <div class="content-section">
                <?=$contenu?>
            </div>
        </div>
    </main>

    <!-- Footer Section -->
    <footer class="footer">
        <hr />
        <h4>All Rights Reserved © Mortadha</h4>
    </footer>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="index.js"></script>


</body>

</html>
