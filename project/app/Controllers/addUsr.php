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
  $user = $db->query($sql_insert_user, [
    "username" => $_POST['username'],
    "email" => $_POST['email'],
    "password" => password_hash($_POST['password'], PASSWORD_BCRYPT)
  ]);

  if (empty($user)) {
    $_SESSION['status'] = "Username or email already used!";
    header("Location: ../Views/login.php");
    exit();
  }  //* ### User successfully added to the `Usr` table  ###

  // Get the `ID` of the added user (SELECT action)
  $user_id = $db->query('SELECT LAST_INSERT_ID() AS id LIMIT 1')[0]['id'];

  // Get `Role_ID` from `Roles` table for user id (SELECT action)
  $role = ($_POST['checker'] === 'on') ? 'FARMER' : 'CLIENT';
  $sql_get_role_id = "SELECT Role_ID FROM Roles WHERE Role_Name = :role";
  $role_id = $db->query($sql_get_role_id, [
    'role' => $role
  ])[0]['Role_ID'];

  // Assign role to user in `Usr_Roles` table (INSERT action)
  $sql_assign_role = "INSERT INTO Usr_Roles (Usr_ID, Role_ID) VALUES (:user_id, :role_id)";
  $db->query($sql_assign_role, [
    'user_id' => $user_id,
    'role_id' => $role_id
  ]);

  // Assign profile to user in `Usr_Profile` table (INSERT action)
  $sql_assign_user_profile = "INSERT INTO Usr_Profile (Usr_ID) VALUES (:user_id)";
  $db->query($sql_assign_user_profile, [
    'user_id' => $user_id
  ]);

  // Registration successful - Set session variables
  $_SESSION['user_id'] = $user_id;
  $_SESSION['status'] = "Registration has been successful!";
  header("Location: ../Views/welcome.php");
  exit();
} catch (Exception $e) {
  // Handle any unexpected errors
  $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
  header("Location: ../Views/login.php");
  exit();
}
?>