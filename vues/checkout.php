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
    // Handle any errors during connection
    die("Connection failed: " . $e->getMessage());
}

$titre = "Checkout Page"; 

// Fetch usr_id from the 'commande' table
$sql = "SELECT usr_id FROM commande ";  // Fetch one usr_id from the 'commande' table
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Get the usr_id
$usr_id = $stmt->fetchColumn(); // Fetch the first column of the first row

// Optional: Handle case when no usr_id is found
if ($usr_id === false) {
    $usr_id = 'Utilisateur non trouvé'; // If no usr_id is found
}

$identifiant = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : 'id indisponible';
?>

<?php ob_start(); ?>
<!-- HTML content starts here -->
<div class="container site">
    <h1 class="text-logo"><span class="glyphicon glyphicon-grain"></span> Checkout <span class="glyphicon glyphicon-grain"></span></h1>  
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php">Nos produits</a></li>
        </ul>
    </div>
    <div class="row">
        <div id="contenu">
            <div class="caption">
                <h4 class="nom">Resume de votre commande</h4>
                <form id="checkoutForm">
                    <!-- ID Utilisateur Field (Fetched from database) -->
                    <div class="form-group">
                        <label for="user_id">ID Utilisateur</label>
                        <input type="text" class="form-control" id="user_id" name="user_id" value="<?= $usr_id ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="article_id">ID Article</label>
                        <input value="<?= $identifiant; ?>" type="text" class="form-control" id="article_id" name="article_id" required>
                    </div>
                    <div class="form-group">
                        <label for="shippingAddress">Adresse de livraison</label>
                        <textarea class="form-control" name="shippingAddress" id="shippingAddress" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="paymentMethod">Methode de paiement</label>
                        <select class="form-control" name="paymentMethod" id="paymentMethod" required>
                            <option value="creditCard">Carte de credit</option>
                            <option value="paypal">PayPal</option>
                            <option value="bankTransfer">Virement bancaire</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="location">Lieu de depart</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="form-group">
                        <label for="date_depart">Date de depart</label>
                        <input type="date" class="form-control" id="date_depart" name="date_depart" required>
                    </div>
                    <div class="form-group">
                        <label for="date_arrivee">Date d'arrivee</label>
                        <input type="date" class="form-control" id="date_arrivee" name="date_arrivee" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
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
        console.log("Form submitted!");  // Debugging line

        // Collect form data
        const email = document.getElementById("email").value.trim();
        const shippingAddress = document.getElementById("shippingAddress").value.trim();
        const location = document.getElementById("location").value.trim();
        const date_depart = document.getElementById("date_depart").value;
        const date_arrivee = document.getElementById("date_arrivee").value;

        // Skip validation temporarily for debugging
        // console.log(email, shippingAddress, location, date_depart, date_arrivee);

        // Generate the PDF (without validation for now)
        const nom = document.getElementById("nom") ? document.getElementById("nom").value : "N/A";  // Check if nom exists
        const user_id = document.getElementById("user_id").value;
        const article_id = document.getElementById("article_id").value;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.setFontSize(18);
        doc.text("Résumé de la commande", 10, 20);

        doc.setFontSize(12);
        doc.text(`ID Utilisateur: ${user_id}`, 10, 40);
        doc.text(`ID Article: ${article_id}`, 10, 50);
        doc.text(`Adresse de livraison: ${shippingAddress}`, 10, 60);
        doc.text(`Méthode de paiement: ${document.getElementById("paymentMethod").value}`, 10, 70);
        doc.text(`Lieu de départ: ${location}`, 10, 80);
        doc.text(`Date de départ: ${date_depart}`, 10, 90);
        doc.text(`Date d'arrivée: ${date_arrivee}`, 10, 100);
        doc.text(`Email: ${email}`, 10, 110);

        doc.save("commande.pdf");  // Save the file
        console.log("PDF generated");  // Debugging line
    });
</script>

<!-- Custom Stylesheet -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<style>
    .container.site {
        margin-top: 30px;
    }
    .text-logo {
        font-family: 'Arial', sans-serif;
        text-align: center;
        margin-bottom: 30px;
    }
    .form-control {
        margin-bottom: 15px;
    }
    .btn {
        margin-top: 20px;
    }
    .caption {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
    }
    .form-group {
        margin-bottom: 20px;
    }
</style>

<?php
$content = ob_get_clean();
echo $content;
?>
