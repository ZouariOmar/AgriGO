<?php
$titre="Catalogue";
?>
<?php ob_start();?>
    <div class="container site">
        <h1 class="text-logo text-center mb-4"><span class="glyphicon glyphicon-grain"></span>Products List<span class="glyphicon glyphicon-grain"></span></h1>    
        
        <div id="panier" class="fond-dark text-light p-3 rounded shadow mb-4">
            <p class="mb-0">Votre panier d'achat
                <a href="../AgriGo/index.php?action=5" class="btn btn-primary btn-lg">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    <?= empty($totalArticles) ? "0 " : $totalArticles . " " ?>article(s)
                </a>
            </p> 
        </div>
        
        <div class="container-fluid mb-5">
            <ul class="nav navbar-nav justify-content-center">
                <li class="nav-item active"><a class="nav-link" href="#">Nos produits</a></li>
            
            </ul>
        </div>

        <div class="row">
            <?php
            foreach($articles as $article){
                $identifiant = $article["identifiant"];
                $image = "images/".$article["imageArticle"];
                $nom = $article["nom"]; 
                $prix = $article["prix"];
            ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="thumbnail fond-dark shadow-sm rounded">   
                    <img src="<?=$image?>" alt="<?=$nom?>" class="img-fluid rounded-top">
                    <div class="prix text-center mt-2"><?=number_format($prix, 2)?> DT</div>
                    <div class="caption p-3">
                        <h4 class="nom text-dark"><?=$nom?></h4>
                        <a href="index.php?action=1&id=<?=$identifiant?>" role="button" class="btn btn-info w-100">voir plus de détails</a>
                    </div>
                </div>
            </div> 
            <?php
            }
            ?>
        </div>
    </div>
<?php $contenu = ob_get_clean();?>
<?php require("gabarits/template.php");?>
<script>
    //document.addEventListener('mousemove', animerArbre);
    function animerArbre(e){
        arbre.style.display = "inline";
        arbre.style.left =  e.clientX + "px";
        arbre.style.bottom =  e.clientY + "px";
    }

    function desactiverAnimationArbre(){
        arbre.style.display = "none"; 
        document.removeEventListener('mousemove', animerArbre);        
    }
    var arbre = document.getElementById("arbre");
</script>

<!-- Additional CSS (for styling) -->
<style>
    /* General Styles */
    body {
        font-family: 'Roboto', sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    .text-logo {
        font-size: 3em;
        color: #006400;
        font-weight: 700;
    }

    .fond-dark {
        background-color: #333;
    }

    .text-light {
        color: #fff;
    }

    .btn-info {
        background-color: #17a2b8;
        border-color: #17a2b8;
    }

    .btn-info:hover {
        background-color: #138496;
        border-color: #117a8b;
    }

    .thumbnail {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .thumbnail:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }

    .prix {
        font-size: 1.2em;
        font-weight: 500;
        color: #28a745;
    }

    .caption {
        padding: 15px;
    }

    .btn {
        font-size: 1em;
    }

    .container-fluid {
        max-width: 100%;
    }

    .nav-link {
        font-size: 1.2em;
        color: #007bff;
    }

    .nav-link:hover {
        color: #0056b3;
    }

    .mb-4 {
        margin-bottom: 30px;
    }

    .rounded {
        border-radius: 10px;
    }

    .rounded-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .shadow-sm {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
