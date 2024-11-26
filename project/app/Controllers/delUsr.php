<?php
//* NOTE: Del the user using the `ID` (GET Request)

try {
  //? Include declaration part
  include '../../../vendor/autoload.php';  // Load Composer autoload
  include "../../conf/database.php";

  $user_id = $_GET['id'];
  
  session_start(); // Start the session to manage status messages

  //* Connect to the DB
  $db = new Database('../../');

  // Execute the statement
  $stmt = $db->query("DELETE FROM Usrs WHERE ID = :id", [
    "id" => $_GET['id']
  ]);

  //* ### User successfully deleted from `Usr` table (+ other tables)  ###
  $_SESSION['status'] = "User has been successfully deleted!";
  header('Location: ../Views/dashboard.php?id=' . $_GET['admin_id']);
  exit();
} catch (PDOException $e) {
  // Handle any unexpected errors
  $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
  echo "Error: " . $e->getMessage();
  header('Location: ../Views/dashboard.php?id=' . $_GET['admin_id']);
  exit();
}