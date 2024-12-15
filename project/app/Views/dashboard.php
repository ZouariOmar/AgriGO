<?php
//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload
include '../Helpers/custom.php';

// Fetch Sessions and clear them
session_start();
$status = $_SESSION['status'] ?? null;
unset($_SESSION['status']);

// Fetch the GET Request
$admin_id = $_GET['id'];

// Verify if the user is suspended or not
is_suspend($admin_id, 'Location: login.php');

// Set the user in active mode
set_active($admin_id);

//* Connect to the DB
$db = new Database('../../');

// Fetching
$fetch = new Fetch();
$user = $fetch->fetch_user($admin_id);
$user_profile = $fetch->fetch_user_profile($admin_id);
$user_profile_image = $fetch->fetch_user_image($user_profile['Image_ID']);
$users_number = $fetch->fetch_users_number();

// Retrieve users counts by 'role'
$client_count = $users_number['client_count'] ?? 0;
$farmer_count = $users_number['farmer_count'] ?? 0;
$admin_count = $users_number['admin_count'] ?? 0;
$total_count = $admin_count + $farmer_count + $client_count;

// Retrieve users counts by 'Account creation month'
$users_in_jan = $fetch->count_user_by_month('2024-01');
$users_in_feb = $fetch->count_user_by_month('2024-02');
$users_in_mar = $fetch->count_user_by_month('2024-03');
$users_in_apr = $fetch->count_user_by_month('2024-04');
$users_in_may = $fetch->count_user_by_month('2024-05');
$users_in_jun = $fetch->count_user_by_month('2024-06');
$users_in_jul = $fetch->count_user_by_month('2024-07');
$users_in_aug = $fetch->count_user_by_month('2024-08');
$users_in_sep = $fetch->count_user_by_month('2024-09');
$users_in_oct = $fetch->count_user_by_month('2024-10');
$users_in_nov = $fetch->count_user_by_month('2024-11');
$users_in_dec = $fetch->count_user_by_month('2024-12');
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
	data-assets-path="../../public/assets/" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
	<meta name="description" content="" />
	<title> AGTN || Dashboard </title>

	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/imgs/favicons/favicon-16x16.png" />
	<!-- / Favicon -->

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link
		href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
		rel="stylesheet" />
	<!-- / Fonts -->

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
					<li class="menu-item active	">
						<a href="dashboard.php?id=<?php echo $admin_id ?>" class="menu-link">
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
					<li class="menu-item">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons bx bx-dock-top"></i>
							<div data-i18n="Account Settings">Account Settings</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item">
								<a href="pages-account-settings-account.php?id=<?php echo $admin_id ?>" class="menu-link">
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
								<a href="clients.php?id=<?php echo $admin_id ?>" class="menu-link">
									<div data-i18n="Account">Clients Table</div>
								</a>
							</li>
							<li class="menu-item">
								<a href="farmers.php?id=<?php echo $admin_id ?>" class="menu-link">
									<div data-i18n="Notifications">Farmers Table</div>
								</a>
							</li>
							<li class="menu-item">
								<a href="admins.php?id=<?php echo $admin_id ?>" class="menu-link">
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
								<a href="Reports.php?id=<?php echo $admin_id ?>" class="menu-link">
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
					<div class="container-xxl flex-grow-1 container-p-y">
						<div class="row">
							<?php if ($status)
								alert1("container display-6 col-sm-6 mb-4 alert alert-primary alert-dismissible", $status);
							?>
							<script>
								setTimeout(() => {
									document.getElementById('alert1').style.display = 'none';
								}, 3000);
							</script>

							<div class="col-lg-8 mb-4 order-0">
								<div class="card">
									<div class="d-flex align-items-end row">
										<div class="col-sm-7">
											<div class="card-body">
												<h5 class="card-title text-primary">
													Congratulations John! 🎉
												</h5>
												<p class="mb-4">
													You have done <span class="fw-bold">72%</span> more
													sales today. Check your new badge in your profile.
												</p>

												<a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
											</div>
										</div>
										<div class="col-sm-5 text-center text-sm-left">
											<div class="card-body pb-0 px-0 px-md-4">
												<img src="../../public/assets/imgs/illustrations/man-with-laptop-light.png" height="140"
													alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
													data-app-light-img="illustrations/man-with-laptop-light.png" />
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 order-1">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-6 mb-4">
										<div class="card">
											<div class="card-body">
												<div class="card-title d-flex align-items-start justify-content-between">
													<div class="avatar flex-shrink-0">
														<img src="../../public/assets/imgs/icons/unicons/chart-success.png" alt="chart success"
															class="rounded" />
													</div>
													<div class="dropdown">
														<button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false">
															<i class="bx bx-dots-vertical-rounded"></i>
														</button>
														<div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
															<a class="dropdown-item" href="javascript:void(0);">View More</a>
															<a class="dropdown-item" href="javascript:void(0);">Delete</a>
														</div>
													</div>
												</div>
												<span class="fw-semibold d-block mb-1">Profit</span>
												<h3 class="card-title mb-2">$12,628</h3>
												<small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-12 col-6 mb-4">
										<div class="card">
											<div class="card-body">
												<div class="card-title d-flex align-items-start justify-content-between">
													<div class="avatar flex-shrink-0">
														<img src="../../public/assets/imgs/icons/unicons/wallet-info.png" alt="Credit Card"
															class="rounded" />
													</div>
													<div class="dropdown">
														<button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false">
															<i class="bx bx-dots-vertical-rounded"></i>
														</button>
														<div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
															<a class="dropdown-item" href="javascript:void(0);">View More</a>
															<a class="dropdown-item" href="javascript:void(0);">Delete</a>
														</div>
													</div>
												</div>
												<span>Sales</span>
												<h3 class="card-title text-nowrap mb-1">$4,679</h3>
												<small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- Total Revenue -->
							<div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
								<div class="card">
									<div class="row row-bordered g-0">
										<div class="col-md-8">
											<h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
											<div id="totalRevenueChart" class="px-2"></div>
										</div>
										<div class="col-md-4">
											<div class="card-body">
												<div class="text-center">
													<div class="dropdown">
														<button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
															id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															2022
														</button>
														<div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
															<a class="dropdown-item" href="javascript:void(0);">2021</a>
															<a class="dropdown-item" href="javascript:void(0);">2020</a>
															<a class="dropdown-item" href="javascript:void(0);">2019</a>
														</div>
													</div>
												</div>
											</div>
											<div id="growthChart"></div>
											<div class="text-center fw-semibold pt-3 mb-2">
												62% Company Growth
											</div>

											<div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
												<div class="d-flex">
													<div class="me-2">
														<span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
													</div>
													<div class="d-flex flex-column">
														<small>2022</small>
														<h6 class="mb-0">$32.5k</h6>
													</div>
												</div>
												<div class="d-flex">
													<div class="me-2">
														<span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
													</div>
													<div class="d-flex flex-column">
														<small>2021</small>
														<h6 class="mb-0">$41.2k</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--/ Total Revenue -->
							<div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
								<div class="row">
									<div class="col-6 mb-4">
										<div class="card">
											<div class="card-body">
												<div class="card-title d-flex align-items-start justify-content-between">
													<div class="avatar flex-shrink-0">
														<img src="../../public/assets/imgs/icons/unicons/paypal.png" alt="Credit Card"
															class="rounded" />
													</div>
													<div class="dropdown">
														<button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false">
															<i class="bx bx-dots-vertical-rounded"></i>
														</button>
														<div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
															<a class="dropdown-item" href="javascript:void(0);">View More</a>
															<a class="dropdown-item" href="javascript:void(0);">Delete</a>
														</div>
													</div>
												</div>
												<span class="d-block mb-1">Payments</span>
												<h3 class="card-title text-nowrap mb-2">$2,456</h3>
												<small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
											</div>
										</div>
									</div>
									<div class="col-6 mb-4">
										<div class="card">
											<div class="card-body">
												<div class="card-title d-flex align-items-start justify-content-between">
													<div class="avatar flex-shrink-0">
														<img src="../../public/assets/imgs/icons/unicons/cc-primary.png" alt="Credit Card"
															class="rounded" />
													</div>
													<div class="dropdown">
														<button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
															aria-haspopup="true" aria-expanded="false">
															<i class="bx bx-dots-vertical-rounded"></i>
														</button>
														<div class="dropdown-menu" aria-labelledby="cardOpt1">
															<a class="dropdown-item" href="javascript:void(0);">View More</a>
															<a class="dropdown-item" href="javascript:void(0);">Delete</a>
														</div>
													</div>
												</div>
												<span class="fw-semibold d-block mb-1">Transactions</span>
												<h3 class="card-title mb-2">$14,857</h3>
												<small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
											</div>
										</div>
									</div>
									<div class="col-12 mb-4">
										<div class="card">
											<div class="card-body">
												<div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
													<div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
														<div class="card-title">
															<h5 class="text-nowrap mb-2">Profile Report</h5>
															<span class="badge bg-label-warning rounded-pill">Year 2021</span>
														</div>
														<div class="mt-sm-auto">
															<small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i>
																68.2%</small>
															<h3 class="mb-0">$84,686k</h3>
														</div>
													</div>
													<div id="profileReportChart"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<!-- Order Statistics -->
							<div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
								<div class="card h-100">
									<div class="card-header d-flex align-items-center justify-content-between pb-0">
										<div class="card-title mb-0">
											<h5 class="m-0 me-2">Platform User Insights</h5>
											<small class="text-muted">Tracking total registrations on Lance</small>
										</div>
										<div class="dropdown">
											<button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">
												<i class="bx bx-dots-vertical-rounded"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
												<a class="dropdown-item" href="javascript:void(0);"
													onclick="window.location.reload(true);">Refresh</a>
												<a class="dropdown-item" href="javascript:void(0);">Share</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="d-flex justify-content-between align-items-center mb-3">
											<div class="d-flex flex-column align-items-center gap-1">
												<h2 class="mb-2"><?php echo $client_count + $farmer_count + $admin_count ?></h2>
												<span>Registered Users</span>
											</div>
											<div id="orderStatisticsChart"></div>
											<input id="clients_count" type="number" value="<?php echo $client_count ?>"
												style="display: none;" />
											<input id="farmers_count" type="number" value="<?php echo $farmer_count ?>"
												style="display: none;" />
											<input id="admins_count" type="number" value="<?php echo $admin_count ?>"
												style="display: none;" />
										</div>
										<ul class="p-0 m-0">
											<li class="d-flex mb-4 pb-1">
												<div class="avatar flex-shrink-0 me-3">
													<span class="avatar-initial rounded bg-label-primary"><i class="bx bx-face"></i></span>
												</div>
												<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
													<div class="me-2">
														<h6 class="mb-0">Clients</h6>
														<small class="text-muted">Total registered clients</small>
													</div>
													<div class="user-progress">
														<small class="fw-semibold"><?php echo $client_count ?></small>
													</div>
												</div>
											</li>
											<li class="d-flex mb-4 pb-1">
												<div class="avatar flex-shrink-0 me-3">
													<span class="avatar-initial rounded bg-label-success"><i class="bx bxs-face"></i></span>
												</div>
												<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
													<div class="me-2">
														<h6 class="mb-0">Farmers</h6>
														<small class="text-muted">Total registered farmers</small>
													</div>
													<div class="user-progress">
														<small class="fw-semibold"><?php echo $farmer_count ?></small>
													</div>
												</div>
											</li>
											<li class="d-flex mb-4 pb-1">
												<div class="avatar flex-shrink-0 me-3">
													<span class="avatar-initial rounded bg-label-info"><i class="bx bxs-user"></i></span>
												</div>
												<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
													<div class="me-2">
														<h6 class="mb-0">Admins</h6>
														<small class="text-muted">Total registered admins </small>
													</div>
													<div class="user-progress">
														<small class="fw-semibold"><?php echo $admin_count ?></small>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!--/ Order Statistics -->

							<!-- Expense Overview -->

							<div class="col-md-6 col-lg-8 order-1 mb-4">
								<div class="card h-100">
									<div class="card-header d-flex align-items-center justify-content-between pb-0">
										<div class="card-title mb-0">
											<h5 class="m-0 me-2">User Statistics Overview</h5>
											<small class="text-muted">Total registered users over the past year</small>
										</div>
										<div class="dropdown">
											<button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">
												<i class="bx bx-dots-vertical-rounded"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
												<a class="dropdown-item" href="javascript:void(0);"
													onclick="window.location.reload(true);">Refresh</a>
												<a class="dropdown-item" href="javascript:void(0);">Share</a>
											</div>
										</div>
									</div>
									<div class="card-body px-0">
										<div class="tab-content p-0">
											<div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
												<div class="d-flex p-4 pt-3">
													<div class="avatar flex-shrink-0 me-3">
														<img src="../../public/assets/imgs/icons/unicons/chart.png" alt="User" />
													</div>
													<div>
														<small class="text-muted d-block">Total Registration for
															<script>
																document.write(new Date().getFullYear());
															</script>
														</small>
														<div class="d-flex align-items-center">
															<h6 class="mb-0 me-1"><?php echo $total_count ?> User</h6>
															<small class="text-success fw-semibold">
																<i class="bx bx-chevron-up"></i>
																42.9%
															</small>
														</div>
													</div>
												</div>
												<div id="incomeChart"></div>
												<input id="admins_count" type="number" value="<?php echo $admin_count ?>"
													style="display: none;" />
												<input id="users_in_jan" type="number" value="<?php echo $users_in_jan ?>"
													style="display: none;" />
												<input id="users_in_feb" type="number" value="<?php echo $users_in_feb ?>"
													style="display: none;" />
												<input id="users_in_mar" type="number" value="<?php echo $users_in_mar ?>"
													style="display: none;" />
												<input id="users_in_apr" type="number" value="<?php echo $users_in_apr ?>"
													style="display: none;" />
												<input id="users_in_may" type="number" value="<?php echo $users_in_may ?>"
													style="display: none;" />
												<input id="users_in_jun" type="number" value="<?php echo $users_in_jun ?>"
													style="display: none;" />
												<input id="users_in_jul" type="number" value="<?php echo $users_in_jul ?>"
													style="display: none;" />
												<input id="users_in_aug" type="number" value="<?php echo $users_in_aug ?>"
													style="display: none;" />
												<input id="users_in_sep" type="number" value="<?php echo $users_in_sep ?>"
													style="display: none;" />
												<input id="users_in_oct" type="number" value="<?php echo $users_in_oct ?>"
													style="display: none;" />
												<input id="users_in_nov" type="number" value="<?php echo $users_in_nov ?>"
													style="display: none;" />
												<input id="users_in_dec" type="number" value="<?php echo $users_in_dec ?>"
													style="display: none;" />
												<div class="d-flex justify-content-center pt-4 gap-2">
													<div class="flex-shrink-0">
														<div id="expensesOfWeek"></div>
													</div>
													<div>
														<p class="mb-n1 mt-1">Expenses This Week</p>
														<small class="text-muted">$39 less than last week</small>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--/ Expense Overview -->

							<!-- Transactions -->
							<div class="col-md-6 col-lg-4 order-2 mb-4">
								<div class="card h-100">
									<div class="card-header d-flex align-items-center justify-content-between">
										<h5 class="card-title m-0 me-2">Transactions</h5>
										<div class="dropdown">
											<button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false">
												<i class="bx bx-dots-vertical-rounded"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
												<a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
												<a class="dropdown-item" href="javascript:void(0);">Last Month</a>
												<a class="dropdown-item" href="javascript:void(0);">Last Year</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<ul class="p-0 m-0">
											<li class="d-flex mb-4 pb-1">
												<div class="avatar flex-shrink-0 me-3">
													<img src="../../public/assets/imgs/icons/unicons/paypal.png" alt="User" class="rounded" />
												</div>
												<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
													<div class="me-2">
														<small class="text-muted d-block mb-1">Paypal</small>
														<h6 class="mb-0">Send money</h6>
													</div>
													<div class="user-progress d-flex align-items-center gap-1">
														<h6 class="mb-0">+82.6</h6>
														<span class="text-muted">USD</span>
													</div>
												</div>
											</li>
											<li class="d-flex mb-4 pb-1">
												<div class="avatar flex-shrink-0 me-3">
													<img src="../../public/assets/imgs/icons/unicons/wallet.png" alt="User" class="rounded" />
												</div>
												<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
													<div class="me-2">
														<small class="text-muted d-block mb-1">Wallet</small>
														<h6 class="mb-0">Mac'D</h6>
													</div>
													<div class="user-progress d-flex align-items-center gap-1">
														<h6 class="mb-0">+270.69</h6>
														<span class="text-muted">USD</span>
													</div>
												</div>
											</li>
											<li class="d-flex mb-4 pb-1">
												<div class="avatar flex-shrink-0 me-3">
													<img src="../../public/assets/imgs/icons/unicons/chart.png" alt="User" class="rounded" />
												</div>
												<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
													<div class="me-2">
														<small class="text-muted d-block mb-1">Transfer</small>
														<h6 class="mb-0">Refund</h6>
													</div>
													<div class="user-progress d-flex align-items-center gap-1">
														<h6 class="mb-0">+637.91</h6>
														<span class="text-muted">USD</span>
													</div>
												</div>
											</li>
											<li class="d-flex mb-4 pb-1">
												<div class="avatar flex-shrink-0 me-3">
													<img src="../../public/assets/imgs/icons/unicons/cc-success.png" alt="User" class="rounded" />
												</div>
												<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
													<div class="me-2">
														<small class="text-muted d-block mb-1">Credit Card</small>
														<h6 class="mb-0">Ordered Food</h6>
													</div>
													<div class="user-progress d-flex align-items-center gap-1">
														<h6 class="mb-0">-838.71</h6>
														<span class="text-muted">USD</span>
													</div>
												</div>
											</li>
											<li class="d-flex mb-4 pb-1">
												<div class="avatar flex-shrink-0 me-3">
													<img src="../../public/assets/imgs/icons/unicons/wallet.png" alt="User" class="rounded" />
												</div>
												<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
													<div class="me-2">
														<small class="text-muted d-block mb-1">Wallet</small>
														<h6 class="mb-0">Starbucks</h6>
													</div>
													<div class="user-progress d-flex align-items-center gap-1">
														<h6 class="mb-0">+203.33</h6>
														<span class="text-muted">USD</span>
													</div>
												</div>
											</li>
											<li class="d-flex">
												<div class="avatar flex-shrink-0 me-3">
													<img src="../../public/assets/imgs/icons/unicons/cc-warning.png" alt="User" class="rounded" />
												</div>
												<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
													<div class="me-2">
														<small class="text-muted d-block mb-1">Mastercard</small>
														<h6 class="mb-0">Ordered Food</h6>
													</div>
													<div class="user-progress d-flex align-items-center gap-1">
														<h6 class="mb-0">-92.45</h6>
														<span class="text-muted">USD</span>
													</div>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!--/ Transactions -->

							<!-- Todo list -->
							<div class="col-md-6 col-lg-6 order-2">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">To do list</h4>
										<div class="add-items d-flex">
											<input type="text" class="form-control todo-list-input" placeholder="enter task..">
											<button class="add btn btn-primary todo-list-add-btn">Add</button>
										</div>
										<div class="list-wrapper">
											<ul class="list-group list-group-flush">
												<li class="list-group-item">
													<input class="form-check-input me-1" id="li1" type="checkbox" value="" aria-label="...">
													<label for="li1">First checkbox</label>
												</li>
												<li class="list-group-item">
													<input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
													Second checkbox
												</li>
												<li class="list-group-item">
													<input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
													Third checkbox
												</li>
												<li class="list-group-item">
													<input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
													Fourth checkbox
												</li>
												<li class="list-group-item">
													<input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
													Fifth checkbox
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- / Todo list -->
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

	<div class="buy-now">
		<a href="#" target="_blank" class="btn btn-danger btn-buy-now">New Event</a>
	</div>

	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->
	<script src="../../../vendor/libs/jquery/jquery.js"></script>
	<script src="../../../vendor/libs/popper/popper.js"></script>
	<script src="../../../vendor/js/bootstrap.js"></script>
	<script src="../../../vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

	<script src="../../../vendor/js/menu.js"></script>
	<!-- endbuild -->

	<!-- Vendors JS -->
	<script src="../../../vendor/libs/apex-charts/apexcharts.js"></script>

	<!-- Main JS -->
	<script src="../../public/js/main.js"></script>

	<!-- Page JS -->
	<script src="../../public/js/dashboards-analytics.js"></script>
	<script src="../../public/js/todolist.js"></script>

	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>