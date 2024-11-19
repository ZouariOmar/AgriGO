<?php

include "../Controllers/reportController.php";
$reportC = new reportController();
$list = $reportC->reportList();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report List</title>
    <link rel="stylesheet" href="../../public/css/liststyle.css"> <!-- Link to the updated CSS file -->
</head>

<body>
    <!-- Title section -->
    <h1>Your Reports</h1>
    
    <!-- Add Report link -->
    <a href="addReport.php">Add Report</a>
    
    <!-- Table to display reports -->
    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th>Subject</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($list as $report) {
                // Ensure the image path is correct
                $imagePath = htmlspecialchars($report['image']);
                ?>
                <tr>
                    <td><?= htmlspecialchars($report['category']); ?></td>
                    <td><?= htmlspecialchars($report['subject']); ?></td>
                    <td><?= htmlspecialchars($report['description']); ?></td>
                    <td> 
                       <?php echo $imagePath; ?>
                    </td>
                    <td>
                        <form method="POST" action="updateReport.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value="<?= htmlspecialchars($report['Report_ID']); ?>" name="id">
                        </form>
                        <a href="deleteReport.php?id=<?= htmlspecialchars($report['Report_ID']); ?>" class="delete-link">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>