<?php
// Database connection parameters
$host = 'localhost';
$db = 'pepiniere'; // replace with your database name
$user = 'root'; // replace with your database username
$pass = ''; // replace with your database password

try {
    // Set up the PDO instance
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // For error handling
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$titre = "Checkout Page";

$sql = "SELECT usr_id FROM commande ";
$stmt = $pdo->prepare($sql);
$stmt->execute();

$usr_id = $stmt->fetchColumn();

if ($usr_id === false) {
    $usr_id = 'Utilisateur non trouvé';
}

$identifiant = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : 'id indisponible';
?>

<?php ob_start(); ?>
<div class="container site">
    <h1 class="text-logo"><span class="glyphicon glyphicon-grain"></span> Checkout <span class="glyphicon glyphicon-grain"></span></h1>
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="/AgriGo/index.php">Nos produits</a></li>
        </ul>
    </div>
    <div class="row">
        <div id="contenu">
            <div class="caption">
                <h4 class="nom">Resume de votre commande</h4>
                <form id="checkoutForm" novalidate>
                    <div class="form-group">
                        <small id="userIdError" class="text-danger"></small>
                        <label for="user_id">ID Utilisateur</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $usr_id ?>" readonly>
                    </div>
                    <div class="form-group">
                        <small id="articleIdError" class="text-danger"></small>
                        <label for="article_id">ID Article</label>
                        <input value="<?= $identifiant; ?>" type="text" class="form-control" id="article_id" name="article_id">
                    </div>
                    <div class="form-group">
                        <small id="shippingAddressError" class="text-danger"></small>
                        <label for="shippingAddress">Adresse de livraison</label>
                        <textarea class="form-control" name="shippingAddress" id="shippingAddress"></textarea>
                    </div>
                    <div class="form-group">
                        <small id="paymentMethodError" class="text-danger"></small>
                        <label for="paymentMethod">Methode de paiement</label>
                        <select class="form-control" name="paymentMethod" id="paymentMethod">
                            <option value="">-- Selectionnez une option --</option>
                            <option value="creditCard">Carte de credit</option>
                            <option value="paypal">PayPal</option>
                            <option value="bankTransfer">Virement bancaire</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <small id="locationError" class="text-danger"></small>
                        <label for="location">Lieu de depart</label>
                        <input type="text" class="form-control" id="location" name="location">
                    </div>
                    <div class="form-group">
                        <small id="dateDepartError" class="text-danger"></small>
                        <label for="date_depart">Date de depart</label>
                        <input type="date" class="form-control" id="date_depart" name="date_depart">
                    </div>
                    <div class="form-group">
                        <small id="dateArriveeError" class="text-danger"></small>
                        <label for="date_arrivee">Date d'arrivee</label>
                        <input type="date" class="form-control" id="date_arrivee" name="date_arrivee">
                    </div>
                    <div class="form-group">
                        <small id="emailError" class="text-danger"></small>
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block" style="margin-top: 20px;">
                        <span class="glyphicon glyphicon-check"></span> Confirmer la commande
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    document.getElementById("checkoutForm").addEventListener("submit", function (e) {
        e.preventDefault(); // Prevent default form submission

        // Clear previous error messages
        document.querySelectorAll(".text-danger").forEach(function (errorElement) {
            errorElement.textContent = "";
        });

        // Collect form data
        const articleId = document.getElementById("article_id").value.trim();
        const shippingAddress = document.getElementById("shippingAddress").value.trim();
        const paymentMethod = document.getElementById("paymentMethod").value.trim();
        const location = document.getElementById("location").value.trim();
        const dateDepart = document.getElementById("date_depart").value;
        const dateArrivee = document.getElementById("date_arrivee").value;
        const email = document.getElementById("email").value.trim();

        let isValid = true;

        // Validate Article ID
        if (!articleId) {
            document.getElementById("articleIdError").textContent = "Veuillez entrer l'ID de l'article.";
            isValid = false;
        }

        // Validate Shipping Address
        if (!shippingAddress) {
            document.getElementById("shippingAddressError").textContent = "Veuillez entrer une adresse de livraison.";
            isValid = false;
        }

        // Validate Payment Method
        if (!paymentMethod) {
            document.getElementById("paymentMethodError").textContent = "Veuillez selectionner une methode de paiement.";
            isValid = false;
        }

        // Validate Location
        if (!location) {
            document.getElementById("locationError").textContent = "Veuillez entrer un lieu de depart.";
            isValid = false;
        }

        // Validate Dates
        if (!dateDepart) {
            document.getElementById("dateDepartError").textContent = "Veuillez entrer une date de depart.";
            isValid = false;
        }

        if (!dateArrivee || new Date(dateArrivee) <= new Date(dateDepart)) {
            document.getElementById("dateArriveeError").textContent = "La date d'arrivee doit etre posterieure à la date de depart.";
            isValid = false;
        }

        // Validate Email
        if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            document.getElementById("emailError").textContent = "Veuillez entrer une adresse email valide.";
            isValid = false;
        }

        if (!isValid) return; // Stop submission if there are validation errors

        // Generate PDF using jsPDF
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.text("Resume de la commande", 10, 10);
        doc.text(`ID Utilisateur: ${document.getElementById("user_id").value}`, 10, 20);
        doc.text(`ID Article: ${articleId}`, 10, 30);
        doc.text(`Adresse de livraison: ${shippingAddress}`, 10, 40);
        doc.text(`Methode de paiement: ${paymentMethod}`, 10, 50);
        doc.text(`Lieu de depart: ${location}`, 10, 60);
        doc.text(`Date de depart: ${dateDepart}`, 10, 70);
        doc.text(`Date d'arrivee: ${dateArrivee}`, 10, 80);
        doc.text(`Email: ${email}`, 10, 90);

        doc.save("commande.pdf");
    });
</script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<style>
    .text-danger {
        font-size: 0.875em;
        margin-bottom: 5px;
        display: block;
    }
</style>

<?php
$content = ob_get_clean();
echo $content;
?>
