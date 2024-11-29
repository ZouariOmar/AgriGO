<?php $titre = "Checkout Page"; ?>
<?php ob_start(); ?>
<div class="container site">
    <h1 class="text-logo"><span class="glyphicon glyphicon-grain"></span> Checkout <span class="glyphicon glyphicon-grain"></span></h1>  
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">MORTADHA</a></li>
        </ul>
    </div>
    <div class="row">
        <div id="contenu">
            <div class="caption">
                <h4 class="nom">Résumé de votre commande</h4>
                <form method="post" action="checkout_process.php" id="checkoutForm">
                    <div class="form-group">
                        <label for="shippingAddress">Adresse de livraison</label>
                        <textarea class="form-control" name="shippingAddress" id="shippingAddress" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="paymentMethod">Méthode de paiement</label>
                        <select class="form-control" name="paymentMethod" id="paymentMethod" required>
                            <option value="creditCard">Carte de crédit</option>
                            <option value="paypal">PayPal</option>
                            <option value="bankTransfer">Virement bancaire</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg btn-block" style="margin-top: 20px;">
                        <span class="glyphicon glyphicon-check"></span> Confirmer la commande
                    </button>
                </form>

                <!-- Redirect back to index.php link -->
                <div style="margin-top: 20px;">
                    <a href="index.php" class="btn btn-secondary btn-lg btn-block">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $contenu = ob_get_clean(); ?>
<?php require("gabarits/template.php"); ?>
