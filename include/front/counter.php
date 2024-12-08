<div>
    <?php
    // Ensure variables are set properly
    $idUtilisateur = isset($_SESSION['utilisateur']['id']) ? $_SESSION['utilisateur']['id'] : 0;
    $qty = isset($_SESSION['panier'][$idUtilisateur][$idProduit]) ? $_SESSION['panier'][$idUtilisateur][$idProduit] : 0;

    if ($qty == 0) {
        $color = 'btn-primary';
        $button = '<i class="fa fa-light fa-cart-plus"></i>';
    } else {
        $button = '<i class="fa-solid fa-pencil"></i>';
    }
    ?>
    <?php if ($idUtilisateur !== 0): ?>
        <form method="post" class="counter d-flex" action="ajouter_panier.php">
            <!-- Minus button -->
            <button onclick="return false;" class="btn btn-primary mx-2 counter-moins">-</button>
            
            <!-- Hidden product ID -->
            <input type="Hidden" name="id" value="<?php echo $idProduit; ?>">
            
            <!-- Quantity input -->
            <input class="form-control" value="<?php echo $qty; ?>" type="number" name="qty" id="qty" max="99">
            
            <!-- Plus button -->
            <button onclick="return false;" class="btn btn-primary mx-2 counter-plus mx-1">+</button>

            <!-- Add/Edit button -->
            <button class="btn btn-success btn-sm" type="submit" name="ajouter">
                <?= $button; ?>
            </button>
            
            <!-- Delete button -->
            <?php if ($qty != 0): ?>
                <button formaction="supprimer_panier.php" class="btn btn-sm btn-danger mx-1" type="submit" name="supprimer">
                    <i class="fa-solid fa-trash"></i>
                </button>
            <?php endif; ?>
        </form>
    <?php else: ?>
        <!-- Warning for unauthenticated users -->
        <div class="alert alert-warning" role="alert">
            Vous devez être connecté pour acheter ce produit <strong><a href="../connexion.php">Connexion</a></strong>
        </div>
    <?php endif; ?>
</div>
