<?php
//? Include declaration part
include_once '../../../vendor/autoload.php';  // Load Composer autoload

//? Using declaration part
use Dotenv\Dotenv;
use Dotenv\Exception\InvalidPathException;
use Dotenv\Exception\ValidationException;

try {  //? Hold the .env locale file
  $dotenv = Dotenv::createImmutable('../../');  // Navigate to the .env fil lvl
  $dotenv->load();
} catch (InvalidPathException $e) {  // Catches the specific error if .env file path is incorrect or file is missing
  echo "Error: .env file not found or incorrect path specified." . $e->getMessage();
} catch (ValidationException $e) {  // Catches validation errors (useful if you're validating required variables)
  echo "Validation Error: " . $e->getMessage();
} catch (Exception $e) {  // Catches any other general exceptions
  echo "An unexpected error occurred: " . $e->getMessage();
}

// Get the POST body and decode it
$data = json_decode(file_get_contents('php://input'), true);
$idToken = $data['idToken'] ?? null;

if (!$idToken) {
  echo json_encode(['success' => false, 'message' => 'No ID token received']);
  exit;
}

try {
  // Initialize Google Client
  $client = new Google_Client(['client_id' => $_ENV['CLIENT_ID']]); // Your client ID

  // Verify the ID token
  $payload = $client->verifyIdToken($idToken);

  if ($payload) {
    // If the token is valid, extract user information
    $email = $payload['email'];
    $name = $payload['name'] ?? 'Unknown'; // Optional fields
    $picture = $payload['picture'] ?? null;

    echo json_encode([
      'success' => true,
      'message' => 'Authenticated',
      'email' => $email,
      'name' => $name,
      'picture' => $picture
    ]);
  } else
    echo json_encode(['success' => false, 'message' => 'Invalid ID token']);
} catch (Exception $e) {
  // Handle exceptions
  echo json_encode(['success' => false, 'message' => 'Error verifying token: ' . $e->getMessage()]);
}