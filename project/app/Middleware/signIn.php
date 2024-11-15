<?php
//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload (for .env)
include "../../conf/database.php";

//* Connect to the DB
$db = new Database('../../');

// Prepare the sql command (Verify the identifier with his password)
$sql = 'SELECT * FROM Usrs WHERE (Email = :identifier OR Username = :identifier) AND Password_hash = :password';  //! Find the identifier(can be email or username) with his password

// Hash the password using SHA256 algorithm
$password_hash = hash('sha256', $_POST['password']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Redirect on Load</title>
  <script>
    window.onload = function () {  // Execute the query
      <?php if ($db->query($sql, ["identifier" => $_POST['identifier'], "password" => $password_hash])): ?>
        window.location.href = "http://localhost/AgriGO/project/public/html/#"; // URL to redirect to the Home/Dashboard Page
      <?php else: ?>
        window.location.href = "http://localhost/AgriGO/project/public/html/login.html"; // URL to redirect to the Login page (+ "Invalid identifier or password!" msg)
      <?php endif; ?>
    };
  </script>
</head>

<body>
  <p>
    If you are not redirected automatically,
    <a href="http://localhost/AgriGO/project/public/html/login.html">click here</a>.
  </p>
</body>

</html>