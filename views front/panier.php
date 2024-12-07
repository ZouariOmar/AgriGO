<?php
session_start();
require_once '../include/database.php';
?>
<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php' ?>
    <title>Panier</title>
    <!-- Include jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>
<?php include '../include/nav_front.php' ?>
<div class="container py-2">
    <?php
    if (isset($_POST['vider'])) {
        $_SESSION['panier'][$idUtilisateur] = [];
        header('location: panier.php');
    }

    $idUtilisateur = isset($_SESSION['utilisateur']['id']) ? $_SESSION['utilisateur']['id'] : 0;
    $panier = [];
    if (isset($_SESSION['panier'][$idUtilisateur])) {
        $panier = $_SESSION['panier'][$idUtilisateur];
    }

    if (!empty($panier)) {
        $idProduits = array_keys($panier);
        $idProduits = implode(',', $idProduits);
        $produits = $pdo->query("SELECT * FROM produit WHERE id IN ($idProduits)")->fetchAll(PDO::FETCH_ASSOC);
    }

    if (isset($_POST['valider'])) {
        $sql = 'INSERT INTO ligne_commande(id_produit,id_commande,prix,quantite,total) VALUES';
        $total = 0;
        $prixProduits = [];
        foreach ($produits as $produit) {
            $idProduit = $produit['id'];
            $qty = isset($panier[$idProduit]) ? $panier[$idProduit] : 0;

            $prix = $produit['prix'];

            $total += $qty * $prix;
            $prixProduits[$idProduit] = [
                'id' => $idProduit,
                'prix' => $prix,
                'total' => $qty * $prix,
                'qty' => $qty
            ];
        }

        $sqlStateCommande = $pdo->prepare('INSERT INTO commande(id_client,total) VALUES(?,?)');
        $sqlStateCommande->execute([$idUtilisateur, $total]);
        $idCommande = $pdo->lastInsertId();
        $args = [];
        foreach ($prixProduits as $produit) {
            $id = $produit['id'];
            $sql .= "(:id$id,'$idCommande',:prix$id,:qty$id,:total$id),";
        }
        $sql = substr($sql, 0, -1);
        $sqlState = $pdo->prepare($sql);
        foreach ($prixProduits as $produit) {
            $id = $produit['id'];
            $sqlState->bindParam(':id' . $id, $produit['id']);
            $sqlState->bindParam(':prix' . $id, $produit['prix']);
            $sqlState->bindParam(':qty' . $id, $produit['qty']);
            $sqlState->bindParam(':total' . $id, $produit['total']);
        }
        $inserted = $sqlState->execute();
        if ($inserted) {
            $_SESSION['panier'][$idUtilisateur] = [];
            header('location: panier.php?success=true&total=' . $total);
        } else {
            ?>
            <div class="alert alert-error" role="alert">
                Erreur (contactez l'administrateur).
            </div>
            <?php
        }
    }

    if (isset($_GET['success'])) {
        ?>
        <h1>Merci ! </h1>
        <div class="alert alert-success" role="alert">
            Votre commande avec le montant <strong>(<?php echo isset($_GET['total']) ? $_GET['total'] : 0 ?>)</strong> <i class="fa fa-solid fa-dollar"></i> est bien ajoutée.
        </div>
        <hr>
        <?php
    }

    if (!isset($_GET['success'])) {
        ?>
        <h4>Panier (<?php echo count($panier); ?>)</h4>
        <?php
    }
    ?>
    <div class="container">
        <div class="row">
            <?php
            if (empty($panier)) {
                if (!isset($_GET['success'])) {
                    ?>
                    <div class="alert alert-warning" role="alert">
                        Votre panier est vide ! Commencez vos achats <a class="btn btn-success btn-sm" href="./index.php">Acheter des produits</a>
                    </div>
                    <?php
                }
            } else {
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Libelle</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Total</th>
                    </tr>
                    </thead>
                    <?php
                    $total = 0;
                    foreach ($produits as $produit) {
                        $idProduit = $produit['id'];
                        $qty = isset($panier[$idProduit]) ? $panier[$idProduit] : 0;
                        $totalProduit = $produit['prix'] * $qty;
                        $total += $totalProduit;
                        ?>
                        <tr>
                            <td><?php echo $produit['id'] ?></td>
                            <td><img width="80px" src="../upload/produit/<?php echo $produit['image'] ?>" alt=""></td>
                            <td><?php echo $produit['libelle'] ?></td>
                            <td><?php include '../include/front/counter.php' ?></td>
                            <td> <?php echo $produit['prix'] ?> <i class="fa fa-solid fa-dollar"></i></td>
                            <td><?php echo $totalProduit ?> <i class="fa fa-solid fa-dollar"></i></td>
                        </tr>
                        <?php
                    }
                    ?>
                    <tfoot>
                    <tr>
                        <td colspan="7" align="right"><strong>Total</strong></td>
                        <td><?php echo $total ?> <i class="fa fa-solid fa-dollar"></i></td>
                    </tr>
                    <tr>
                        <td colspan="8" align="right">
                            <form method="post">
                                <input type="submit" class="btn btn-success" name="valider" value="Valider la commande">
                                <input onclick="return confirm('Voulez vous vraiment vider le panier ?')" type="submit" class="btn btn-danger" name="vider" value="Vider le panier">
                            </form>
                        </td>
                    </tr>
                    </tfoot>
                </table>
                <button id="generateReceipt" class="btn btn-primary">Télécharger la facture</button>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<!-- JavaScript for generating the PDF receipt -->
<script>
    document.getElementById("generateReceipt").addEventListener("click", function() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        
        const panierData = <?php echo json_encode($panier); ?>;
        const produitsData = <?php echo json_encode($produits); ?>;
        
        const totalAmount = "<?php echo $total; ?>";
        
        doc.text("Facture de commande", 15, 15);
        //doc.text(`ID Utilisateur: <?php echo $idUtilisateur; ?>`, 5, 5);
        //doc.text(`Montant Total: ${totalAmount} $`, 10, 40);
        let yPosition = 25;
        //doc.text("Panier:", 10, yPosition);
        // doc.text(`Email: ${userEmail}`, 10, 30);
        produitsData.forEach((produit, index) => {
            const qty = panierData[produit.id] || 0;
            if (qty > 0) {
                const productTotal = qty * produit.prix;
                doc.text(`
                - Commande:${produit.libelle}



                 
                - Quantité: ${qty} 





                - Prix Unitaire: ${produit.prix} 






                - Total: ${productTotal} $`, 5, yPosition + 5 * (index + 1));

                
            }
        });

        doc.save("receipt.pdf");
    });
</script>
</body>
</html>
