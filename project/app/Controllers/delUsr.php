<?php
//* NOTE: Del the user using the `ID` (GET Request)

try {
  //? Include declaration part
  include '../../../vendor/autoload.php';  // Load Composer autoload (for .env)
  include "../../conf/database.php";

  session_start(); // Start the session to manage status messages

  //* Connect to the DB
  $db = new Database('../../');

  // SQL query to delete the user
  $sql = "DELETE FROM Usrs WHERE ID = :id";

  // Execute the statement
  $stmt = $db->query($sql, [
    "id" => $_GET['id']
  ]);

  //* ### User successfully deleted from `Usr` table (+ other tables)  ###
  $_SESSION['status'] = "User has been successfully deleted!";
  header('Location: ../Views/dashboard.php');
  exit();
} catch (PDOException $e) {
  // Handle any unexpected errors
  $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
  echo "Error: " . $e->getMessage();
  header('Location: ../Views/dashboard.php  ');
  exit();
}