<?php

include "../Controllers/adminreportController.php";
$adminreportC = new adminreportController();
$adminlist = $adminreportC->reportList();
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
    <h1>Reports Dashboard</h1>
    
    <!-- Table to display reports -->
    <table>
        <thead>
            <tr>
                <th>Report ID</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($adminlist as $report) {
                ?>
                <tr>
                    <td><?= htmlspecialchars($report['StatRapportID']); ?></td>
                    <td><?= htmlspecialchars($report['Status']); ?></td>
                    <td>
                        <form method="POST" action="adminupdateReport.php">
                            <input type="submit" name="update" value="Update">
                            <input type="hidden" value="<?= htmlspecialchars($report['Stat_ID']); ?>" name="id">
                        </form>
                        <a href="admindeleteReport.php?id=<?= htmlspecialchars($report['Stat_ID']); ?>" class="delete-link">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>