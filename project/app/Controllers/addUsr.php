<?php
//* NOTE: We Hash the password securely using password_hash (Bcrypt) @ZouariOmar

//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload (for .env)
include "../../conf/database.php";

//* Connect to the DB
$db = new Database('../../');

session_start(); // Start the session to manage status messages

try {
  // Prepare the sql commands
  $sql_insert_user = "
        INSERT INTO Usrs (Username, Email, Password_hash)
        SELECT :username, :email, :password
        WHERE NOT EXISTS (
            SELECT 1 FROM Usrs WHERE Username = :username OR Email = :email
        )
    ";

  // Lance the query
  $user = $db->query($sql_insert_user, ["username" => $_POST['username'], "email" => $_POST['email'], "password" => password_hash($_POST['password'], PASSWORD_BCRYPT)]);

  if (empty($user)) {
    $_SESSION['status'] = "Username or email already used!";
    header("Location: ../Views/login.php");
    exit();
  }

  // Login successful - Set session variables
  $_SESSION['user_id'] = $user['ID'];
  $_SESSION['status'] = "Login successful!";
  header("Location: ../Views/login.php");
  exit();
} catch (Exception $e) {
  // Handle any unexpected errors
  $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
  header("Location: ../Views/login.php");
  exit();
}
?>