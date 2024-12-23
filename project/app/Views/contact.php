<?php
//? Include declaration part
include '../Helpers/custom.php';

// Fetch data from url
$user_id = $_GET['id'];

// Verify if the user is suspended or not
is_suspend($user_id, 'Location: login.php');
?>

<!-- @author @ZouariOmar -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>AGNT || Contact</title>
	<!-- Favicons Icons -->
	<link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/imgs/favicons/favicon-16x16.png" />
	<link rel="manifest" href="../../public/assets/imgs/favicons/site.webmanifest" />
	<meta name="description" content="AgriGO 2.0 Website" />

	<!-- fonts -->
	<link
		href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet" />

	<link rel="stylesheet" href="../../../vendor/animate/animate.min.css" />
	<link rel="stylesheet" href="../../../vendor/animate/custom-animate.css" />
	<link rel="stylesheet" href="../../../vendor/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../../../vendor/bootstrap-select/css/bootstrap-select.min.css" />
	<link rel="stylesheet" href="../../../vendor/bxslider/jquery.bxslider.css" />
	<link rel="stylesheet" href="../../../vendor/fontawesome/css/all.min.css" />
	<link rel="stylesheet" href="../../../vendor/jquery-magnific-popup/jquery.magnific-popup.css" />
	<link rel="stylesheet" href="../../../vendor/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" href="../../../vendor/nice-select/nice-select.css" />
	<link rel="stylesheet" href="../../../vendor/nouislider/nouislider.min.css" />
	<link rel="stylesheet" href="../../../vendor/nouislider/nouislider.pips.css" />
	<link rel="stylesheet" href="../../../vendor/odometer/odometer.min.css" />
	<link rel="stylesheet" href="../../../vendor/owl-carousel/owl.carousel.min.css" />
	<link rel="stylesheet" href="../../../vendor/owl-carousel/owl.theme.default.min.css" />
	<link rel="stylesheet" href="../../../vendor/swiper/swiper.min.css" />
	<link rel="stylesheet" href="../../../vendor/timepicker/timePicker.css" />
	<link rel="stylesheet" href="../../../vendor/tiny-slider/tiny-slider.min.css" />
	<link rel="stylesheet" href="../../../vendor/vegas/vegas.min.css" />
	<link rel="stylesheet" href="../../../vendor/thm-icons/style.css" />
	<link rel="stylesheet" href="../../../vendor/slick-slider/slick.css" />
	<link rel="stylesheet" href="../../../vendor/language-switcher/polyglot-language-switcher.css" />
	<link rel="stylesheet" href="../../../vendor/reey-font/stylesheet.css" />

	<!-- template styles -->
	<link rel="stylesheet" href="../../public/css/style.css" />
	<link rel="stylesheet" href="../../public/css/responsive.css" />
	<link rel="stylesheet" href="../../public/css/style-2.css" />
</head>

