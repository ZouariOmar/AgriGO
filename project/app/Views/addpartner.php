<?php
include "../Models/Partner.php";
include "../Controllers/PartnerController.php";

$admin_id = $_GET['admin_id'];
$partnerC = new partnerController();

if (isset($_POST['name'], $_POST['email'], $_POST['number'], $_POST['status'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $status = $_POST['status'];

    $partner = new partner(null, $name, $email, $number, $status);
    $partnerC->addPartner($partner);

    // Start Session
    session_start();
    $_SESSION['status'] = 'The partner has been successfully added!';

    // Redirect to dashboard page
    header('Location: dashboard.php?id=' . $admin_id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/stylepartner-1.css">
    <title>Add Partner</title>
</head>

<body>
    <h1>Add New Partner</h1>
    <form method="POST" action="">
        <label for="name">Name</label>
        <input type="text" name="name" required><br>

        <label for="email">Email</label>
        <input type="email" name="email" required><br>

        <label for="number">Number</label>
        <input type="text" name="number" required><br>

        <label for="status">Status</label>
        <select name="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br>

        <button type="submit">Add Partner</button>
    </form>
</body>

</html>
