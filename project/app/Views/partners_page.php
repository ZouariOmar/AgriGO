<?php
//? Include declaration part
include_once '../../../vendor/autoload.php';
include '../Helpers/custom.php';

// Initialize cart
$user_id = $_GET['id'] ?? $_POST['id'] ?? null;

// Verify if the user is suspended or not
is_suspend($user_id, 'Location: login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="AgriGO partner page " />
    <title>AGRIGO || Partners</title>

    <!-- Favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../../public/assets/imgs/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../../public/assets/imgs/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../../public/assets/imgs/favicons/favicon-16x16.png" />
    <link rel="manifest" href="../../public/assets/imgs/favicons/site.webmanifest" />

    <!-- fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

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
    <link rel="stylesheet" href="../../../vendor/thm-icons/style.css">
    <link rel="stylesheet" href="../../../vendor/slick-slider/slick.css">
    <link rel="stylesheet" href="../../../vendor/language-switcher/polyglot-language-switcher.css">
    <link rel="stylesheet" href="../../../vendor/reey-font/stylesheet.css">

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
                        <span data-text-preloader="A" class="letters-loading">
                            A
                        </span>
                        <span data-text-preloader="G" class="letters-loading">
                            G
                        </span>
                        <span data-text-preloader="R" class="letters-loading">
                            R
                        </span>
                        <span data-text-preloader="I" class="letters-loading">
                            I
                        </span>
                        <span data-text-preloader="G" class="letters-loading">
                            G
                        </span>
                        <span data-text-preloader="O" class="letters-loading">
                            O
                        </span>
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
                                                    <li><a href="arbor-management.html">Arbor Management</a>
                                                    </li>
                                                    <li><a href="garden-management.html">Garden Management</a>
                                                    </li>
                                                    <li><a href="nursery.html">Nursery & Tree Farm</a>
                                                    </li>
                                                    <li><a href="trimming.html">Trimming & Pruning</a>
                                                    </li>
                                                    <li><a href="weeds-control.html">Pests & Weeds Control</a>
                                                    </li>
                                                    <li><a href="flowers-garden.html">Fruits & Flowers Garden</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a href="#">Pages <span class="line"></span></a>
                                                <ul>
                                                    <li><a href="team.html">Team</a></li>
                                                    <li><a href="team-details.html">Team Details</a></li>
                                                    <li><a href="portfolio-1.html">Portfolio 01</a></li>
                                                    <li><a href="partners_page.php?id=<?php echo $user_id; ?>">Our Partners</a>
                                                    <li><a href="faq.html">Faq</a>
                                                    </li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="main-header-three__middle">
                                    <div class="logo-box-one">
                                        <a href="index.php?id=<?php echo $user_id; ?>">
                                            <img src="../../public/assets/imgs/resources/logo-3.png" alt="Awesome Logo" title="">
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
                                            <a href="tel:9288006780">+92 ( 8800 ) - 6780</a>
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
                                                <p>We do not received <br> extra charges </p>
                                            </div>
                                        </div>

                                        <div class="btn-box">
                                            <a href="contact.html">Book Appointment</a>
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
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->


        <!--Start Page Header-->
        <section class="page-header">
            <div class="page-header__bg" style="background-image: url(../../public/assets/imgs/backgrounds/agrigr.jpg)">
            </div>
            <div class="shape1">
                <img src="../../public/assets/imgs/shapes/page-header-shape1.png" alt="#">
            </div>

            <div class="container">
                <div class="page-header__inner">
                    <h2>Partners</h2>
                    <ul class="thm-breadcrumb">
                        <li><a href="index.php?id=<?php echo $user_id; ?>">Home</a></li>
                        <li><span>-</span></li>
                        <li>Partner</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Header-->


        <!--Start Partner Page-->
        <section class="Partner-page">
            <div class="container">
                <div class="row">
                    <!--Start Partner Page Content-->
                    <div class="col-xl-8">
                        <div class="Partner-page__content">

                            <!--Start Partner-page Single-->
                            <div class="Partner-page__single">
                                <div class="Partner-page__single-img">
                                    <div class="inner">
                                        <img src="../../public/assets/imgs/blog/blog-page-img1.jpg" alt="#">
                                    </div>

                                </div>

                                <div class="Partner-page__single-content">
                                    <ul class="meta-box">
                                        <li>
                                            <a href="#"><i class="fa fa-user"></i>Jason Smith</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-comments"></i> contact@greenfields.com</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-heart"></i>+21645678902</a>
                                        </li>
                                    </ul>

                                    <h2><a href="search-details.html">Who they are</a>
                                    </h2>
                                    <p class="text1">Greenfields is a flourishing, Gloucester based, second generation
                                        family business, which is dedicated to creating nurturing, thriving outdoor
                                        spaces for our local communities and homes. </p>

                                </div>
                            </div>
                            <!--End Partner-page Single-->

                            <!--Start Partner-page Single-->
                            <div class="Partner-page__single">
                                <div class="Partner-page__single-img">
                                    <div class="inner">
                                        <img src="../../public/assets/imgs/blog/blog-page-img2.jpg" alt="#">
                                    </div>

                                </div>

                                <div class="Partner-page__single-content">
                                    <ul class="meta-box">
                                        <li>
                                            <a href="#"><i class="fa fa-user"></i>Jason Smith</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-comments"></i> info@agrotech.com</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-heart"></i>+21676543210</a>
                                        </li>
                                    </ul>

                                    <h2><a href="search-details.html">Who they are</a>
                                    </h2>
                                    <p class="text1">Our primary focus is to drive sustainable practices in the Oil
                                        Palm Industry. With the recent announcement of capping the oil palm plantation
                                        hectarage, plantations and mills need to explore profitable sustainable
                                        practices
                                        to allowed for higher FFB yield per hectare without requiring a further
                                        expansion to their landbank. </p>

                                    <p class="text2">As such, our team is dedicated in assisting clients in achieving
                                        these goals through implementation
                                        of green and sustainable technologies to ensure clients benefit from such green
                                        initiatives. Our cost effective
                                        technologies are testament to our commitment to provide the best for our
                                        clients. </p>

                                    <div class="btn-box">
                                        <a href="search-details.html">Read more</a>
                                    </div>

                                </div>
                            </div>
                            <!--End Partner-page Single-->

                            <!--Start Partner-page Single-->
                            <div class="Partner-page__single">
                                <div class="Partner-page__single-img">
                                    <div class="inner">
                                        <img src="../../public/assets/imgs/blog/blog-page-img3.jpg" alt="#">
                                    </div>

                                </div>

                                <div class="Partner-page__single-content">
                                    <ul class="meta-box">
                                        <li>
                                            <a href="#"><i class="fa fa-user"></i>Jason Smith</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-comments"></i>hello@localharvest.com</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-heart"></i>+21622334455</a>
                                        </li>
                                    </ul>

                                    <h2><a href="search-details.html">Who they are</a>
                                    </h2>
                                    <p class="text1">Eating locally benefits the environment, your health, farmers and
                                        your community... </p>

                                    <p class="text2">Local food, or food grown with love or cooked with pride and
                                        idealism, doesn't just
                                        keep you alive; it keeps you in contact with the earth, the seasons, and your
                                        community. It creates
                                        a web of friendship. Most of all, perhaps, it makes you deeply happy - sharing
                                        food, loving how it tastes,
                                        every mouthful with a story of fulfilment behind it. </p>

                                    <div class="btn-box">
                                        <a href="search-details.html">Read more</a>
                                    </div>

                                </div>
                            </div>
                            <!--End Partner-page Single-->
                        </div>
                    </div>
                    <!--End Partner-page Content-->

                    <!--Start Sidebar-->
                    <div class="col-xl-4">
                        <div class="sidebar">
                            <!--Start Sidebar Single-->
                            <div class="sidebar__single sidebar__search">
                                <form action="#" class="sidebar__search-form">
                                    <input type="search" placeholder="Search...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!--End Sidebar Single-->



                            <!--Start Sidebar Single-->
                            <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">Other partners</h3>
                                <div class="sidebar__post-box">
                                    <div class="sidebar__post-single">
                                        <div class="sidebar-post__img">
                                            <img src="../../public/assets/imgs/blog/blog-page-img4.jpg" alt="#">
                                        </div>
                                        <div class="sidebar__post-content-box">
                                            <h3><a href="blog-details.html">Organic Growers Union</a></h3>
                                        </div>
                                    </div>

                                    <div class="sidebar__post-single">
                                        <div class="sidebar-post__img">
                                            <img src="../../public/assets/imgs/blog/blog-page-img5.jpg" alt="#">
                                        </div>
                                        <div class="sidebar__post-content-box">
                                            <h3><a href="search-details.html">FreshFarm Partners</a></h3>
                                        </div>
                                    </div>

                                    <div class="sidebar__post-single">
                                        <div class="sidebar-post__img">
                                            <img src="../../public/assets/imgs/blog/blog-page-img6.jpg" alt="#">
                                        </div>
                                        <div class="sidebar__post-content-box">
                                            <h3><a href="search-details.html">esprit</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Sidebar Single-->

                        </div>
                    </div>
                    <!--End Sidebar-->

                </div>
            </div>
        </section>
        <!--End Blog Page-->

        <!--Start Footer One -->
        <footer class="footer-one footer-one--two">
            <div class="footer-one__bg" style="background-image: url(../../public/assets/imgs/shapes/footer-v1-shape3.png);"></div>
            <div class="shape1 float-bob-y"><img src="../../public/assets/imgs/shapes/footer-v1-shape1.png" alt="#"></div>
            <div class="shape2 float-bob-y"><img src="../../public/assets/imgs/shapes/footer-v1-shape2.png" alt="#"></div>
            <!--Start Footer-->
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <!--Start Footer Widget Single-->
                        <div class="col-xl-5 col-lg-5 wow animated fadeInUp" data-wow-delay="0.1s">
                            <div class="footer-widget__single">
                                <div class="footer-widget__single-about">
                                    <div class="logo-box">
                                        <a href="index.php?id=<?php echo $user_id; ?>"><img src="../../public/assets/imgs/resources/footer-logo.png"
                                                alt="#"></a>
                                    </div>

                                    <form class="footer-widget__subscribe-box">
                                        <div class="title-box">
                                            <h5>Subsrcibe for Latest Articles and Resources</h5>
                                        </div>
                                        <div class="footer-widget__subscribe-input-box">
                                            <input type="email" placeholder="Email Address" name="email">
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
                                                    <li><a href="#">Lawn Moving</a></li>
                                                    <li><a href="#">Hedge Cutting</a></li>
                                                    <li><a href="#">Flower Planting</a></li>
                                                    <li><a href="#">Working Process</a></li>
                                                    <li><a href="#">Garden Restoration</a></li>
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
                                                <p><a href="mailto:yourmail@email.com">needhelp@company.com</a> <br> 80
                                                    Broklyn Road Street <br>
                                                    New York. USA</p>
                                                <a href="mailto:yourmail@email.com">info@example.com</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End Footer One Right Single-->
                                </div>

                                <div class="footer-one__right-bottom wow animated fadeInUp" data-wow-delay="0.5s">
                                    <ul class="social-links">
                                        <li> <a href="#"><span class="icon-twitter"></span></a> </li>
                                        <li> <a href="#"><span class="icon-facebook"></span></a> </li>
                                        <li> <a href="#"><span class="icon-pinterest"></span></a> </li>
                                        <li> <a href="#"><span class="icon-instagram"></span></a> </li>
                                    </ul>

                                    <div class="footer-one__right-bottom-contact">
                                        <div class="icon-box">
                                            <span class="icon-phone-call"></span>
                                        </div>
                                        <div class="content-box">
                                            <p>Call Anytime</p>
                                            <h4><a href="tel:9288006780">+92 ( 8800 ) - 6780</a></h4>
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