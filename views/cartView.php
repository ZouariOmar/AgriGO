<?php
session_start();
require_once '../models/ProductModel.php';
require_once '../models/CartModel.php';

$userId = $_SESSION['utilisateur']['id'];

$cartModel = new CartModel();
$productModel = new ProductModel();

// Get the user's cart
$panier = $cartModel->getCart($userId);
$total = 0;

// Fetch only the products that are in the cart
$selectedProductIds = array_keys($panier); // Extract product IDs from the cart
$produits = $productModel->getProductsByIds($selectedProductIds); // Modify ProductModel to fetch products by IDs
?>

<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php'; ?>
    <title>Panier</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>
<?php include '../include/nav_front.php'; ?>

<div class="container py-2">
    <?php if (isset($_GET['success'])) { ?>
        <h1>Merci !</h1>
        <div class="alert alert-success" role="alert">
            Votre commande avec le montant <strong>(<?php echo $total; ?>)</strong> a été ajoutée.
        </div>
        <hr>
    <?php } ?>

    <h4>Panier (<?php echo count($panier); ?>)</h4>
    <?php if (empty($panier)) { ?>
        <div class="alert alert-warning" role="alert">
            Votre panier est vide ! <a href="./index.php" class="btn btn-success btn-sm">Acheter des produits</a>
        </div>
    <?php } else { ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Libelle</th>
                    <th>Quantité</th>
                    <th>Prix</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produits as $produit) {
                    $idProduit = $produit->id;
                    $qty = isset($panier[$idProduit]) ? $panier[$idProduit] : 0;
                    $totalProduit = $produit->prix * $qty;
                    $total += $totalProduit;
                    ?>
                    <tr>
                        <td><?php echo $produit->id; ?></td>
                        <td><img width="80px" src="../upload/produit/<?php echo $produit->image; ?>" alt=""></td>
                        <td><?php echo $produit->libelle; ?></td>
                        <td>
                            <form method="post" action="../controllers/CartController.php?action=addToCart">
                                <input type="hidden" name="id" value="<?php echo $produit->id; ?>" />
                                <input type="number" name="qty" value="<?php echo $qty; ?>" min="0" />
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </form>
                        </td>
                        <td><?php echo $produit->prix; ?> <i class="fa fa-solid fa-dollar"></i></td>
                        <td><?php echo $totalProduit; ?> <i class="fa fa-solid fa-dollar"></i></td>
                        <td>
                            <form method="post" action="../views/supprimer_panier.php">
                                <input type="hidden" name="id" value="<?php echo $produit->id; ?>" />
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5" align="right"><strong>Total</strong></td>
                    <td><?php echo $total; ?> <i class="fa fa-solid fa-dollar"></i></td>
                </tr>
                <tr>
                    <td colspan="6" align="right">
                        <form method="post">
                            <input type="submit" class="btn btn-success" name="valider" value="Valider la commande">
                            <input type="submit" class="btn btn-danger" name="vider" value="Vider le panier" onclick="return confirm('Voulez-vous vraiment vider le panier ?')">
                        </form>
                    </td>
                </tr>
            </tfoot>
        </table>
        <button id="generateReceipt" class="btn btn-primary">Télécharger la facture</button>
    <?php } ?>
</div>

<script>
    document.getElementById("generateReceipt").addEventListener("click", function() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        const panierData = <?php echo json_encode($panier); ?>;
        const produitsData = <?php echo json_encode($produits); ?>;
        const totalAmount = "<?php echo $total; ?>";

        doc.text("Facture de commande", 15, 15);
        let yPosition = 25;
        produitsData.forEach((produit, index) => {
            const qty = panierData[produit.id] || 0;
            if (qty > 0) {
                const productTotal = qty * produit.prix;
                doc.text(`- Commande: ${produit.libelle}\n- Quantité: ${qty}\n- Prix Unitaire: ${produit.prix}\n- Total: ${productTotal} $`, 5, yPosition + 5 * (index + 1));
                yPosition += 25;
            }
        });
        doc.text("Total: " + totalAmount + " $", 5, yPosition + 10);
        doc.save("facture_panier.pdf");
    });
</script>

</body>
</html>
