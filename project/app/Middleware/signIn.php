<?php
//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload (for .env)
include "../../conf/database.php";

//* Connect to the DB
$db = new Database('../../');

session_start(); // Start the session to manage status messages

try {
  // Fetch user by identifier (username or email)
  $sql = 'SELECT * FROM Usrs WHERE Email = :identifier OR Username = :identifier';
  $login_user = $db->query($sql, ["identifier" => $_POST['identifier']]);

  // Check if user exists
  if (empty($login_user)) {
    $_SESSION['status'] = "User not found!";
    header("Location: ../Views/login.php");
    exit();
  }

  // Verify the password
  $user = $login_user[0]; // Retrieve the first (and only) result
  if (!password_verify($_POST['password'], $user['Password_hash'])) {
    $_SESSION['status'] = "Invalid password!";
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
