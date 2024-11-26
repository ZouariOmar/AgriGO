<?php
//* NOTE: Del the user using the `ID` (GET Request)

try {
  //? Include declaration part
  include '../../../vendor/autoload.php';  // Load Composer autoload
  include "../../conf/database.php";

  $user_id = $_SESSION['id'] ?? 60;

  $db = new Database('../../');

  session_start(); // Start the session to manage status messages

  // Execute the update for the `Usr_Profile` table
  $stmt = $db->query("UPDATE Usr_Profile SET First_Name = :First_Name, Last_Name = :Last_Name, Tel = :Tel, Sex = :Sex, State = :State, Address = :Address, Zip_Code = :Zip_Code, About = :About WHERE Usr_ID = :id", [
    //"Image_ID" => 0,
    "First_Name" => $_POST['firstName'],
    "Last_Name" => $_POST['lastName'],
    "Tel" => $_POST['tel'],
    "Sex" => $_POST['sex'],
    "State" => $_POST['state'],
    "Address" => $_POST['address'],
    'Zip_Code' => $_POST['zipCode'],
    "About" => $_POST['about'],
    "id" => $user_id
  ]);

  // Execute the update for the `Usr` table
  $stmt = $db->query("UPDATE Usrs SET Email = :Email WHERE ID = :id", [
    "Email" => $_POST['email'],
    "id" => 60
  ]);

  //* ### User successfully deleted from `Usr` table (+ other tables)  ###
  $_SESSION['status'] = "Your Profile successfully Edit it!";
  header('Location: ../Views/pages-account-settings-account.php?id=' . $user_id);
  exit();


} catch (PDOException $e) {
  // Handle any unexpected errors
  $_SESSION['status'] = "An unexpected error occurred: " . $e->getMessage();
  echo "Error: " . $e->getMessage();
  header('Location: ../Views/pages-account-settings-account.php?id=' . $_SESSION['id']);
  exit();
}