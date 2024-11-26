<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Font Awesome Icons  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
		integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
		crossorigin="anonymous" />

	<!-- Google Fonts  -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="../../public/css/OTP.css" />
	<title>AgriGO || Forgot Password</title>
</head>

<body>
	<form class="card" action="sendemail.php"post">
		<p class="lock-icon"><i class="fas fa-lock"> </i></p>
		<h2>Forgot Password?</h2>
		<p>You can reset your Password here</p>
		<div class="email-input-container">
			<span class="email-icon">
				<i class="fa fa-envelope"></i>
				<!-- Replace with an icon library of your choice -->
			</span>
			<input type="email" name="recipient_email" placeholder="Enter your email" class="email-input" />
		</div>
		<button>Send My Password</button>
	</form>
</body>

</html>