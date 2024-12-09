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
	if (empty($user_profile['Image_ID'])) {
		$_SESSION['status'] = "Face Recognition Login Failed: No reference profile image found. Please upload a profile image to enable face recognition as a login method.";
		header('Location: ../Services/face_id_login.php');
		exit();
	}
	$user_image_path = $exec->fetch_user_image($user_profile['Image_ID']) ?? null;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>AgriGO || Login with face id</title>
	<!-- / Required meta tags -->

	<!-- Font Awesome Icons  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
		integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
		crossorigin="anonymous" />
	<!-- / Font Awesome Icons  -->

	<!-- CSS -->
	<link rel="stylesheet" href="../../public/css/alert.css">
	<link rel="stylesheet" href="../../public/css/OTP.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" />
	<style>
		canvas {
			position: absolute;
		}
	</style>
	<!-- / CSS -->

	<!-- Google Fonts  -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<!-- / Google Fonts  -->

	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/imgs/favicons/favicon-16x16.png" />
	<!-- / Favicon -->

	<!-- Scripts -->
	<script defer src="../../public/js/face-api.min.js"></script>
	<script defer src="../../public/js/face-id.js"></script>
	<script defer src="../../public/js/alert.js"></script>
	<!-- / Scripts -->
</head>

<body>
	<main>
		<div class="grid">
			<?php if (!$user_id): ?>
				<div class="row">
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
								<input name="identifier" type="text" placeholder="Enter your email/username" class="email-input"
									required />
							</div>
							<button>Start video</button>
						</div>
					</form>
				</div>
			<?php else: ?>
				<?php alert("alert info", "Welcome Back!"); ?>
				<video id="video" width="720" height="560" autoplay muted></video>
				<img id="refImg" src="<?php echo $user_image_path ?>" style="display: none;">
				<input id="userId" type="text" value="<?php echo $user_id ?>" style="display: none;">
			<?php endif; ?>
			<div class="row">
				<?php if ($status)
					alert("alert", $status); ?>
			</div>
		</div>
	</main>
</body>

</html>