<?php
include '../../../project/app/Controllers/Offre_Controller.php';
session_start(); // Start the session

if (isset($_POST['offre_id'])) {
    $offreId = $_POST['offre_id'];
    
    // Create an instance of the OffreController
    $offreController = new OffreController();
    
    // Use the readOffreById function to fetch the offer details
    $offre = $offreController->readOffreById($offreId);
    
    if ($offre) {
        // Display the offer details
        $offre['titre'];
        $offre['prix'];
        $offre['telephone'];
        $offre['image'];
        $offre['detail'];
        $offre['localisation'];

    } else {
        echo "Offer not found.";
    }
} else {
    echo "No offer ID provided.";
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="icon" href="images/favicon.png"/>
        <title>AgriGo</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="assets/css/style copy.css"/> 
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css"/>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/custom copy.js"></script>

        <!-- the head -->
        <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
        <link rel="stylesheet" href="assets/vendors/animate/custom-animate.css" />
        <link rel="stylesheet" href="assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
        <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
        <link rel="stylesheet" href="assets/vendors/bxslider/jquery.bxslider.css" />
        <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
        <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.min.css" />
        <link rel="stylesheet" href="assets/vendors/nice-select/nice-select.css" />
        <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
        <link rel="stylesheet" href="assets/vendors/nouislider/nouislider.pips.css" />
        <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css" />
        <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css" />
        <link rel="stylesheet" href="assets/vendors/timepicker/timePicker.css" />
        <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />
        <link rel="stylesheet" href="assets/vendors/vegas/vegas.min.css" />
        <link rel="stylesheet" href="assets/vendors/tiny-slider/tiny-slider.min.css" />
        <link rel="stylesheet" href="assets/vendors/thm-icons/style.css">
        <link rel="stylesheet" href="assets/vendors/slick-slider/slick.css">
        <link rel="stylesheet" href="assets/vendors/language-switcher/polyglot-language-switcher.css">
        <link rel="stylesheet" href="assets/vendors/reey-font/stylesheet.css">


        <style>
            /* Style the input field */
            #pac-input {
                margin-top: 10px;
                width: 300px;
                padding: 5px;
                font-size: 14px;
            }
        </style>




        <!-- loop -->
        <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
        <!-- template styles -->
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <link rel="stylesheet" href="assets/css/style-2.css" />

        <!-- the stoping loop -->
        <script src="assets/vendors/timepicker/timePicker.js"></script>
        <!-- Template js -->
        <script src="assets/js/custom.js"></script>
        <!-- qrcode lib -->
        <script src="https://cdn.jsdelivr.net/npm/qrcode-generator@1.4.4/qrcode.min.js"></script>
        <!-- the goe location*2 -->
        <script src="assets/js/geo1.js"></script>



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
    <div class="page-wrapper">
        <!--Start Main Header Two-->
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
                    style="background-image: url(assets/images/shapes/main-header-v2-bg.png);"></div>
                <div class="main-header-one__bottom-inner">
                    <nav class="main-menu main-menu-one">
                        <div class="main-menu__wrapper clearfix">
                            <div class="auto-container">
                                <div class="main-menu__wrapper-inner">
                                    <div class="main-header-one__bottom-left">
                                        <div class="logo-box-one">
                                            <a href="index.html">
                                                <img src="assets/images/resources/logo-2.png" alt="Awesome Logo"
                                                    title="">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="main-header-one__bottom-middle">
                                        <div class="main-menu-box">
                                            <a href="#" class="mobile-nav__toggler">
                                                <i class="fa fa-bars"></i>
                                            </a>

                                            <ul class="main-menu__list">
                                                <li class="dropdown current">
                                                    <a href="index.html">Home <span class="line"></span></a>
                                                    <ul>
                                                        <li>
                                                            <a href="index.html">Home One</a>
                                                        </li>
                                                        <li><a href="index-2.html">Home Two</a></li>
                                                        <li><a href="Store.php">Store</a></li>
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
                                                    <a href="contact.html">Contact <span class="line"></span></a>
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
                                            <a href="contact.html">Book Appointment</a>
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
        <!--End Main Header Two-->
        <div class="container" >
            <div class="row" id="search_manu" style="margin-left: 300px; margin-top: 50px">
                <div class="col-md-6 col-xs-12">
                    <form  name="quick_find">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" placeholder="Enter search keywords here" class="form-control input-lg" id="inputGroup"/>
                                <span class="input-group-addon">
                                    <a href="#" style="color:white">Search</a>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="site_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12 left_sidebar1">
                        <div id="left_part">
                            <div class="bs-example">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <div class="infoBoxHeading">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Categories</a>
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                    <i  id="accordan_plus" class="indicator glyphicon glyphicon-chevron-down  pull-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <div class="infoBoxContents">
                                                    <a href="product.html">Category One</a>&nbsp;(94)<br />
                                                    <a href="product.html">Category Two</a>&nbsp;(9)<br />
                                                    <a href="product.html">Category Three</a>&nbsp;(5)<br />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <script>
                            function toggleChevron(e) {
                                $(e.target)
                                        .prev('.panel-heading')
                                        .find("i.indicator")
                                        .toggleClass('glyphicon-chevron-down glyphicon-chevron-up');
                            }
                            $('#accordion').on('hidden.bs.collapse', toggleChevron);
                            $('#accordion').on('shown.bs.collapse', toggleChevron);
                        </script>

                    </div> 
                    <div class="col-md-9 col-sm-8 col-xs-12" id="content">            
                        <div class="breadcrumbs">
                            <a href="Store.php">Store</a>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="thumbnails">
                                    <li><a  href="#" class="thumbnail fix-box"><img class="changeimg" src="images/img21.jpg"></a></li>
                                    <li class="image-additional"><a title="Dianabol"  class="thumbnail"> 
                                            <img class="galleryimg" src="images/img21.jpg"></a></li>
                                    <li class="image-additional"><a title="Proviron"  class="thumbnail"> 
                                            <img class="galleryimg" src="images/img22.jpg"></a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <div class="btn-group">
                                    <button  title="" class="btn btn-default mr_5"  type="button"><i class="fa fa-heart"></i></button>
                                    <button  title="" class="btn btn-default"  type="button"><i class="fa fa-exchange"></i></button>
                                </div>
                                <h1 style="color: #39baf0"><?php echo $offre['titre']?></h1>
                                <ul class="list-unstyled product-section">
                                    <li><span>Availability:</span> <span class="check-stock">Pre-Order</span></li>
                                </ul>
                                <ul class="list-unstyled">
                                    <li>
                                        <h2><?php echo $offre['prix']?>DT</h2>
                                    </li>
                                    <div class="caption">
                                    <p>Details:</p>
                                    <p><?php echo $offre['detail']?></p>
                                    </div>
                                    <li>Localisation:</li>
                                    <li><?php echo $offre['localisation']?></li>
                                    <li>Type:</li>
                                    <li>
                                    <?php
                                        switch ($offre['categorie_id']) {
                                            case 1:
                                                echo 'Job';
                                                break;
                                            case 2:
                                                echo 'Lending';
                                                break;
                                            case 3:
                                                echo 'Produce';
                                                break;
                                            default:
                                                echo 'Unknown';
                                        }
                                    ?>
                                    </li>
                                </ul>

                                <div id="product">
                                    <div class="form-group">
                                        <label for="input-quantity" class="control-label">Qty</label>
                                        <input type="text" class="form-control" id="input-quantity" size="2" value="1" name="quantity">
                                        <!-- qrcode -->
                                        <div id="qrcode"></div>

                                        <br>
                                        <a class="btn btn-primary btn-lg btn-block reg_button" href="cart.html"><i class="fa fa-shopping-cart"></i> BUY NOW!</a>
                                    </div>
                                </div>
                                <div class="rating">
                                    <p>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
                                        <a  href="">0 reviews</a> / <a  href="">Write a review</a></p>
                                    <hr>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-destination">Where you need to go</a></li>
                                    <li><a data-toggle="tab" href="#tab-current-location">Your location</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-destination" class="tab-pane active">
                                        <div class="row">
                                            <input id="pac-input" type="text" placeholder="Search for a place" value="<?php echo htmlspecialchars($offre['localisation']); ?>">
                                            <div id="map-destination" style="height: 400px; width: 100%;"></div>
                                        </div>
                                    </div>
                                    <div id="tab-current-location" class="tab-pane">
                                        <div class="row">
                                            <div id="map-current" style="height: 400px; width: 100%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="rel-product">
                            <div class="infoBoxHeading">
                                <a>Related Product</a>
                            </div>
                            <div class="row product-layout_width">
                                <div class="product-layout col-md-4  col-sm-6 col-xs-12">
                                    <div class="product-thumb-height">
                                        <div class="product-thumb transition">
                                            <ul>

                                                <li class="li_product_image">
                                                    <div class="image">
                                                        <a href="single-product.html">
                                                            <img src="images/img16.jpg"  class="img-responsive" width="200" height="200" />		
                                                        </a>

                                                    </div>
                                                </li>
                                                <li class="li_product_price">
                                                    <span class="old_price1"></span>
                                                    <span class="new_price1">€159.00</span>
                                                    <span class="saving1"></span><li>
                                                <li class="li_product_desc">
                                                    <div class="caption">
                                                        <p>
                                                            Lorem Ipsum is simply dummy text of the printing
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="li_product_buy_button">
                                                    <a class="btn btn-default" id="but" href="cart.html" role="button" >
                                                        Buy Now!
                                                    </a>
                                                    <div class="pull-right">
                                                        <button  type="button" class="btn btn-primary wish_button"><i class="fa fa-heart"></i></button>
                                                        <button  type="button" class="btn btn-primary wish_button"><i class="fa fa-exchange"></i></button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-layout col-md-4  col-sm-6 col-xs-12">
                                    <div class="product-thumb-height">
                                        <div class="product-thumb transition">
                                            <ul>

                                                <li class="li_product_image">
                                                    <div class="image">
                                                        <a href="single-product.html">
                                                            <img src="images/d15.jpg"  class="img-responsive" width="200" height="200" />		
                                                        </a>

                                                    </div>
                                                </li>
                                                <li class="li_product_price">
                                                    <span class="old_price1"></span>
                                                    <span class="new_price1">€159.00</span>
                                                    <span class="saving1"></span><li>
                                                <li class="li_product_desc">
                                                    <div class="caption">
                                                        <p>
                                                            Lorem Ipsum is simply dummy text of the printing
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="li_product_buy_button">
                                                    <a class="btn btn-default" id="but" href="cart.html" role="button" >
                                                        Buy Now!
                                                    </a>
                                                    <div class="pull-right">
                                                        <button  type="button" class="btn btn-primary wish_button"><i class="fa fa-heart"></i></button>
                                                        <button  type="button" class="btn btn-primary wish_button"><i class="fa fa-exchange"></i></button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="product-layout col-md-4  col-sm-6 col-xs-12">
                                    <div class="product-thumb-height">
                                        <div class="product-thumb transition">
                                            <ul>

                                                <li class="li_product_image">
                                                    <div class="image">
                                                        <a href="single-product.html">
                                                            <img src="images/d1.jpg"  class="img-responsive" width="200" height="200" />		
                                                        </a>

                                                    </div>
                                                </li>
                                                <li class="li_product_price">
                                                    <span class="old_price1"></span>
                                                    <span class="new_price1">€134.00</span>
                                                    <span class="saving1"></span><li>
                                                <li class="li_product_desc">
                                                    <div class="caption">
                                                        <p>
                                                            Lorem Ipsum is simply dummy text of the printing
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="li_product_buy_button">
                                                    <a class="btn btn-default" id="but" href="cart.html" role="button" >
                                                        Buy Now!
                                                    </a>
                                                    <div class="pull-right">
                                                        <button  type="button" class="btn btn-primary wish_button"><i class="fa fa-heart"></i></button>
                                                        <button  type="button" class="btn btn-primary wish_button"><i class="fa fa-exchange"></i></button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!--Start Footer One -->
        <footer class="footer-one">
            <div class="footer-one__bg" style="background-image: url(assets/images/shapes/footer-v1-shape3.png);"></div>
            <div class="shape1 float-bob-y"><img src="assets/images/shapes/footer-v1-shape1.png" alt="#"></div>
            <div class="shape2 float-bob-y"><img src="assets/images/shapes/footer-v1-shape2.png" alt="#"></div>
            <!--Start Footer-->
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <!--Start Footer Widget Single-->
                        <div class="col-xl-5 col-lg-5  wow animated fadeInUp" data-wow-delay="0.1s">
                            <div class="footer-widget__single">
                                <div class="footer-widget__single-about">
                                    <div class="logo-box">
                                        <a href="index.html"><img src="assets/images/resources/footer-logo.png"
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
                                                <p> <a href="mailto:yourmail@email.com">needhelp@company.com</a>
                                                    <br> 80 Broklyn Road Street <br>
                                                    New York. USA</p>
                                                <a href=" mailto:yourmail@email.com">info@example.com</a>
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
        


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const offerData = {
                    titre: <?php echo json_encode($offre['titre']); ?>,
                    prix: <?php echo json_encode($offre['prix']); ?> + "DT",
                    detail: <?php echo json_encode($offre['detail']); ?>,
                    localisation: <?php echo json_encode($offre['localisation']); ?>,
                    categorie_id: <?php echo json_encode($offre['categorie_id']); ?>
                };

                function getCategoryType(categorie_id) {
                    switch (categorie_id) {
                        case 1:
                            return 'job';
                        case 2:
                            return 'lending';
                        case 3:
                            return 'produce';
                        default:
                            return 'unknown';
                    }
                }

                const categoryType = getCategoryType(offerData.categorie_id);

                const qrString = `titre:${offerData.titre}\nprix:${offerData.prix}\ndetail:${offerData.detail}\nlocalisation:${offerData.localisation}\ntype:${categoryType}`;

                const qr = qrcode(0, 'M');
                qr.addData(qrString);
                qr.make();

                document.getElementById('qrcode').innerHTML = qr.createImgTag(5);
            });
        </script>

        <!-- the api for goomaps -->
        <script async defer
            src="https://maps.gomaps.pro/maps/api/js?key=AlzaSyeYasnD_lrhV0y7QH7eE-n84BT-ZG7jp2z&libraries=geometry,places&callback=initMap">
        </script> 



    </body>
</html> 