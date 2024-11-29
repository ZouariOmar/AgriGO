<?php $titre = "Panier d'achat"; ?>
<?php ob_start(); ?>
<div class="container site">
    <h1 class="text-logo"><span class="glyphicon glyphicon-grain"></span> Cart Page <span class="glyphicon glyphicon-grain"></span></h1>  
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php">Nos produits</a></li>
        </ul>
    </div>
    <div class="row">
        <div id="contenu">
            <div class="caption">
                <?php if (empty($data)) { ?>
                    <h4 class='nom' id="vide">Votre panier d'achat est vide</h4>
                <?php } else { ?>
                    <h4 class="nom">Votre panier d'achat</h4>
                    <table class="table table-striped table-bordered fond-dark" id="panier">
                        <thead class="thead-light">
                            <tr>
                                <th>Article</th>
                                <th>Prix unitaire</th>
                                <th>Quantité</th>
                                <th>Total article</th>
                                <th>Suppression</th>
                                <th>Procéder au paiement</th> <!-- New column for the payment button -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $total = 0;
                                // Check if $data is an array and contains items
                                if (is_array($data)) {
                                    foreach ($data as $lignePanier) {
                                        // Ensure $lignePanier contains the expected keys
                                        $identifiant = isset($lignePanier["idArticle"]) ? $lignePanier["idArticle"] : null;
                                        $nom = isset($lignePanier["nom"]) ? $lignePanier["nom"] : 'Article Non Disponible';
                                        $image = isset($lignePanier["image"]) ? "images/" . $lignePanier["image"] : "images/default.jpg";
                                        $quantite = isset($lignePanier["quantite"]) ? $lignePanier["quantite"] : 1;
                                        $quantiteDisponible = isset($lignePanier["quantiteDisponible"]) ? $lignePanier["quantiteDisponible"] : 0;
                                        $prix = isset($lignePanier["prix"]) ? $lignePanier["prix"] : 0;

                                        $total += $quantite * $prix;
                            ?>
                            <tr>
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <img class="img-thumbnail" src="<?= $image ?>" alt="<?= $nom ?>" width="80">
                                        </div>
                                        <div class="card-footer">
                                            <p class="card-text"><?= $nom ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td><?= number_format($prix, 2) . "DT" ?></td>
                                <td>
                                    <form method="get" action="index.php" onsubmit="return validateQuantity(this);">       
                                        <input type="hidden" name="action" value="4">
                                        <input type="hidden" name="id" value="<?= $identifiant ?>">
                                        <div class="form-group">
                                            <input type="text" 
                                                value="<?= $quantite ?>" 
                                                class="form-control" 
                                                name="quantite" 
                                                style="text-align:center">
                                            <span class="error-message" style="color: red; display: none;"></span>    
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                <span class="glyphicon glyphicon-edit"></span> Modifier la quantité
                                            </button>
                                        </div>
                                    </form>
                                </td>
                                <td><?= number_format($prix * $quantite, 2) . "DT" ?></td>
                                <td>
                                    <a href="index.php?action=3&id=<?= $identifiant ?>&quantite=<?= $quantite ?>" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-remove-sign"></span> Supprimer l'article
                                    </a>
                                </td>
                                <!-- Proceed to payment button for each item -->
                                <td>
                                    <a href="vues/checkout.php?nom=<?php echo urlencode($lignePanier["nom"]) . '&id=' . urlencode($lignePanier["idArticle"]); ?>" class="btn btn-success btn-lg btn-block" style="margin-top: 20px;">
                                        <span class="glyphicon glyphicon-check"></span> Procéder au paiement
                                    </a>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="total card-text">Total avant taxes: <?= number_format($total, 2) ?>DT</h4>
                        <h4 class="taxe card-text">TPS = 18%</h4>
                        <h4 class="taxe card-text">TVQ = 9,975%</h4>
                        <?php
                            $total = $total * (1 + 0.18 + 0.09975);
                        ?>
                        <h4 class="total card-text" id="total" montant="<?= $total ?>">Total à payer : <?= number_format($total, 2) ?>DT</h4>
                    </div>
                </div>
                <?php } ?>
                <div>
                    <img id="felicitations" src="/images/animations/felicitations.gif">
                </div>
                <div>
                    <a href="../AgriGo/index.php">Retour à la page d'accueil</a>
                </div>
            </div>
        </div>
    </div>
<script>
function validateQuantity(form) {
    const quantityInput = form.querySelector('input[name="quantite"]');
    const errorMessage = form.querySelector('.error-message');
    const quantity = quantityInput.value.trim();

    // Reset error message
    errorMessage.style.display = 'none';
    errorMessage.textContent = '';

    // Check if the field is empty
    if (!quantity) {
        errorMessage.textContent = "Le champ quantité est vide. Veuillez entrer une quantité.";
        errorMessage.style.display = 'block';
        quantityInput.focus();
        return false;
    }

    // Check if the value is a valid positive number
    if (isNaN(quantity) || Number(quantity) <= 0) {
        errorMessage.textContent = "La quantité doit être un nombre positif.";
        errorMessage.style.display = 'block';
        quantityInput.focus();
        return false;
    }

    return true;
}
</script>
<?php $contenu = ob_get_clean(); ?>
<?php require("gabarits/template.php"); ?>
