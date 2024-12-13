<?php
include '../../../Controllers/Offre_Controller.php';

try {
    $offrecontroller = new OffreController();


    // Pagination logic
    $offresPerPage = 5;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $offresPerPage;

    // Get total number of offers
    $totalOffres = $offrecontroller->getTotalOffres();
    $totalPages = ceil($totalOffres / $offresPerPage);

    // Get offers for current page
    $offres = $offrecontroller->readOffresWithPagination($offresPerPage, $offset);
    
    if ($offres && count($offres) > 0) {
        echo "<div class='table-container'>";
        echo "<table class='styled-table'>";
        echo "<thead><tr>";
    
        foreach (array_keys($offres[0]) as $header) {
            echo "<th>" . htmlspecialchars($header) . "</th>";
        }
        echo "<th>Actions</th>";
        echo "</tr></thead><tbody>";
    
        foreach ($offres as $offre) {
            echo "<tr>";
            foreach ($offre as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }

            //SUP AND UPD buttons
            echo "<td>";
            echo "<form method='post' action='../../../forms/HDO.php' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='" . $offre['id'] . "'>";
            echo "<button type='submit' class='action-btn delete-btn'>Supprimer</button>";
            echo "</form>";
            echo "<form method='post' action='MOedit.php' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='" . htmlspecialchars($offre['id']) . "'>";
            echo "<input type='hidden' name='titre' value='" . htmlspecialchars($offre['titre']) . "'>";
            echo "<input type='hidden' name='prix' value='" . htmlspecialchars($offre['prix']) . "'>";
            echo "<input type='hidden' name='telephone' value='" . htmlspecialchars($offre['telephone']) . "'>";
            echo "<input type='hidden' name='localisation' value='" . htmlspecialchars($offre['localisation']) . "'>";
            echo "<input type='hidden' name='email' value='" . htmlspecialchars($offre['email']) . "'>";
            echo "<input type='hidden' name='image' value='" . htmlspecialchars($offre['image']) . "'>";
            echo "<input type='hidden' name='detail' value='" . htmlspecialchars($offre['detail']) . "'>";
            echo "<input type='hidden' name='date_creation' value='" . htmlspecialchars($offre['date_creation']) . "'>";
            echo "<input type='hidden' name='categorie_id' value='" . htmlspecialchars($offre['categorie_id']) . "'>";
            echo "<button type='submit' class='action-btn edit-btn'>Mettre à jour</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody></table></div>";


        echo "<div class='pagination' style='text-align: center; margin-top: 20px;'>";
        if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . "' style='display: inline-block; padding: 8px 16px; margin: 0 4px; background-color: #e8f5e9; color: #2e7d32; text-decoration: none; border-radius: 4px; transition: background-color 0.3s;' onmouseover='this.style.backgroundColor=\"#c8e6c9\"' onmouseout='this.style.backgroundColor=\"#e8f5e9\"'>Précédent</a> ";
        }
        
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $page) {
                echo "<span style='display: inline-block; padding: 8px 16px; margin: 0 4px; background-color: #4caf50; color: white; border-radius: 4px;'>$i</span> ";
            } else {
                echo "<a href='?page=$i' style='display: inline-block; padding: 8px 16px; margin: 0 4px; background-color: #e8f5e9; color: #2e7d32; text-decoration: none; border-radius: 4px; transition: background-color 0.3s;' onmouseover='this.style.backgroundColor=\"#c8e6c9\"' onmouseout='this.style.backgroundColor=\"#e8f5e9\"'>$i</a> ";
            }
        }
        
        if ($page < $totalPages) {
            echo "<a href='?page=" . ($page + 1) . "' style='display: inline-block; padding: 8px 16px; margin: 0 4px; background-color: #e8f5e9; color: #2e7d32; text-decoration: none; border-radius: 4px; transition: background-color 0.3s;' onmouseover='this.style.backgroundColor=\"#c8e6c9\"' onmouseout='this.style.backgroundColor=\"#e8f5e9\"'>Suivant</a>";
        }
        echo "</div><br>";
    } else {
        echo "<p class='error-message'>Aucune offre trouvée.</p>";
    }
} catch (Exception $e) {
    die('<p class="error-message">Erreur: ' . $e->getMessage() . '</p>');
}
?>