<body>
	<!-- Start Preloader -->
	<div class="loader-wrap">
		<div class="preloader">
			<div class="preloader-close">x</div>
			<div id="handle-preloader" class="handle-preloader">
				<div class="animation-preloader">
					<div class="spinner"></div>
					<div class="txt-loading">
						<span data-text-preloader="A" class="letters-loading"> A </span>
						<span data-text-preloader="G" class="letters-loading"> G </span>
						<span data-text-preloader="R" class="letters-loading"> R </span>
						<span data-text-preloader="I" class="letters-loading"> I </span>
						<span data-text-preloader="G" class="letters-loading"> G </span>
						<span data-text-preloader="O" class="letters-loading"> O </span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Preloader -->

	<div class="page-wrapper">
		<!--Start Main Header Three-->
		<header class="main-header main-header-three">
			<div class="main-header-three__inner">
				<nav class="main-menu main-menu-one">
					<div class="main-menu__wrapper clearfix">
						<div class="container-fluid">
							<div class="main-menu__wrapper-inner">
								<div class="main-header-three__left">
									<div class="main-menu-box">
										<a href="#" class="mobile-nav__toggler">
											<i class="fa fa-bars"></i>
										</a>

										<ul class="main-menu__list">
											<li class="dropdown">
												<a href="index.php?id=<?php echo $user_id; ?>">Home <span class="line"></span></a>
												<ul>
													<li>
														<a href="index.php?id=<?php echo $user_id; ?>">Home One</a>
													</li>
													<li><a href="index-2.html">Home Two</a></li>
													<li><a href="index-3.html">Home Three</a></li>
													<li class="dropdown">
														<a href="#">Header Styles</a>
														<ul>
															<li><a href="index.php?id=<?php echo $user_id; ?>">Header One</a></li>
															<li><a href="index-2.html">Header Two</a></li>
															<li><a href="index-3.html">Header Three</a></li>
														</ul>
													</li>
												</ul>
											</li>

											<li>
												<a href="about.html">About <span class="line"></span></a>
											</li>

											<li class="dropdown">
												<a href="#">Services <span class="line"></span></a>
												<ul>
													<li><a href="services.html">Services</a></li>
													<li>
														<a href="arbor-management.html">Arbor Management</a>
													</li>
													<li>
														<a href="garden-management.html">Garden Management</a>
													</li>
													<li>
														<a href="nursery.html">Nursery & Tree Farm</a>
													</li>
													<li>
														<a href="trimming.html">Trimming & Pruning</a>
													</li>
													<li>
														<a href="weeds-control.html">Pests & Weeds Control</a>
													</li>
													<li>
														<a href="flowers-garden.html">Fruits & Flowers Garden</a>
													</li>
												</ul>
											</li>

											<li class="dropdown">
												<a href="#">Pages <span class="line"></span></a>
												<ul>
													<li><a href="team.html">Team</a></li>
													<li>
														<a href="team-details.html">Team Details</a>
													</li>
													<li><a href="portfolio-1.html">Portfolio 01</a></li>
													<li><a href="portfolio-2.html">Portfolio 02</a></li>
													<li><a href="faq.html">Faq</a></li>
												</ul>
											</li>

											<li class="dropdown">
												<a href="#">Blog <span class="line"></span></a>
												<ul>
													<li><a href="blog.html">Blog</a></li>
													<li><a href="blog-grid.html">Blog Grid</a></li>
													<li>
														<a href="blog-details.html">Blog Details</a>
													</li>
												</ul>
											</li>
											<li class="current">
												<a href="contact.html">Contact <span class="line"></span></a>
											</li>
										</ul>
									</div>
								</div>

								<div class="main-header-three__middle">
									<div class="logo-box-one">
										<a href="index.php?id=<?php echo $user_id; ?>">
											<img src="../../public/assets/imgs/resources/logo-3.png" alt="AgriGO.png" title="AgriGO" />
										</a>
									</div>
								</div>

								<div class="main-header-three__right">
									<div class="main-header-three__right-contact">
										<div class="icon-box">
											<span class="icon-phone"></span>
										</div>

										<div class="content-box">
											<p>Call In Anytime</p>
											<a href="tel:9288006780">+216-93490909</a>
										</div>
									</div>

									<div class="header-search-box">
										<a href="#" class="main-menu__search search-toggler icon-magnifying-glass">
										</a>
									</div>

									<div class="right-box">
										<div class="top-box">
											<div class="icon-box">
												<span class="icon-dollar"></span>
											</div>
											<div class="text-box">
												<p>
													We do not received <br />
													extra charges
												</p>
											</div>
										</div>

										<div class="btn-box">
											<a href="contact.html">Get Started Now</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</header>
		<!--End Main Header Three-->

		<div class="stricky-header stricky-header--three stricked-menu main-menu">
			<div class="sticky-header__content"></div>
			<!-- /.sticky-header__content -->
		</div>
		<!-- /.stricky-header -->

		<!--Start Page Header-->
		<section class="page-header">
			<div class="page-header__bg" style="
						background-image: url(../../public/assets/imgs/backgrounds/page-header-bg.jpg);
					"></div>
			<div class="shape1">
				<img src="../../public/assets/imgs/shapes/page-header-shape1.png" alt="#" />
			</div>

			<div class="container">
				<div class="page-header__inner">
					<h2>Contact</h2>
					<ul class="thm-breadcrumb">
						<li><a href="index.php?id=<?php echo $user_id; ?>">Home</a></li>
						<li><span>-</span></li>
						<li>Contact</li>
					</ul>
				</div>
			</div>
		</section>
		<!--End Page Header-->

		<!--Start Contact Page -->
		<section class="contact-page">
			<div class="container">
				<div class="row">
					<!--Start Contact One Form Contact-->
					<div class="col-xl-8">
						<div class="contact-one__form contact-one__form--contact">
							<div class="sec-title">
								<div class="sec-title__tagline">
									<h6>Call to Action</h6>
									<span class="right"></span>
								</div>
								<h2 class="sec-title__title">
									You Can Easily Contact Us <br />
									At Any Time!
								</h2>
							</div>

							<form id="contact-form" class="default-form2 contact-form-validated" action="../Services/sendemail.php"
								novalidate="novalidate">
								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="input-box">
											<input type="text" name="id" value="<?php echo $user_id; ?>" hidden>
											<input type="text" name="name" value="" placeholder="Your Name" required="" />
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="input-box">
											<input type="email" name="email" value="" placeholder="Email Address" required="" />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="input-box">
											<input type="text" placeholder="Phone" name="phone" />
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="input-box">
											<input type="text" placeholder="Subject" name="subject" />
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xl-12">
										<div class="input-box">
											<textarea name="message" placeholder="Write a Message"></textarea>
										</div>
									</div>

									<div class="col-xl-6 col-lg-6 col-md-6">
										<div class="contact-one__form-btn">
											<button class="thm-btn" type="submit" data-loading-text="Please wait...">
												<span class="txt">Send Now</span>
												<i class="fa fa-angle-double-right"></i>
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<!--End Contact One Form Contact-->

					<!--Start Contact Page Img-->
					<div class="col-xl-4">
						<div class="contact-page__img">
							<img src="../../public/assets/imgs/resources/contact-page-img.jpg" alt="#" />
						</div>
					</div>
					<!--End Contact Page Img-->
				</div>
			</div>
		</section>
		<!--End Contact Page -->

		<!--Start Contact Page Bottom-->
		<section class="contact-page-bottom">
			<div class="container">
				<div class="row">
					<!--Start Contact Page Bottom Map-->
					<div class="col-xl-6">
						<div class="contact-page-bottom-map">
							<iframe
								src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6381.123431077947!2d10.180705143766549!3d36.90083196849094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12e2cb76119afe2b%3A0xab8889e9b10a7645!2sKhair%20Mosque!5e0!3m2!1sen!2stn!4v1731170139373!5m2!1sen!2stn"
								class="contact-page__google-map" allowfullscreen loading="lazy"></iframe>
						</div>
					</div>
					<!--End Contact Page Bottom Map-->

					<!--Start Contact Page Bottom Content-->
					<div class="col-xl-6">
						<div class="contact-page-bottom__content">
							<div class="sec-title">
								<div class="sec-title__tagline">
									<h6>Contact Us</h6>
									<span class="right"></span>
								</div>
								<h2 class="sec-title__title">Get In Touch</h2>
							</div>
							<div class="contact-page-bottom__content-img">
								<img src="../../public/assets/imgs/resources/contact-page-bottom-img.gif" alt="#" />

								<div class="contact-info">
									<ul>
										<li>
											<div class="inner">
												<div class="icon-box">
													<span class="icon-phone-call-1"></span>
												</div>

												<div class="content-box">
													<p>
														Tel : <a href="tel:21693490909">+216-93490909</a>
													</p>
												</div>
											</div>
										</li>

										<li>
											<div class="inner">
												<div class="icon-box">
													<span class="icon-message"></span>
												</div>

												<div class="content-box">
													<p>
														Email :
														<a href="mailto:zouariomar20@gmail.com">contact@agrigo.com</a>
													</p>
												</div>
											</div>
										</li>

										<li>
											<div class="inner">
												<div class="icon-box">
													<span class="icon-placeholder"></span>
												</div>

												<div class="content-box">
													<p>Add : Tunis, Ariana soghra</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!--End Contact Page Bottom Content-->
				</div>
			</div>
		</section>
		<!--End Contact Page Bottom-->

		<!--Start Footer One -->
		<footer class="footer-one footer-one--two">
			<div class="footer-one__bg" style="
						background-image: url(../../public/assets/imgs/shapes/footer-v1-shape3.png);
					"></div>
			<div class="shape1 float-bob-y">
				<img src="../../public/assets/imgs/shapes/footer-v1-shape1.png" alt="#" />
			</div>
			<div class="shape2 float-bob-y">
				<img src="../../public/assets/imgs/shapes/footer-v1-shape2.png" alt="#" />
			</div>
			<!--Start Footer-->
			<div class="footer">
				<div class="container">
					<div class="row">
						<!--Start Footer Widget Single-->
						<div class="col-xl-5 col-lg-5 wow animated fadeInUp" data-wow-delay="0.1s">
							<div class="footer-widget__single">
								<div class="footer-widget__single-about">
									<div class="logo-box">
										<a href="index.php?id=<?php echo $user_id; ?>"><img src="../../public/assets/imgs/resources/footer-logo.png" alt="#" /></a>
									</div>

									<form class="footer-widget__subscribe-box">
										<div class="title-box">
											<h5>Subsrcibe for Latest Articles and Resources</h5>
										</div>
										<div class="footer-widget__subscribe-input-box">
											<input type="email" placeholder="Email Address" name="email" />
											<button type="submit" class="footer-widget__subscribe-btn">
												<span>Go</span>
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!--End Footer Widget Single-->

						<!--Start Footer One Right-->
						<div class="col-xl-7 col-lg-7">
							<div class="footer-one__right">
								<div class="row">
									<!--Start Footer One Right Single-->
									<div class="col-xl-4 col-lg-4 wow animated fadeInUp" data-wow-delay="0.2s">
										<div class="footer-one__right-single mb50">
											<div class="title">
												<h2>Our Services</h2>
											</div>
											<div class="footer-one__right-single-services">
												<ul class="footer-one__right-single-list">
													<li><a href="services.html">Lawn Moving</a></li>
													<li><a href="services.html">Hedge Cutting</a></li>
													<li><a href="services.html">Flower Planting</a></li>
													<li><a href="services.html">Working Process</a></li>
													<li>
														<a href="services.html">Garden Restoration</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<!--End Footer One Right Single-->

									<!--Start Footer One Right Single-->
									<div class="col-xl-3 col-lg-3 wow animated fadeInUp" data-wow-delay="0.3s">
										<div class="footer-one__right-single mb50">
											<div class="title">
												<h2>Links</h2>
											</div>
											<div class="footer-one__right-single-links">
												<ul class="footer-one__right-single-list">
													<li><a href="about.html">About Us</a></li>
													<li><a href="team.html">Our Team</a></li>
													<li><a href="contact.html">Contact Us</a></li>
													<li><a href="#">Our History</a></li>
													<li><a href="#">Testimonials</a></li>
												</ul>
											</div>
										</div>
									</div>
									<!--End Footer One Right Single-->

									<!--Start Footer One Right Single-->
									<div class="col-xl-5 col-lg-5 wow animated fadeInUp" data-wow-delay="0.4s">
										<div class="footer-one__right-single">
											<div class="title">
												<h2>Contact</h2>
											</div>
											<div class="footer-one__right-single-contact">
												<p>
													<a href="mailto:agrigo999@gmail.com">agrigo999@gmail.com</a>
													<br />
													80 Broklyn Road Street <br />
													New York. USA
												</p>
												<a href="mailto:agrigo999@gmail.com">agrigo999@gmail.com</a>
											</div>
										</div>
									</div>
									<!--End Footer One Right Single-->
								</div>

								<div class="footer-one__right-bottom wow animated fadeInUp" data-wow-delay="0.5s">
									<ul class="social-links">
										<li>
											<a href="#"><span class="icon-twitter"></span></a>
										</li>
										<li>
											<a href="#"><span class="icon-facebook"></span></a>
										</li>
										<li>
											<a href="#"><span class="icon-pinterest"></span></a>
										</li>
										<li>
											<a href="#"><span class="icon-instagram"></span></a>
										</li>
									</ul>

									<div class="footer-one__right-bottom-contact">
										<div class="icon-box">
											<span class="icon-phone-call"></span>
										</div>
										<div class="content-box">
											<p>Call Anytime</p>
											<h4>
												<a href="tel:9288006780">+92 ( 8800 ) - 6780</a>
											</h4>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--End Footer One Right-->
					</div>
				</div>
			</div>
			<!--End Footer-->

			<div class="footer-one__bottom">
				<div class="container">
					<div class="bottom-inner">
						<div class="copyright">
							<p>Copyright © 2023 All Rights Reserved.</p>
						</div>

						<ul class="footer-one__bottom-menu">
							<li><a href="about.html">Terms & Condition</a></li>
							<li><a href="about.html">Privacy </a></li>
							<li><a href="about.html">Support</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<!--End Footer One-->
	</div>
	<!-- /.page-wrapper -->

	<div class="mobile-nav__wrapper">
		<div class="mobile-nav__overlay mobile-nav__toggler"></div>
		<div class="mobile-nav__content">
			<span class="mobile-nav__close mobile-nav__toggler">
				<i class="icon-plus"></i>
			</span>
			<div class="logo-box">
				<a href="index.php?id=<?php echo $user_id; ?>" aria-label="logo image">
					<img src="../../public/assets/imgs/resources/mobile-nav-logo.png" alt="" />
				</a>
			</div>
			<div class="mobile-nav__container"></div>
			<ul class="mobile-nav__contact list-unstyled">
				<li>
					<i class="fa fa-envelope"></i>
					<a href="mailto:info@example.com">info@example.com</a>
				</li>
				<li>
					<i class="fa fa-phone-alt"></i>
					<a href="tel:123456789">444 000 777 66</a>
				</li>
			</ul>
			<div class="mobile-nav__social">
				<a href="#" class="fab fa-twitter"></a>
				<a href="#" class="fab fa-facebook-square"></a>
				<a href="#" class="fab fa-pinterest-p"></a>
				<a href="#" class="fab fa-instagram"></a>
			</div>
		</div>
	</div>

	<div class="search-popup">
		<div class="search-popup__overlay search-toggler"></div>
		<div class="search-popup__content">
			<form action="#">
				<label for="search" class="sr-only">search here</label>
				<input type="text" id="search" placeholder="Search Here..." />
				<button type="submit" aria-label="search submit" class="thm-btn">
					<i class="icon-magnifying-glass"></i>
				</button>
			</form>
		</div>
	</div>

	<a href="#" data-target="html" class="scroll-to-target scroll-to-top">
		<i class="icon-down-arrow"></i>
	</a>

	<script src="../../../vendor/jquery/jquery-3.6.0.min.js"></script>
	<script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../../../vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
	<script src="../../../vendor/bxslider/jquery.bxslider.min.js"></script>
	<script src="../../../vendor/circleType/jquery.circleType.js"></script>
	<script src="../../../vendor/circleType/jquery.lettering.min.js"></script>
	<script src="../../../vendor/isotope/isotope.js"></script>
	<script src="../../../vendor/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
	<script src="../../../vendor/jquery-appear/jquery.appear.min.js"></script>
	<script src="../../../vendor/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
	<script src="../../../vendor/jquery-migrate/jquery-migrate.min.js"></script>
	<script src="../../../vendor/jquery-ui/jquery-ui.js"></script>
	<script src="../../../vendor/jquery-validate/jquery.validate.min.js"></script>
	<script src="../../../vendor/nice-select/jquery.nice-select.min.js"></script>
	<script src="../../../vendor/nouislider/nouislider.min.js"></script>
	<script src="../../../vendor/odometer/odometer.min.js"></script>
	<script src="../../../vendor/owl-carousel/owl.carousel.min.js"></script>
	<script src="../../../vendor/parallax/parallax.min.js"></script>
	<script src="../../../vendor/swiper/swiper.min.js"></script>
	<script src="../../../vendor/timepicker/timePicker.js"></script>
	<script src="../../../vendor/tiny-slider/tiny-slider.min.js"></script>
	<script src="../../../vendor/typed-2.0.11/typed-2.0.11.js"></script>
	<script src="../../../vendor/vegas/vegas.min.js"></script>
	<script src="../../../vendor/wnumb/wNumb.min.js"></script>
	<script src="../../../vendor/wow/wow.js"></script>
	<script src="../../../vendor/language-switcher/jquery.polyglot.language.switcher.js"></script>
	<script src="../../../vendor/jarallax/jarallax.min.js"></script>
	<script src="../../../vendor/slick-slider/slick.js"></script>
	<script src="../../../vendor/jquery-circle-progress/jquery.circle-progress.min.js"></script>
	<script src="../../../vendor/progress-bar/knob.js"></script>

	<!-- Template js -->
	<script src="../../public/js/custom.js"></script>
</body>

</html>