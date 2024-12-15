<?php
//? Include declaration part
require_once '../../../vendor/autoload.php';  // Load Composer autoload
require_once '../../conf/database.php';
require_once '../Helpers/custom.php';

// Fetch Sessions and clear them
session_start();
$status = $_SESSION['status'] ?? null;
unset($_SESSION['status']);

// Fetch the GET Request
$id = $_GET['id'];
$_SESSION['id'] = $id;

//* Connect to the DB
$db = new Database('../../');

$fetch = new Fetch();
$user = $fetch->fetch_user($id);
$user_profile = $fetch->fetch_user_profile($id);
$user_profile_image = $fetch->fetch_user_image($user_profile['Image_ID']);
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-assets-path="../../public/assets/" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	<title>AGNT || Account Settings</title>

	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/imgs/favicons/favicon-16x16.png" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet" />

	<!-- Icons. Uncomment required icon fonts -->
	<link rel="stylesheet" href="../../../vendor/fonts/boxicons.css" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="../../../vendor/css/core.css" class="template-customizer-core-css" />
	<link rel="stylesheet" href="../../../vendor/css/theme-default.css" class="template-customizer-theme-css" />
	<link rel="stylesheet" href="../../public/css/demo.css" />
	<link rel="stylesheet" href="../../public/css/sub_btns.css">

	<!-- Vendors CSS -->
	<link rel="stylesheet" href="../../../vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<link rel="stylesheet" href="../../../vendor/libs/apex-charts/apex-charts.css" />

	<!-- Helpers -->
	<script src="../../../vendor/js/helpers.js"></script>
	<script src="../../public/js/del.js"></script>

	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="../../public/js/config.js"></script>
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->

			<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
				<div class="app-brand demo">
					<a href="index.html" class="app-brand-link">
						<span class="app-brand-logo demo">
							<img src="../../public/assets/imgs/favicons/favicon-16x16.png" width="60" alt="logo.png" />
						</span>
						<span class="app-brand-text demo menu-text fw-bolder ms-2">AgriGO</span>
					</a>

					<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
						<i class="bx bx-chevron-left bx-sm align-middle"></i>
					</a>
				</div>

				<ul class="menu-inner py-1">
					<!-- Dashboard -->
					<li class="menu-item">
						<a href="dashboard.php?id=<?php echo $id ?>" class="menu-link">
							<i class="menu-icon tf-icons bx bx-home-circle"></i>
							<div data-i18n="Analytics">Dashboard</div>
						</a>
					</li>
					<!-- / Dashboard -->

					<!-- Admino -->
					<li class="menu-item">
						<a href="index.html" class="menu-link">
							<i class="menu-icon tf-icons bx bx-layout"></i>
							<div data-i18n="Layouts">Admino</div>
						</a>
					</li>
					<!-- / Admino -->

					<!-- Pages -->
					<li class="menu-header small text-uppercase">
						<span class="menu-header-text">Pages</span>
					</li>

					<!-- Account Settings -->
					<li class="menu-item active	">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-dock-top"></i>
							<div data-i18n="Account Settings">Account Settings</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item">
								<a href="pages-account-settings-account.php?id=<?php echo $id ?>" class="menu-link">
									<div data-i18n="Account">Account</div>
								</a>
							</li>
							<li class="menu-item">
								<a href="pages-account-settings-notifications.html" class="menu-link">
									<div data-i18n="Notifications">Notifications</div>
								</a>
							</li>
							<li class="menu-item">
								<a href="pages-account-settings-connections.html" class="menu-link">
									<div data-i18n="Connections">Connections</div>
								</a>
							</li>
						</ul>
					</li>
					<!-- / Account Settings -->

					<!-- Users Management -->
					<li class="menu-item">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-dock-top"></i>
							<div data-i18n="Account Settings">Users Management</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item">
								<a href="clients.php?id=<?php echo $id ?>" class="menu-link">
									<div data-i18n="Account">Clients Table</div>
								</a>
							</li>
							<li class="menu-item">
								<a href="farmers.php?id=<?php echo $id ?>" class="menu-link">
									<div data-i18n="Notifications">Farmers Table</div>
								</a>
							</li>
							<li class="menu-item">
								<a href="admins.php?id=<?php echo $id ?>" class="menu-link">
									<div data-i18n="Connections">Admins Table</div>
								</a>
							</li>
						</ul>
					</li>
					<!-- / Users Management -->

					<!-- Authentications -->
					<li class="menu-item">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
							<div data-i18n="Authentications">Authentications</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item">
								<a href="auth-login-basic.html" class="menu-link" target="_blank">
									<div data-i18n="Basic">Login</div>
								</a>
							</li>
							<li class="menu-item">
								<a href="auth-register-basic.html" class="menu-link" target="_blank">
									<div data-i18n="Basic">Register</div>
								</a>
							</li>
							<li class="menu-item">
								<a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
									<div data-i18n="Basic">Forgot Password</div>
								</a>
							</li>
						</ul>
					</li>
					<!-- / Authentications -->

					<!-- Maintenance -->
					<li class="menu-item">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-cube-alt"></i>
							<div data-i18n="Misc">Maintenance</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item">
								<a href="Reports.php?id=<?php echo $id ?>" class="menu-link">
									<div data-i18n="Error">Reports</div>
								</a>
							</li>
						</ul>
					</li>
					<!-- / Maintenance -->

					<li class="menu-item">
						<!-- MISC -->
						<ul class="menu-inner py-1">
							<li class="menu-header small text-uppercase">
								<span class="menu-header-text">Misc</span>
							</li>
							<!-- / MISC -->

							<!-- Support -->
							<li class="menu-item">
								<a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
									class="menu-link">
									<i class="menu-icon tf-icons bx bx-support"></i>
									<div data-i18n="Support">Support</div>
								</a>
							</li>
							<!-- / Support -->

							<!-- Documentation -->
							<li class="menu-item">
								<a href="https://github.com/ZouariOmar/AgriGO/blob/main/README.md" target="_blank" class="menu-link">
									<i class="menu-icon tf-icons bx bx-file"></i>
									<div data-i18n="Documentation">Documentation</div>
								</a>
							</li>
							<!-- / Documentation -->
						</ul>
					</li>
				</ul>
				</li>
			</aside>
			<!-- / Menu -->

			<!-- Layout container -->
			<div class="layout-page">
				<!-- Navbar -->
				<nav
					class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
					id="layout-navbar">
					<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
						<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
							<i class="bx bx-menu bx-sm"></i>
						</a>
					</div>

					<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
						<!-- Search -->
						<div class="navbar-nav align-items-center">
							<div class="nav-item d-flex align-items-center">
								<i class="bx bx-search fs-4 lh-0"></i>
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
									aria-label="Search..." />
							</div>
						</div>
						<!-- /Search -->

						<div class="ms-auto me-4">
							<button class="button" id="cut"><span> Download</span></button>
							<button class="button" id="copy"></><span> Copy</span></button>
							<button class="button" id="paste"><span> Paste</span></button>
						</div>

						<ul class="navbar-nav flex-row align-items-center ">
							<!-- User -->
							<li class="nav-item navbar-dropdown dropdown-user dropdown">
								<a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
									<div class="avatar avatar-online">
										<img src="<?php echo $user_profile_image ?>" alt class="w-px-40 h-40 rounded-circle" />
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-end">
									<li>
										<a class="dropdown-item" href="#">
											<div class="d-flex">
												<div class="flex-shrink-0 me-3">
													<div class="avatar avatar-online">
														<img src="<?php echo $user_profile_image ?>" alt class="w-px-40 h-40 rounded-circle" />
													</div>
												</div>
												<div class="flex-grow-1">
													<span class="fw-semibold d-block"><?php echo $user['Username'] ?></span>
													<small class="text-muted">Admin</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<div class="dropdown-divider"></div>
									</li>
									<li>
										<a class="dropdown-item" href="#">
											<i class="bx bx-user me-2"></i>
											<span class="align-middle">My Profile</span>
										</a>
									</li>
									<li>
										<a class="dropdown-item" href="#">
											<i class="bx bx-cog me-2"></i>
											<span class="align-middle">Settings</span>
										</a>
									</li>
									<li>
										<a class="dropdown-item" href="#">
											<span class="d-flex align-items-center align-middle">
												<i class="flex-shrink-0 bx bx-credit-card me-2"></i>
												<span class="flex-grow-1 align-middle">Billing</span>
												<span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
											</span>
										</a>
									</li>
									<li>
										<div class="dropdown-divider"></div>
									</li>
									<li>
										<a class="dropdown-item"
											href="../Controllers/setUsrStatus.php?admin_id=<?php echo $admin_id ?>&id=<?php echo $admin_id ?>&status=INACTIVE">
											<i class="bx bx-power-off me-2"></i>
											<span class="align-middle">Log Out</span>
										</a>
									</li>
								</ul>
							</li>
							<!--/ User -->
						</ul>
					</div>
				</nav>
				<!-- / Navbar -->

				<!-- Content wrapper -->
				<div class="content-wrapper">
					<!-- Content -->
					<div class="m-4">
						<?php if ($status)
							alert1("container display-6 col-sm-6 mb-4 alert alert-primary alert-dismissible", $status);
						?>
						<script>
							setTimeout(() => {
								document.getElementById('alert1').style.display = 'none';
							}, 3000);
						</script>
					</div>

					<div class="container-xxl flex-grow-1 container-p-y">
						<h4 class="fw-bold py-3 mb-4">
							<span class="text-muted fw-light">Account Settings /</span>
							Account
						</h4>

						<div class="row">
							<div class="col-md-12">
								<ul class="nav nav-pills flex-column flex-md-row mb-3">
									<li class="nav-item">
										<a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="pages-account-settings-notifications.html"><i class="bx bx-bell me-1"></i>
											Notifications</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="pages-account-settings-connections.html"><i
												class="bx bx-link-alt me-1"></i> Connections</a>
									</li>
								</ul>
								<div class="card mb-4">
									<!-- Edit form -->
									<form id="formAccountSettings" method="POST" action="../Controllers/editUsr.php"
										enctype="multipart/form-data">
										<h5 class="card-header">Profile Details</h5>
										<!-- Account -->
										<div class="card-body">
											<div class="d-flex align-items-start align-items-sm-center gap-4">
												<img src="<?php echo $user_profile_image ?>" alt="user-avatar" class="d-block rounded"
													height="100" width="100" id="uploadedAvatar" />
												<div class="button-wrapper">
													<label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
														<span class="d-none d-sm-block">Upload new photo</span>
														<i class="bx bx-upload d-block d-sm-none"></i>
														<input name="image" type="file" id="upload" class="account-file-input" hidden
															accept="image/png, image/jpeg" />
													</label>
													<button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
														<i class="bx bx-reset d-block d-sm-none"></i>
														<span class="d-none d-sm-block">Reset</span>
													</button>

													<p class="text-muted mb-0">
														Allowed JPG, GIF or PNG. Max size of 800K
													</p>
												</div>
											</div>
										</div>
										<hr class="my-0" />
										<div class="card-body">
											<div class="row">
												<div class="mb-3 col-md-6">
													<label for="firstName" class="form-label">First Name</label>
													<input class="form-control" type="text" id="firstName" name="firstName"
														value="<?php echo $user_profile['First_Name'] ?>" autofocus />
												</div>
												<div class="mb-3 col-md-6">
													<label for="lastName" class="form-label">Last Name</label>
													<input class="form-control" type="text" id="lastName" name="lastName"
														value="<?php echo $user_profile['Last_Name'] ?>" />
												</div>
												<div class="mb-3 col-md-6">
													<label for="email" class="form-label">E-mail</label>
													<input class="form-control" type="text" id="email" name="email"
														value="<?php echo $user['Email'] ?>" placeholder="exemple@example.com" />
												</div>

												<div class="mb-3 col-md-6">
													<label class="form-label" for="phoneNumber">Phone Number</label>
													<div class="input-group input-group-merge">
														<span class="input-group-text">TN (+216)</span>
														<input type="text" id="phoneNumber" name="tel" class="form-control"
															value="<?php echo $user_profile['Tel'] ?>" />
													</div>
												</div>

												<div class="mb-3 col-md-6">
													<label class="form-label" for="country">State</label>
													<select name="state" id="country" class="select2 form-select">
														<option value="<?php echo $user_profile['State'] ?? '' ?>">
															<?php echo $user_profile['State'] ?? '' ?>
														</option>
														<option value="Ariana">Ariana</option>
														<option value="Beja">Beja</option>
														<option value="Ben Arous">Ben Arous</option>
														<option value="Bizerte">Bizerte</option>
														<option value="Gabes">Gabes</option>
														<option value="Gafsa">Gafsa</option>
														<option value="Jendouba">Jendouba</option>
														<option value="Kairouan">Kairouan</option>
														<option value="Kasserine">Kasserine</option>
														<option value="Kebili">Kebili</option>
														<option value="Kef">Kef</option>
														<option value="Mahdia">Mahdia</option>
														<option value="Manouba">Manouba</option>
														<option value="Medenine">Medenine</option>
														<option value="Monastir">Monastir</option>
														<option value="Nabeul">Nabeul</option>
														<option value="Sfax">Sfax</option>
														<option value="Sidi Bouzid">Sidi Bouzid</option>
														<option value="Siliana">Siliana</option>
														<option value="Sousse">Sousse</option>
														<option value="Tataouine">Tataouine</option>
														<option value="Tozeur">Tozeur</option>
														<option value="Tunis">Tunis</option>
														<option value="Zaghouan">Zaghouan</option>
													</select>
												</div>

												<div class="mb-3 col-md-4">
													<label for="address" class="form-label">Address</label>
													<input type="address" class="form-control" id="address" name="address"
														value="<?php echo $user_profile['Address'] ?>" />
												</div>

												<div class="mb-3 col-md-2">
													<label for="zipCode" class="form-label">Zip Code</label>
													<input type="number" class="form-control" id="zipCode" name="zipCode"
														value="<?php echo $user_profile['Zip_Code'] ?>" maxlength="4" />
												</div>

												<div class="mb-3 col-md-4">
													<label class="form-label d-block">Sex</label>
													<div class="form-check-inline mt-2">
														<input class="form-check-input" type="radio" name="sex" id="inlineRadio1" <?php echo $user_profile['Sex'] == 'MALE' ? 'checked' : ''; ?> value="MALE" />
														<label class="form-check-label" for="inlineRadio1">Male</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="sex" id="inlineRadio2" <?php echo $user_profile['Sex'] == 'FEMALE' ? 'checked' : ''; ?> value="FEMALE" />
														<label class="form-check-label" for="inlineRadio2">Female</label>
													</div>
												</div>

												<div class="mb-3 col-md-12">
													<label class="form-label">About Yourself</label>
													<textarea class="form-control" aria-label="With textarea"
														name="about"><?php echo $user_profile['About'] ?></textarea>
												</div>

												<div class="mt-2">
													<button type="submit" class="btn btn-primary me-2">
														Save changes
													</button>
													<button type="reset" class="btn btn-outline-secondary">
														Cancel
													</button>
												</div>
									</form>
									<!-- / Edit form -->

								</div>
								<!-- /Account -->
							</div>
							<div class="card">
								<h5 class="card-header">Delete Account</h5>
								<div class="card-body">
									<div class="mb-3 col-12 mb-0">
										<div class="alert alert-warning">
											<h6 class="alert-heading fw-bold mb-1">
												Are you sure you want to delete your account?
											</h6>
											<p class="mb-0">
												Once you delete your account, there is no going
												back. Please be certain.
											</p>
										</div>
									</div>
									<article>
										<div class="form-check mb-3" onclick="accountDeactivation()">
											<input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
											<label class="form-check-label" for="accountActivation">I confirm my account
												deactivation</label>
										</div>
										<a
											href="../Controllers/setUsrStatus.php?admin_id=<?php $admin_id ?>&id=<?php $admin_id ?>&status=SUSPENDED">
											<input value="Deactivate Account" type="submit" class="btn btn-danger deactivate-account"
												id="accountDeactivate" disabled>
											</input>
										</a>
									</article>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- / Content -->

				<!-- Footer -->
				<footer class="content-footer footer bg-footer-theme">
					<div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
						<div class="mb-2 mb-md-0">
							©
							<script>
								document.write(new Date().getFullYear());
							</script>
							<a href="https://github.com/ZouariOmar/AgriGO/blob/main/LICENSE" target="_blank"
								class="footer-link fw-bolder">Copyright</a>
						</div>
						<div>
							<a href="https://github.com/ZouariOmar/AgriGO/blob/main/LICENSE" class="footer-link me-4"
								target="_blank">License</a>
							<a href="https://www.linkedin.com/in/zouari-omar-143239283" target="_blank"
								class="footer-link me-4">Linkedin</a>

							<a href="https://github.com/ZouariOmar/AgriGO/blob/main/README.md" target="_blank"
								class="footer-link me-4">Documentation</a>

							<a href="https://github.com/ZouariOmar/AgriGO/blob/main/README.md" target="_blank"
								class="footer-link me-4">Support</a>
						</div>
					</div>
				</footer>
				<!-- / Footer -->

				<div class="content-backdrop fade"></div>
			</div>
			<!-- Content wrapper -->
		</div>
		<!-- / Layout page -->
	</div>

	<!-- Overlay -->
	<div class="layout-overlay layout-menu-toggle"></div>
	</div>
	<!-- / Layout wrapper -->



	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->
	<script src="../../../vendor/libs/jquery/jquery.js"></script>
	<script src="../../../vendor/libs/popper/popper.js"></script>
	<script src="../../../vendor/js/bootstrap.js"></script>
	<script src="../../../vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

	<script src="../../../vendor/js/menu.js"></script>
	<!-- endbuild -->

	<!-- Vendors JS -->

	<!-- Main JS -->
	<script src="../../public/js/main.js"></script>

	<!-- Page JS -->
	<script src="../../public/js/pages-account-settings-account.js"></script>

	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>