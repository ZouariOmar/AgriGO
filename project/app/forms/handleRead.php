<?php
include '../../Controllers/Categorie_Controller.php';

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
        echo "</tr></thead><tbody>";
    
        foreach ($categories as $category) {
            echo "<tr>";
            foreach ($category as $value) {
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