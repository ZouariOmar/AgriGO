<?php
include '../../../vendor/autoload.php';  // Load Composer's auto-loader
//? Include declaration part
include_once '../../conf/database.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Methods: POST');

// Set response headers for JSON
header("Content-Type: application/json");

//* Connect to the DB
$db = new Database('../../');

// Get the raw POST data
$data = file_get_contents("php://input");
$request = json_decode($data, true); // Decode the JSON data

$descriptor = $request['descriptor'] ?? null; // Get the descriptor array
$id = $request['id'] ?? null;                 // Get the user id
//* Exec the query
$stmt = $db->query("INSERT INTO Face_Descriptors (Usr_ID, Face_Desc) VALUES (:user_id, :face_descriptor)", [
  'user_id' => $id,
  'face_descriptor' => $descriptor
]);

// Execute the query and check if it was successful
if ($stmt)
  echo json_encode(["status" => "success", "message" => "Descriptor saved successfully"]);
else
  echo json_encode(["status" => "error", "message" => "Failed to save descriptor"]);

// Respond with a success message
echo json_encode(["status" => "success", "message" => "Descriptors saved successfully"]);
