<?php
//? Include declaration part
include '../../public/components/custom.php';

session_start();
$status = $_SESSION['status'] ?? null;    // Fetch and clear the status message
$user_id = $_SESSION['user_id'] ?? null;  // Fetch and clear the status message
unset($_SESSION['status'], $_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="AgriGO 2.0 Website" />
	<title>AGRIGO || Login</title>

	<!-- Favicons Icons -->
	<link rel="apple-touch-icon" sizes="180x180" href="../../public/assets/imgs/favicons/apple-touch-icon.png" />
	<link rel="icon" type="image/png" sizes="32x32" href="../../public/assets/imgs/favicons/favicon-32x32.png" />
	<link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/imgs/favicons/favicon-16x16.png" />
	<link rel="manifest" href="../../publicassets/imgs/favicons/site.webmanifest" />

	<!-- Login css -->
	<link rel="stylesheet" href="../../public/css/login.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<!-- Start signUp form-->
			<form onsubmit="return validateSignUpForm();" action="../../app/Controllers/addUsr.php" method="post">
				<h1>Create Account</h1>
				<div class="social-container">
					<a href="#"><i class="fa fa-facebook"></i></a>
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
					<a href="#"><i class="fa fa-google"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
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
		?>
		<script>
			// Redirect to the main/welcome user page
			setTimeout(() => {
				window.location.href = "../../public/html/contact.html?id=<?= $user_id ?>";
			}, 1000);
		</script>
		<?php
	elseif ($status === "Registration has been successful!"):
		alert("alert success", "Registration has been successful!");
		?>
		<script>
			// Redirect to the welcome page
			setTimeout(() => {
				window.location.href = "welcome.php?id=<?= $user_id ?>";
			}, 1000);
		</script>
		<?php
	elseif ($status):
		alert("alert", $status);
	endif;
	?>

	<!-- Login js -->
	<script src="../../public/js/login.js"></script>
</body>

</html>