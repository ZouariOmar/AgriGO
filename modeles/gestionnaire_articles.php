<?php
require_once("modeles/Database.php");

class GestionnaireArticles {
    // Fetches a list of articles
    public static function getArticles(){
        // Connection to the database using the static connect() method from Database class
        $connexion = Database::connect();

        // SQL query to extract information on articles
        $requeteSQL = "SELECT identifiant, nom, imageArticle, prix FROM Article ORDER BY nom";
        $curseur = $connexion->query($requeteSQL);

        // Format the fetched data and return the result
        $data = [];
        while($ligne = $curseur->fetch()) {
            $dataLigne["identifiant"] = $ligne["identifiant"];
            $dataLigne["nom"] = $ligne["nom"];
            $dataLigne["imageArticle"] = $ligne["imageArticle"];
            $dataLigne["prix"] = $ligne["prix"];
            $data[] = $dataLigne;
        }

        // Close cursor and disconnect from database
        $curseur->closeCursor();
        Database::disconnect();

        // Return the result
        return $data;
    }

    // Fetch details of a specific article
    public static function getDetailsArticle($identifiant){
        $connexion = Database::connect();
        $requeteSQL = "SELECT * FROM Article WHERE identifiant = ?";
        $requetePreparee = $connexion->prepare($requeteSQL);
        $requetePreparee->execute(array($identifiant));
        Database::disconnect();
        return $requetePreparee->fetchAll();
    }

    // Update the quantity of a specific article
    public static function updateQuantiteArticle($identifiant, $quantite){
        $connexion = Database::connect();
        $sql = "UPDATE Article SET quantiteDisponible = quantiteDisponible - ? WHERE identifiant = ?";
        $requetePreparee = $connexion->prepare($sql);
        $requetePreparee->execute(array($quantite, $identifiant));
        Database::disconnect();
    }

    // Search for a specific article by its identifier
    public static function rechercherArticle($identifiant){
        $article = self::getDetailsArticle($identifiant);
        return $article;
    }
}
?>
