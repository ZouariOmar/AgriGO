<?php
include '../../Controllers/Offre_Controller.php';

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
        echo "</tr></thead><tbody>";
    
        foreach ($offres as $offre) {
            echo "<tr>";
            foreach ($offre as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }
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