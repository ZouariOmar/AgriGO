<?php
include '../../../Controllers/Categorie_Controller.php';

try {
    $categorieController = new CategorieController();
    $categories = $categorieController->readAllCategories();
    
    if ($categories) {
        echo "<div class='table-container'>";
        echo "<table class='styled-table'>";
        echo "<thead><tr>";
    

        foreach (array_keys($categories[0]) as $header) {
            echo "<th>" . htmlspecialchars($header) . "</th>";
        }
        echo "<th>Actions</th>"; 
        echo "</tr></thead><tbody>";
    
        foreach ($categories as $category) {
            echo "<tr>";
            foreach ($category as $value) {
                echo "<td>" . htmlspecialchars($value) . "</td>";
            }

            //Sup and UPD buttons
            echo "<td>";
            echo "<form method='post' action='../../../forms/handlerDelete.php' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='" . $category['id'] . "'>";
            echo "<button type='submit' class='action-btn delete-btn'>Supprimer</button>";
            echo "</form>";
            echo "<form method='post' action='MCedit.php' style='display:inline;'>";
            echo "<input type='hidden' name='id' value='" . htmlspecialchars($category['id']) . "'>";
            echo "<input type='hidden' name='type' value='" . htmlspecialchars($category['type']) . "'>";
            echo "<button type='submit' class='action-btn edit-btn'>Mettre à jour</button>";
            echo "</form>";
            echo "</td>";
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

