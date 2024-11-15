<?php
//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload (for .env)
include "../../conf/database.php";

//* Connect to the DB
$db = new Database('../../');

// Prepare the sql command
$sql = "
        INSERT INTO Usrs (Username, Email, Password_hash)
        SELECT :username, :email, :password
        WHERE NOT EXISTS (
            SELECT 1 FROM Usrs WHERE Username = :username OR Email = :email
        )
    ";

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
    window.onload = function () {
      <?php if ($db->query($sql, ["username" => $_POST['username'], "email" => $_POST['email'], "password" => $password_hash])): ?>
        window.location.href = "http://localhost/AgriGO/project/public/html/welcome.html"; // URL to redirect to the Welcome Page
      <?php else: ?>
        window.location.href = "http://localhost/AgriGO/project/public/html/login.html"; // URL to redirect to the login page (+ "Error: Username or Email already exists!" msg)
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