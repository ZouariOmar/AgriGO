<?php
include '../../../Controllers/Offre_Controller.php';

try {
    $offrecontroller = new OffreController();
    $offres = $offrecontroller->readAllOffres();
    
    if ($offres) {
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
            echo "</tr>";
        }
        echo "</tbody></table></div>";
    } else {
        echo "<p class='error-message'>Error retrieving data or no categories found.</p>";
    }
} catch (Exception $e) {
    die('<p class="error-message">ACAB  ' . $e->getMessage() . '</p>');
}
?>