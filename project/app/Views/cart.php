<?php
include '../Controllers/ProductController.php';
//? Include declaration part
include_once '../../../vendor/autoload.php';  // Load Composer autoload
include_once '../../conf/database.php';
include '../Helpers/custom.php';

// Initialize cart
$user_id = $_GET['id'] ?? $_POST['id'] ?? null;

// Verify if the user is suspended or not
is_suspend($user_id, 'Location: login.php');

//* Connect to the DB
$db = new Database('../../');

$usr_cart = $db->query("SELECT * FROM Cart WHERE Usr_ID = :usr_id", [
    'usr_id' => $user_id
]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="images/favicon.png" />
    <title>AgriGO || Cart</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/style copy.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <!-- Include jsPDF library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- the head -->
    <link rel="stylesheet" href="../../../vendor/animate/animate.min.css" />
    <link rel="stylesheet" href="../../../vendor/animate/custom-animate.css" />
    <link rel="stylesheet" href="../../../vendor/bootstrap-select/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="../../../vendor/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../vendor/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="../../../vendor/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="../../../vendor/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="../../../vendor/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="../../../vendor/nouislider/nouislider.min.css" />
    <link rel="stylesheet" href="../../../vendor/nice-select/nice-select.css" />
    <link rel="stylesheet" href="../../../vendor/odometer/odometer.min.css" />
    <link rel="stylesheet" href="../../../vendor/nouislider/nouislider.pips.css" />
    <link rel="stylesheet" href="../../../vendor/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="../../../vendor/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="../../../vendor/timepicker/timePicker.css" />
    <link rel="stylesheet" href="../../../vendor/swiper/swiper.min.css" />
    <link rel="stylesheet" href="../../../vendor/vegas/vegas.min.css" />
    <link rel="stylesheet" href="../../../vendor/tiny-slider/tiny-slider.min.css" />
    <link rel="stylesheet" href="../../../vendor/thm-icons/style.css">
    <link rel="stylesheet" href="../../../vendor/slick-slider/slick.css">
    <link rel="stylesheet" href="../../../vendor/language-switcher/polyglot-language-switcher.css">
    <link rel="stylesheet" href="../../../vendor/reey-font/stylesheet.css">


    <!-- loop -->
    <link rel="stylesheet" href="../../../vendor/bootstrap/css/bootstrap.min.css" />
    <!-- template styles -->
    <link rel="stylesheet" href="../../public/css/style.css" />
    <link rel="stylesheet" href="../../public/css/responsive.css" />
    <link rel="stylesheet" href="../../public/css/style-2.css" />

    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <script src="../../public/js/custom copy.js"></script>

    <!-- the stoping loop -->
    <script src="../../../vendor/timepicker/timePicker.js"></script>
    <!-- Template js -->
    <script src="../../public/js/custom.js"></script>

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

    <!-- head -->
    <header class="main-header main-header-one main-header-two">
        <!--Start Main Header Two Top-->
        <div class="main-header-two__top">
            <div class="auto-container">
                <div class="main-header-two__top-inner">
                    <div class="main-header-two__top-left">
                        <ul class="main-header-two__top-contact-info">
                            <li>
                                <div class="inner">
                                    <div class="icon-box">
                                        <span class="icon-back-in-time"></span>
                                    </div>
                                    <div class="text-box">
                                        <p>Delivery time</p>
                                        <h6>Mon-Sun:8:00-22:00</h6>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="inner">
                                    <div class="icon-box">
                                        <span class="icon-phone-call-1"></span>
                                    </div>
                                    <div class="text-box">
                                        <p>Call anytime </p>
                                        <h6><a href="tel:980009630">+216 78 909 876</a></h6>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="inner">
                                    <div class="icon-box">
                                        <span class="icon-message"></span>
                                    </div>
                                    <div class="text-box">
                                        <p>Send email </p>
                                        <h6><a href="mailto:AgriGO@email.com">AgriGO@company.com</a></h6>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="inner">
                                    <div class="icon-box">
                                        <span class="icon-placeholder"></span>
                                    </div>
                                    <div class="text-box">
                                        <p> 37 St Nahj Haj</p>
                                        <h6>Ariana, Tunis</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="main-header-two__top-social-links">
                        <div class="title-box">
                            <h4>Follow Now</h4>
                        </div>

                        <ul class="social-links">
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-pinterest"></span></a></li>
                            <li><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Main Header Two Top-->

        <!--Start Main Header One Bottom-->
        <div class="main-header-one__bottom">
            <div class="main-header-two__bottom-bg"
                style="background-image: url(../../public/assets/imgs/shapes/main-header-v2-bg.png);"></div>
            <div class="main-header-one__bottom-inner">
                <nav class="main-menu main-menu-one">
                    <div class="main-menu__wrapper clearfix">
                        <div class="auto-container">
                            <div class="main-menu__wrapper-inner">
                                <div class="main-header-one__bottom-left">
                                    <a href="index.php?id=<?php echo $user_id; ?>">
                                        <img src="../../public/assets/imgs/favicons/favicon-16x16.png" alt="logo.png"
                                            title="AgriGO" width="100">
                                    </a>
                                </div>
                                <div class="main-header-one__bottom-middle">
                                    <div class="main-menu-box">
                                        <a href="#" class="mobile-nav__toggler">
                                            <i class="fa fa-bars"></i>
                                        </a>

                                        <ul class="main-menu__list">
                                            <li class="dropdown current">
                                                <a href="index.php?id=<?php echo $user_id; ?>">Home <span
                                                        class="line"></span></a>
                                                <ul>
                                                    <li>
                                                        <a href="index.html">Home One</a>
                                                    </li>
                                                    <li><a href="index-2.html">Home Two</a></li>
                                                    <li><a href="Store.php?id=<?php echo $user_id; ?>">Store</a></li>
                                                    <li class="dropdown">
                                                        <a href="#">Header Styles</a>
                                                        <ul>
                                                            <li><a href="index.html">Header One</a></li>
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
                                                    <li><a href="portfolio-2.html">Portfolio 02</a>
                                                    <li><a href="faq.html">Faq</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="dropdown">
                                                <a href="#">Blog <span class="line"></span></a>
                                                <ul>
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                                    <li><a href="blog-details.html">Blog Details</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="contact.php?id=<?php echo $user_id; ?>">Contact <span
                                                        class="line"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="main-header-one__bottom-right">
                                    <div class="header-search-box">
                                        <a href="#" class="main-menu__search search-toggler icon-magnifying-glass">
                                        </a>
                                    </div>
                                    <div class="main-header-one__bottom-right-btn">
                                        <a href="Store.php?id=<?php echo $user_id; ?>"><i class='fa fa-shopping-cart'>
                                                Cart</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!--End Main Header Two Bottom-->
    </header>
    <!--End Main Header One-->

    <div class="main-content">
        <div class="container cart-block-style">
            <div class="breadcrumbs">
                <a href="home.html"><i class="fa fa-home"></i></a>
                <a href="#">Shopping Cart</a>
            </div>
            <div class="contentText">
                <h1>Shopping Cart
                </h1>
            </div>
            <div class="table-responsive margin-top">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center"></td>
                            <td class="text-left">PRODUCT NAME</td>
                            <td class="text-left">DESCRIPTION</td>
                            <td class="text-left">QUANTITY</td>
                            <td class="text-right">UNIT PRICE</td>
                            <td class="text-right">TOTAL</td>
                        </tr>
                    </thead>
                    <?php cart_table($usr_cart, $user_id) ?>
                </table>
            </div>
            <button id="generateReceipt" class="btn btn-primary">Download the facture</button>
        </div>
    </div>

    <!--Start Footer One -->
    <footer class="footer-one">
        <div class="footer-one__bg"
            style="background-image: url(../../public/assets/imgs/shapes/footer-v1-shape3.png);"></div>
        <div class="shape1 float-bob-y"><img src="../../public/assets/imgs/shapes/footer-v1-shape1.png" alt="#"></div>
        <div class="shape2 float-bob-y"><img src="../../public/assets/imgs/shapes/footer-v1-shape2.png" alt="#"></div>
        <!--Start Footer-->
        <div class="footer">
            <div class="container">
                <div class="row">
                    <!--Start Footer Widget Single-->
                    <div class="col-xl-5 col-lg-5  wow animated fadeInUp" data-wow-delay="0.1s">
                        <div class="footer-widget__single">
                            <div class="footer-widget__single-about">
                                <div class="logo-box">
                                    <a href="index.html"><img src="../../public/assets/imgs/resources/footer-logo.png"
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
                                                <li><a href="services.html">Lawn Moving</a></li>
                                                <li><a href="services.html">Hedge Cutting</a></li>
                                                <li><a href="services.html">Flower Planting</a></li>
                                                <li><a href="services.html">Working Process</a></li>
                                                <li><a href="services.html">Garden Restoration</a></li>
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
                                                <li><a href="contact.php?id=<?php echo $user_id; ?>">Contact
                                                        Us</a></li>
                                                <li><a href="#">Our History</a></li>
                                                <li><a href="addReport.php?id=<?php echo $user_id; ?>">Repport</a>
                                                </li>
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
                                            <p> <a href="mailto:agrigo999@gmail.com">agrigo999@gmail.com</a>
                                                <br> Ariana <br>
                                                Arian Soghra
                                            </p>
                                            <a href=" mailto:agrigo999@gmail.com">info@example.com</a>
                                        </div>
                                    </div>
                                </div>
                                <!--End Footer One Right Single-->
                            </div>

                            <div class="footer-one__right-bottom wow animated fadeInUp" data-wow-delay="0.1s">
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
                                        <h4><a href="tel:21693490909">+216 ( 9349 ) - 0909</a></h4>
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

    <a style="display: none" href="javascript:void(0);" class="scrollTop back-to-top" id="back-to-top">
        <i class="fa fa-chevron-up"></i>
    </a>

    <!-- the stoping loop -->
    <script src="../../../vendor/timepicker/timePicker.js"></script>
    <!-- Template js -->
    <script src="../../public/js/custom.js"></script>
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

    <!-- JavaScript for generating the PDF receipt -->
    <script>
        document.getElementById("generateReceipt").addEventListener("click", function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            const panierData = <?php echo json_encode($panier); ?>;
            const produitsData = <?php echo json_encode($produits); ?>;
            const totalAmount = "<?php echo $total; ?>";

            doc.text("Facture de commande", 15, 15);
            let yPosition = 25;

            doc.text(`
                    - Commande:${produit.libelle}
                    - Quantité: ${qty} 
                    - Prix Unitaire: ${produit.prix} 
                    - Total: ${productTotal} $`, 5, yPosition + 5 * (index + 1));
            doc.save("receipt.pdf");
        });
    </script>
</body>

</html>