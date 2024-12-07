<?php
session_start();
?>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">AgriGo</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        $currentPage = $_SERVER['PHP_SELF'];
        ?>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == '/AgriGo/index.php') echo 'active' ?>"
                       aria-current="page" href="../index.php"><i class="fa-solid fa-home"></i> Accueil</a>
                </li>
               
                <?php
                
                    //?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/AgriGo/categories.php') echo 'active' ?>"
                           aria-current="page" href=" ../AgriGo/views/categories.php"><i
                                    class="fa-brands fa-dropbox"></i> Liste des catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/AgriGo/produits.php') echo 'active' ?>"
                           aria-current="page" href="../views/produits.php"><i class="fa-solid fa-tag"></i>
                            Liste des produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/AgriGo/commandes.php') echo 'active' ?>"
                           aria-current="page" href="../views/commandes.php"><i
                                    class="fa-solid fa-barcode"></i> Commandes</a>
                    </li>
                    

                    <?php
              
                    ?>
                    
                    <?php
                
                ?>
            </ul>
        </div>
        <a class="btn float-end" href="../views front/"><i class="fa-solid fa-cart-shopping"></i> Site front</a>
    </div>
</nav>