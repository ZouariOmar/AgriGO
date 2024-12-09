<?php
//? Include declaration part
include '../Helpers/custom.php';

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

session_start();
$status = $_SESSION['status'] ?? null;      // Fetch the `status` session
$user_id = $_SESSION['user_id'] ?? null;    // Fetch the `user_id` session
$user_role = $_SESSION['user_role'] ?? null;  // Fetch the `user_role` session
unset($_SESSION['status'], $_SESSION['user_id'], $_SESSION['user_role']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="AgriGO 2.0 Website" />
	<title>AGNT || Login</title>

	<!-- Favicons Icons -->
	<link rel="apple-touch-icon" sizes="180x180" href="../../public/assets/imgs/favicons/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="../../public/assets/imgs/favicons/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/imgs/favicons/favicon-16x16.png" />
	<link rel="manifest" href="../../publicassets/imgs/favicons/site.webmanifest" />

	<!-- Login css -->
	<link rel="stylesheet" href="../../public/css/login.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

	<script src="https://accounts.google.com/gsi/client" async defer></script>
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<!-- Start signUp form-->
			<form onsubmit="return validateSignUpForm();" action="../../app/Controllers/addUsr.php" method="post">
				<h1>Create Account</h1>
				<div class="social-container">
					<a href="#" onclick="acc"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-google"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
				</div>
				<span>or use your email for registration</span>
				<input id="username" name="username" type="text" placeholder="Username" title="Enter Your Username" />
				<input id="email" name="email" type="email" placeholder="Email" title="Enter Your Email" />
				<input id="password1" name="password" type="password" placeholder="Password" title="Enter Your Password" />
				<div class="checkboxes">
					<label for="checker">Are You a Farmer ?</label>
					<input type="checkbox" name="checker" id="checker" />
				</div>
				<button>Sign Up</button>
				<p id="signUpError" style="color: red"></p>
			</form>
			<!-- End signUp form-->
		</div>
		<div class="form-container sign-in-container">
			<!-- Start signIn form-->
			<form onsubmit="return validateSignInForm();" action="../../app/Middleware/signIn.php" method="post">
				<h1>Sign in</h1>
				<div class="social-container">
					<a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#" id="google-signin-btn" class="google-signin-btn" title="Sign in with Google">
						<i class="fa fa-google"></i>
					</a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="../Services/face_id_login.php"><i class="fa fa-id-badge"></i></a>
				</div>
				<span>or use your account</span>
				<input id="identifier" name="identifier" type="text" placeholder="Email or Username"
					title="Enter Your Email Or Username" />
				<input id="password2" name="password" type="password" placeholder="Password" title="Enter Your Password" />
				<a href="../Services/OTP.php" id="forgetPass">Forot your password?</a>
				<button>Sign In</button>
				<p id="signInError" style="color: red"></p>
			</form>
			<!-- End signIn form-->
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Welcome Back!</h1>
					<p>
						To keep connected with us please login with your personal info
					</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
				<div class="overlay-panel overlay-left">
					<h1>Hello, Friend!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
			</div>
		</div>
	</div>

	<?php
	if ($status === "User not found!"):
		alert("alert", "User not found!");
	elseif ($status === "Invalid password!"):
		alert("alert", "Invalid password!");
	elseif ($status === "Username or email already used!"):
		alert("alert", "Username or email already used!");
	elseif ($status === "Login successful!"):
		alert("alert success", "Login successful!");
		$redirectUrl = ($user_role != 2)
			? "../../public/html/contact.html?id=$user_id"   // Redirect to the home
			: "dashboard.php?id=$user_id"; 									 // Redirect to the admin_dashboard
		redirect($redirectUrl, 2000);
	elseif ($status === "Registration has been successful!"):
		alert("alert success", "Registration has been successful!");
		redirect("Location: welcome.php?id=$user_id", 2000);  // Redirect to the welcome page
	elseif ($status):
		alert("alert", $status);
	endif;
	?>

	<!-- Login js -->
	<script>
		document.getElementById('google-signin-btn').addEventListener('click', function (event) {
			event.preventDefault(); // Prevent default link behavior

			// Initialize Google Sign-In
			google.accounts.id.initialize({
				client_id: '<?php echo $_ENV['CLIENT_ID']; ?>', // Replace with your client ID
				callback: handleCredentialResponse
			});

			// Prompt the Google Sign-In dialog
			google.accounts.id.prompt();
		});

		// Handle the response
		function handleCredentialResponse(response) {
			if (response.credential) {
				console.log('Encoded JWT ID token received:', response.credential);

				// Send the token to your backend for validation
				fetch('../Controllers/AuthController.php', {
					method: 'POST',
					headers: { 'Content-Type': 'application/json' },
					body: JSON.stringify({ idToken: response.credential })
				})
					.then(res => res.json()) // Parse the response as JSON
					.then(data => {
						console.log('Backend response data:', data); //! Debug log the backend response

						// Redirect the user
						(data.success) ? window.location.href = '../../public/html/contact.html' : alert('Authentication failed: ' + data.message);
					})
					.catch(err => {
						console.error('Error during authentication:', err);
					});
			}
		}
	</script>


	<script src="../../public/js/login.js"></script>
</body>

</html>