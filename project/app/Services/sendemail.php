<?php
//? Include declaration part
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//? Using declaration part
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Define Host Info || Who is sending emails?
define("HOST_NAME", "Google");
define("HOST_EMAIL", "smpt.gmail.com");

// Define SMTP Credentials || Gmail Information
define("SMTP_EMAIL", "zouariomar20@gmail.com");
define("SMTP_PASSWORD", "password!!!!!!"); // read documentations

// Define Recipient Info || Who will get this email?
define("RECIPIENT_NAME", "Zouari Omar");
define("RECIPIENT_EMAIL", "zouariomar20@gmail.com");

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
	//Server settings
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;            // Enable verbose debug output
	$mail->isSMTP();                                  // Send using SMTP
	$mail->Host = "smtp.gmail.com";                   // Set the SMTP server (Gmail's SMTP server ) to send through
	$mail->SMTPAuth = true;                           // Enable SMTP authentication
	$mail->Username = "zouariomar20@gmail.com";                     // SMTP username
	$mail->Password = "password!!!!!!";                  // SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Enable implicit TLS encryption
	$mail->Port = 465;                                // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

	//Content
	$name = isset($_GET['name']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_GET['name']) : "";
	$senderEmail = isset($_GET['email']) ? (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) ? $_GET['email'] : "") : "";
	$phone = isset($_GET['phone']) ? preg_replace("/[^0-9\+\-\(\)\s]/", "", $_GET['phone']) : "";  // Allows numbers, spaces, and common phone symbols
	$services = isset($_GET['services']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_GET['services']) : "";
	$subject = isset($_GET['subject']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_GET['subject']) : "";
	$address = isset($_GET['address']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_GET['address']) : "";
	$website = isset($_GET['website']) ? (filter_var($_GET['website'], FILTER_VALIDATE_URL) ? $_GET['website'] : "") : "";
	$message = isset($_GET['message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/i", "", $_GET['message']) : "";
	$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');  // Additional security when outputting or processing $message:

	//Recipients
	$mail->setFrom("youssef@gmail.com", "youssef");
	$mail->addAddress(RECIPIENT_EMAIL, RECIPIENT_NAME);     //Add a recipient

	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->Subject = 'A contact request send by ' . $name;
	$mail->Body = 'Name: ' . $name . "<br>";
	$mail->Body .= 'Email: ' . $senderEmail . "<br>";

	if ($phone)
		$mail->Body .= 'Phone: ' . $phone . "<br>";
	if ($services)
		$mail->Body .= 'services: ' . $services . "<br>";
	if ($subject)
		$mail->Body .= 'Subject: ' . $subject . "<br>";
	if ($address)
		$mail->Body .= 'Address: ' . $address . "<br>";
	if ($website)
		$mail->Body .= 'Website: ' . $website . "<br>";
	if ($message)
		$mail->Body .= 'message: ' . "<br>" . $message;

	$mail->send();
	echo "<div class='inner success'><p class='success'>Thanks for contacting us. We will contact you ASAP!</p></div><!-- /.inner -->";

	//! Return to the Get started page
} catch (Exception $e) {
	echo "<div class='inner error'><p class='error'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p></div><!-- /.inner -->";
}
