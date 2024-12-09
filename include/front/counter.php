<div>
    <?php
    // Ensure the user's ID and product quantity are properly set
    $idUtilisateur = isset($_SESSION['utilisateur']['id']) ? $_SESSION['utilisateur']['id'] : 0;
    $qty = isset($_SESSION['panier'][$idUtilisateur][$idProduit]) ? $_SESSION['panier'][$idUtilisateur][$idProduit] : 0;

    // Determine button appearance and action
    if ($qty == 0) {
        $buttonClass = 'btn-primary';
        $buttonIcon = '<i class="fa fa-light fa-cart-plus"></i>';
    } else {
        $buttonClass = 'btn-success';
        $buttonIcon = '<i class="fa-solid fa-pencil"></i>';
    }
    ?>
    
    <?php if ($idUtilisateur !== 0): ?>
        <form method="post" class="counter d-flex align-items-center" action="ajouter_panier.php">
            <!-- Minus button -->
            <button onclick="return false;" class="btn btn-primary mx-2 counter-moins">-</button>
            
            <!-- Hidden input for product ID -->
            <input type="hidden" name="id" value="<?php echo $idProduit; ?>">
            
            <!-- Quantity input field -->
            <div class="position-relative">
                <input 
                    class="form-control text-center" 
                    value="<?php echo $qty; ?>" 
                    type="number" 
                    name="qty" 
                    id="qty-<?php echo $idProduit; ?>" 
                >
                <!-- Error message -->
                <div id="error-<?php echo $idProduit; ?>" class="text-danger small" style="display: none;">
                    La quantité est invalide. Veuillez saisir un nombre supérieur à 0.
                </div>
            </div>
            
            <!-- Plus button -->
            <button onclick="return false;" class="btn btn-primary mx-2 counter-plus">+</button>
            
            <!-- Add/Edit button -->
            <button class="btn <?= $buttonClass; ?> btn-sm mx-2" type="submit" name="ajouter">
                <?= $buttonIcon; ?>
            </button>
            
            <!-- Delete button (only if quantity > 0) -->
            <?php if ($qty != 0): ?>
                <button 
                    formaction="supprimer_panier.php" 
                    class="btn btn-sm btn-danger mx-1" 
                    type="submit" 
                    name="supprimer"
                >
                    <i class="fa-solid fa-trash"></i>
                </button>
            <?php endif; ?>
        </form>
    <?php else: ?>
        <!-- Warning for unauthenticated users -->
        <div class="alert alert-warning mt-2" role="alert">
            Vous devez être connecté pour acheter ce produit. <strong><a href="../connexion.php">Connexion</a></strong>
        </div>
    <?php endif; ?>
</div>

<script>
    // JavaScript to validate quantity
    document.addEventListener("DOMContentLoaded", function () {
        const qtyField = document.getElementById("qty-<?php echo $idProduit; ?>");
        const errorField = document.getElementById("error-<?php echo $idProduit; ?>");

        // Add event listener to the quantity field
        qtyField.addEventListener("input", function () {
            const quantity = parseInt(qtyField.value, 10);

            if (isNaN(quantity) || quantity <= 0) {
                errorField.style.display = "block"; // Show the error message
            } else {
                errorField.style.display = "none"; // Hide the error message
            }
        });
    });
</script>
