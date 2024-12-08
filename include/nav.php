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
                    <a class="nav-link <?php if ($currentPage == '/mon projet/index.php') echo 'active' ?>"
                       aria-current="page" href="../index.php"><i class="fa-solid fa-home"></i> Accueil</a>
                </li>
               
                <?php
                
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/mon projet/categories.php') echo 'active' ?>"
                           aria-current="page" href=" /mon projet/views/categories.php"><i
                                    class="fa-brands fa-dropbox"></i> Liste des catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/mon projet/produits.php') echo 'active' ?>"
                           aria-current="page" href="/views/produits.php"><i class="fa-solid fa-tag"></i>
                            Liste des produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/mon projet/commandes.php') echo 'active' ?>"
                           aria-current="page" href="../views/commandes.php"><i
                                    class="fa-solid fa-barcode"></i> Commandes</a>
                    </li>
                    

                    <?php
               
                ?>
            </ul>
        </div>
        <a class="btn float-end" href="../front/"><i class="fa-solid fa-cart-shopping"></i> Site front</a>
    </div>
</nav>