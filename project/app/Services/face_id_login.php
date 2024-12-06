<?php
/**
 * @file setUsrStatus.php
 * @author zouari_omar <zouariomar20@gmail.com>
 */

//? Include declaration part
include_once '../Helpers/__include__.php';
include_once '../Helpers/custom.php';

session_start();
$user_id = $_SESSION['id'] ?? null;
$status = $_SESSION['status'] ?? null;
unset($_SESSION['id'], $_SESSION['status']);
$user_profile = null;
$user_image_path = null;

if ($user_id) {
	// Verify if the user is suspended or not
	is_suspend($user_id, 'Location: ../Views/login.php');

	// Fetch user image path
	$exec = new Fetch();
	$user_profile = $exec->fetch_user_profile($user_id) ?? null;
	$user_image_path = $exec->fetch_user_image($user_profile['Image_ID']) ?? null;
}
?>

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

	<!-- CSS -->
	<link rel="stylesheet" href="../../public/css/alert.css">

	<!-- Google Fonts  -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="../../public/css/OTP.css" />



	<title>AgriGO || Login with face id</title>

	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/imgs/favicons/favicon-16x16.png" />
	<!-- / Favicon -->

	<!-- Scripts -->
	<script defer src="../../public/js/face-api.min.js"></script>
	<script defer src="../../public/js/face-id.js"></script>
	<style>
		canvas {
			position: absolute;
		}
	</style>
</head>

<body>
	<main>
		<?php if (!$user_id): ?>
			<form onsubmit="void(0)" action="../Controllers/sendUsrId.php" method="POST">
				<div class="card">
					<p class="lock-icon"><i class="fas fa-lock"> </i></p>
					<h2>Face Recognition</h2>
					<p>You can login with face Recognition</p>
					<div class="email-input-container">
						<span class="email-icon">
							<i class="fa fa-user"></i>
							<!-- Replace with an icon library of your choice -->
						</span>
						<input name="identifier" type="text" placeholder="Enter your email/username" class="email-input" required />
					</div>
					<button>Start video</button>
				</div>
			</form>
		<?php else: ?>
			<style>
				canvas {
					position: absolute;
				}
			</style>

			<?php alert("alert info", "hello"); ?>
			<video id="video" width="720" height="560" autoplay muted></video>
			<img id="refImg" src="<?php echo $user_image_path ?>" style="display: none;">
			<input id="userId" type="text" value="<?php echo $user_id ?>" style="display: none;">
		<?php endif; ?>
		<?php if ($status)
			alert("alert", $status); ?>
	</main>

	<script src="../../public/js/alert.js"></script>
</body>

</html>