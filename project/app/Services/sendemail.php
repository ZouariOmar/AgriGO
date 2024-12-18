<?php
//? Include declaration part
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
include '../../../vendor/autoload.php';  // Load Composer's auto-loader

//? Using declaration part
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
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

// Define Host Info || Who is sending emails?
define('HOST_NAME', $_ENV['HOST_NAME']);
define('HOST_EMAIL', $_ENV['HOST_EMAIL']);

// Define SMTP Credentials || Gmail Information
define('SMTP_EMAIL', $_ENV['SMTP_EMAIL']);
define('SMTP_PASSWORD', $_ENV['SMTP_PASSWORD']); // read documentations

// Define Recipient Info || Who will get this email?
define('RECIPIENT_NAME', $_ENV['RECIPIENT_NAME']);
define('RECIPIENT_EMAIL', $_ENV['RECIPIENT_EMAIL']);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
	//Server settings
	$mail->SMTPDebug = SMTP::DEBUG_SERVER;            // Enable verbose debug output
	$mail->isSMTP();                                  // Send using SMTP
	$mail->Host = HOST_EMAIL;                         // Set the SMTP server (Gmail's SMTP server ) to send through
	$mail->SMTPAuth = true;                           // Enable SMTP authentication
	$mail->Username = SMTP_EMAIL;                     // SMTP username
	$mail->Password = SMTP_PASSWORD;                  // SMTP password
	$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  // Enable implicit TLS encryption
	$mail->Port = 465;                                // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

	//Content
	$name = isset($_GET['name']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_GET['name']) : "";
	$senderEmail = isset($_GET['email']) ? (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) ? $_GET['email'] : "") : "";
	$phone = isset($_GET['phone']) ? preg_replace("/[^0-9\+\-\(\)\s]/", "", $_GET['phone']) : "";  // Allows numbers, spaces, and common phone symbols
	$subject = isset($_GET['subject']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_GET['subject']) : "";
	$website = isset($_GET['website']) ? (filter_var($_GET['website'], FILTER_VALIDATE_URL) ? $_GET['website'] : "") : "";
	$message = isset($_GET['message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/i", "", $_GET['message']) : "";
	$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');  // Additional security when outputting or processing $message:

	//Recipients
	$mail->setFrom($senderEmail, $name);
	$mail->addAddress(RECIPIENT_EMAIL, RECIPIENT_NAME);     //Add a recipient

	//Content
	$mail->isHTML(true);                                  //Set email format to HTML
	$mail->Subject = 'A contact request send by ' . $name;
	$mail->Body .= 'Name: ' . $name . "<br>";
	$mail->Body .= 'Email: ' . $senderEmail . "<br>";
	$mail->Body .= 'Phone: ' . $phone . "<br>";
	$mail->Body .= 'Subject: ' . $subject . "<br>";
	$mail->Body .= 'message: ' . "<br>" . $message;

	$mail->send();
	?>

	<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title></title>
		<link href='https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat:700' rel='stylesheet' type='text/css'>
		<style>
			@import url(//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css);
			@import url(//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css);
		</style>
		<link rel="stylesheet" href="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/default_thank_you.css">
		<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/jquery-1.9.1.min.js"></script>
		<script src="https://2-22-4-dot-lead-pages.appspot.com/static/lp918/min/html5shiv.js"></script>
	</head>

	<body>
		<header class="site-header" id="header">
			<h1 class="site-header__title" data-lead-id="site-header-title">THANK YOU!</h1>
		</header>
		<main class="main-content">
			<input type="text" id="user_id" value="<?php echo htmlspecialchars($_GET['id']); ?>" hidden>
			<i class="fa fa-check main-content__checkmark" id="checkmark"></i>
			<p class="main-content__body" data-lead-id="main-content-body">Thanks for contacting us. We will contact you ASAP!
			</p>
			<p class="main-content__body">You will be redirected to the home page in <span id="countdown">5</span> seconds...
			</p>
		</main>
		<footer class="site-footer" id="footer">
			<p class="site-footer__fineprint" id="fineprint">Copyright ©2024 | All Rights Reserved</p>
		</footer>

		<script src="../../public/js/countdown.js"></script>
	</body>

	</html>

	<?php
} catch (Exception $e) {
	echo "<div class='inner error'><p class='error'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</p></div><!-- /.inner -->";
}
