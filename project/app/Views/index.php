<?php
//? Include declaration part
include '../Helpers/custom.php';

// Fetch data from url
$user_id = $_GET['id'];

// Verify if the user is suspended or not
is_suspend($user_id, 'Location: login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AgriGO || Home</title>
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
    <!--Start Main Header One-->
    <header class="main-header main-header-one">
      <!--Start Main Header One Top-->
      <div class="main-header-one__top">
        <div class="auto-container">
          <div class="main-header-one__top-inner">

            <div class="main-header-one__top-left">
              <ul class="main-header__contact-info">
                <li>
                  <div class="inner">
                    <div class="icon-box">
                      <span class="icon-time"></span>
                    </div>
                    <div class="text-box">
                      <p>Mon to Sat: 09:00 am to 05:00 pm</p>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="inner">
                    <div class="icon-box">
                      <span class="icon-email"></span>
                    </div>
                    <div class="text-box">
                      <p>
                        <igo href="mailto:agrigo999@gmail.com">agrigo999@gmail.com</igo>
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>


            <div class="main-header-one__top-right">
              <div class="main-header-one__top-menu">
                <ul class="main-header-one__top-menu-list">
                  <li><a href="#">Our Faqs </a></li>
                  <li><a href="#">Pricing </a></li>
                  <li><a href="#">Contact </a></li>
                </ul>
              </div>

              <ul class="main-header-one__top-social-links">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!--End Main Header One Top-->

      <!--Start Main Header One Bottom-->
      <div class="main-header-one__bottom">
        <div class="main-header-one__bottom-inner">
          <nav class="main-menu main-menu-one">
            <div class="main-menu__wrapper clearfix">
              <div class="auto-container">
                <div class="main-menu__wrapper-inner">
                  <div class="main-header-one__bottom-left">
                    <a href="index.php?id=<?php echo $user_id; ?>">
                      <img src="../../public/assets/imgs/favicons/favicon-16x16.png" alt="logo.png" title="AgriGO"
                        width="100">
                    </a>
                  </div>

                  <div class="main-header-one__bottom-middle">
                    <div class="main-menu-box">
                      <a href="#" class="mobile-nav__toggler">
                        <i class="fa fa-bars"></i>
                      </a>

                      <ul class="main-menu__list">
                        <li class="dropdown current">
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

                        <li class="dropdown">
                          <a href="#">Blog <span class="line"></span></a>
                          <ul>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-grid.html">Blog Grid</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                          </ul>
                        </li>
                        <li>
                          <a href="contact.php?id=<?php echo $user_id; ?>">Contact <span class="line"></span></a>
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
                      <a href="Store.php?id=<?php echo $user_id; ?>">Store</a>
                    </div>

                    <div class="contact-box">
                      <div class="icon">
                        <span class="icon-chatting"></span>
                      </div>
                      <div class="text">
                        <p>Call Anytime</p>
                        <a href="tel:21693490909">+216 9349 0909</a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </nav>
        </div>
      </div>
      <!--End Main Header One Bottom-->
    </header>
    <!--End Main Header One-->

    <div class="stricky-header stricky-header--one stricked-menu main-menu">
      <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->


    <!--Start Main Slider -->
    <section class="main-slider main-slider-one">
      <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
        <div class="swiper-wrapper">


          <!--Start Main Slider One-->
          <div class="swiper-slide">
            <div class="image-layer" style="background-image:url(../../public/assets/imgs/slides/slider-v1-img1.jpg)">
            </div>
            <div class="shape1"><img class="float-bob-y" src="../../public/assets/imgs/shapes/slider-v1-shape1.png"
                alt="#"></div>
            <div class="shape2"><img src="../../public/assets/imgs/shapes/slider-v1-shape2.png" alt="#"></div>

            <div class="main-slider-two__outer-content">
              <div class="social-links">
                <ul>
                  <li>
                    <a href="#">Facebook</a>
                  </li>

                  <li>
                    <a href="#">Instagram</a>
                  </li>

                  <li>
                    <a href="#">Twitter</a>
                  </li>

                  <li>
                    <a href="#">Pinterest</a>
                  </li>
                </ul>
              </div>

              <div class="date-box">
                <p>mon - fri <span> 9am - 7pm</span></p>
              </div>
            </div>

            <div class="container">
              <div class="main-slider-one__content">
                <div class="title">
                  <h2>Hight Quality <br> & Landscape <br> Solutions</h2>
                </div>
                <div class="btn-box">
                  <a class="thm-btn" href="contact.php?id=<?php echo $user_id; ?>">
                    <span class="txt">Discover more</span>
                    <i class="fa fa-angle-double-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--End Main Slider One-->

          <!--Start Main Slider One-->
          <div class="swiper-slide">
            <div class="image-layer" style="background-image:url(../../public/assets/imgs/slides/slider-v1-img2.jpg)">
            </div>
            <div class="shape1"><img class="float-bob-y" src="../../public/assets/imgs/shapes/slider-v1-shape1.png"
                alt="#"></div>
            <div class="shape2"><img src="../../public/assets/imgs/shapes/slider-v1-shape2.png" alt="#"></div>

            <div class="main-slider-two__outer-content">
              <div class="social-links">
                <ul>
                  <li>
                    <a href="#">Facebook</a>
                  </li>

                  <li>
                    <a href="#">Instagram</a>
                  </li>

                  <li>
                    <a href="#">Twitter</a>
                  </li>

                  <li>
                    <a href="#">Pinterest</a>
                  </li>
                </ul>
              </div>

              <div class="date-box">
                <p>mon - fri <span> 9am - 7pm</span></p>
              </div>
            </div>

            <div class="container">
              <div class="main-slider-one__content">
                <div class="title">
                  <h2>Qulity Sod <br> & Landscape <br> Solutions</h2>
                </div>
                <div class="btn-box">
                  <a class="thm-btn" href="contact.php?id=<?php echo $user_id; ?>">
                    <span class="txt">Discover more</span>
                    <i class="fa fa-angle-double-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--End Main Slider One-->

          <!--Start Main Slider One-->
          <div class="swiper-slide">
            <div class="image-layer" style="background-image:url(../../public/assets/imgs/slides/slider-v1-img3.jpg)">
            </div>
            <div class="shape1"><img class="float-bob-y" src="../../public/assets/imgs/shapes/slider-v1-shape1.png"
                alt="#"></div>
            <div class="shape2"><img src="../../public/assets/imgs/shapes/slider-v1-shape2.png" alt="#"></div>

            <div class="main-slider-two__outer-content">
              <div class="social-links">
                <ul>
                  <li>
                    <a href="#">Facebook</a>
                  </li>

                  <li>
                    <a href="#">Instagram</a>
                  </li>

                  <li>
                    <a href="#">Twitter</a>
                  </li>

                  <li>
                    <a href="#">Pinterest</a>
                  </li>
                </ul>
              </div>

              <div class="date-box">
                <p>mon - fri <span> 9am - 7pm</span></p>
              </div>
            </div>

            <div class="container">
              <div class="main-slider-one__content">
                <div class="title">
                  <h2>Qulity Sod <br> & Landscape <br> Solutions</h2>
                </div>
                <div class="btn-box">
                  <a class="thm-btn" href="contact.php?id=<?php echo $user_id; ?>">
                    <span class="txt">Discover more</span>
                    <i class="fa fa-angle-double-right"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--End Main Slider One-->

        </div>

        <!-- If we need navigation buttons -->
        <div class="main-slider__nav">
          <div class="swiper-button-prev" id="main-slider__swiper-button-next">
            <i class="icon-left-arrow"></i>
          </div>
          <div class="swiper-button-next" id="main-slider__swiper-button-prev">
            <i class="icon-right-arrow"></i>
          </div>
        </div>

      </div>
    </section>
    <!--End Main Slider-->


    <!--Start Why Choose One -->
    <section class="why-choose-one">
      <div class="shape1"></div>
      <div class="shape2"><img src="../../public/assets/imgs/shapes/why-choose-v1-shape1.png" alt="#"></div>
      <div class="shape3"><img src="../../public/assets/imgs/shapes/why-choose-v1-shape2.png" alt="#"></div>
      <div class="why-choose-one__bg"
        style="background-image: url(../../public/assets/imgs/pattern/why-choose-v1-pattern.png);">
      </div>
      <div class="container">
        <div class="sec-title text-center">
          <div class="sec-title__tagline">
            <span class="left"></span>
            <h6>People love</h6>
            <span class="right"></span>
          </div>
          <h2 class="sec-title__title">Why Choose Us?</h2>
        </div>

        <div class="row">
          <div class="col-xl-12">
            <div class="why-choose-one__inner">
              <div class="why-choose-one__tab-box tabs-box">

                <div class="row filter-layout masonary-layout">
                  <!--Start Why Choose One Tab Button-->
                  <div class="col-xl-4">
                    <ul class="tab-buttons clearfix list-unstyled">
                      <li data-tab="#services" class="tab-btn wow fadeInLeft" data-wow-delay="100ms"
                        data-wow-duration="1000ms">Guarantee Services
                      </li>
                      <li data-tab="#environmental" class="tab-btn active-btn wow fadeInLeft" data-wow-delay="200ms"
                        data-wow-duration="1000ms">Environmental
                        Friendly</li>
                      <li data-tab="#support" class="tab-btn wow fadeInLeft" data-wow-delay="300ms"
                        data-wow-duration="1000ms">Expert Support Team
                      </li>
                    </ul>
                  </div>
                  <!--Start Why Choose One Tab Button-->


                  <!--Start Why Choose One Tab Content-->
                  <div class="col-xl-8">
                    <div class="tabs-content">

                      <!--Start Tab-->
                      <div class="tab" id="services">
                        <div class="tabs-content__inner">
                          <div class="tabs-content__inner-bg"
                            style="background-image: url(../../public/assets/imgs/resources/why-choose-v1-img1.jpg);">
                          </div>
                          <div class="tabs-content__list clearfix">
                            <ul class="clearfix">
                              <li>
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-gardening"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Gardening <br>
                                      Design</a></h4>
                                </div>
                              </li>

                              <li class="mt30">
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-farmer"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Available <br>
                                      24/7</a></h4>
                                </div>
                              </li>

                              <li>
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-shovels"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Experience <br>
                                      of 20 year</a></h4>
                                </div>
                              </li>

                              <li class="mt30">
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-pruning-shears"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Experts <br>
                                      Worker</a></h4>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <!--End Tab-->

                      <!--Start Tab-->
                      <div class="tab active-tab" id="environmental">
                        <div class="tabs-content__inner">
                          <div class="tabs-content__inner-bg"
                            style="background-image: url(../../public/assets/imgs/resources/why-choose-v1-img1.jpg);">
                          </div>
                          <div class="tabs-content__list clearfix">
                            <ul class="clearfix">
                              <li>
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-gardening"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Gardening <br>
                                      Design</a></h4>
                                </div>
                              </li>

                              <li class="mt30">
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-farmer"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Available <br>
                                      24/7</a></h4>
                                </div>
                              </li>

                              <li>
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-shovels"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Experience <br>
                                      of 20 year</a></h4>
                                </div>
                              </li>

                              <li class="mt30">
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-pruning-shears"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Experts <br>
                                      Worker</a></h4>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <!--End Tab-->

                      <!--Start Tab-->
                      <div class="tab" id="support">
                        <div class="tabs-content__inner">
                          <div class="tabs-content__inner-bg"
                            style="background-image: url(../../public/assets/imgs/resources/why-choose-v1-img1.jpg);">
                          </div>
                          <div class="tabs-content__list clearfix">
                            <ul class="clearfix">
                              <li>
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-gardening"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Gardening <br>
                                      Design</a></h4>
                                </div>
                              </li>

                              <li class="mt30">
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-farmer"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Available <br>
                                      24/7</a></h4>
                                </div>
                              </li>

                              <li>
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-shovels"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Experience <br>
                                      of 20 year</a></h4>
                                </div>
                              </li>

                              <li class="mt30">
                                <div class="inner text-center">
                                  <div class="icon-box">
                                    <span class="icon-pruning-shears"></span>
                                  </div>
                                  <h4><a href="arbor-management.html">Experts <br>
                                      Worker</a></h4>
                                </div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <!--End Tab-->

                    </div>
                  </div>
                  <!--End Why Choose One Tab Content-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Why Choose One -->

    <!--Start About One -->
    <section class="about-one">
      <div class="shape1 float-bob-y"><img src="../../public/assets/imgs/shapes/about-v1-shape1.png" alt="#"></div>
      <div class="shape2 float-bob-y"><img src="../../public/assets/imgs/shapes/about-v1-shape2.png" alt="#"></div>
      <div class="shape3"></div>
      <div class="about-one__bg" style="background-image: url(../../public/assets/imgs/about/about-v1-img1.png);">
        <div class="about-one__bg-content">
          <div class="img-box">
            <div class="inner">
              <img src="../../public/assets/imgs/about/about-v1-img3.jpg" alt="#">
            </div>
            <div class="content-box">
              <div class="icon-box">
                <span class="icon-butterflies"></span>
              </div>

              <div class="text-box">
                <h2>Cash flow <br> management</h2>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-xl-6"></div>
          <!--Start About One Content-->
          <div class="col-xl-6">
            <div class="about-one__content">
              <div class="sec-title">
                <div class="sec-title__tagline">
                  <h6>About Us </h6>
                  <span class="right"></span>
                </div>
                <h2 class="sec-title__title">Grow Your Garden And <br> Your Health</h2>
              </div>

              <div class="about-one__content-text1">
                <p class="text1">Ut enim ad minim veniam, quis nostrud exercitation ullamla
                  ut aliquip ex ea commodo consequat</p>
                <p class="text2">Sapien nunced amet sit ipsum velit purus aliq massa fringilla leo.
                  Lorem ipsum is simply free text dolor sit am adipi we help you ensure
                  everyTincidunt elit magnis nulla facilisis sagittis maecenas. </p>
              </div>

              <div class="about-one__content-text2">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="about-one__content-text2-single">
                      <h3> <span class="icon-confirmation"></span> Pruning Plants</h3>
                      <p>Lorem ipsum dolor sit ame sedme consectetur nod.</p>
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="about-one__content-text2-single">
                      <h3> <span class="icon-confirmation"></span> Lawn Maintenance</h3>
                      <p>Lorem ipsum dolor sit ame sedme consectetur nod.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="about-one__content-bottom">
                <div class="btn-box">
                  <a class="thm-btn" href="about.html">
                    <span class="txt">Discover more</span>
                    <i class="fa fa-angle-double-right"></i>
                  </a>
                </div>

                <div class="client-info">
                  <div class="img-box">
                    <img src="../../public/assets/imgs/about/about-v1-img2.jpg" alt="#">
                  </div>

                  <div class="text-box">
                    <h3>Mike Hardson</h3>
                    <p>CEO of Garden</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!--End About One Content-->
        </div>
      </div>
    </section>
    <!--End About One -->

    <!--Start Brand One-->
    <section class="brand-one">
      <div class="auto-container">
        <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                                    "0": {
                                        "spaceBetween": 30,
                                        "slidesPerView": 1
                                    },
                                    "375": {
                                        "spaceBetween": 30,
                                        "slidesPerView": 1
                                    },
                                    "575": {
                                        "spaceBetween": 30,
                                        "slidesPerView": 2
                                    },
                                    "767": {
                                        "spaceBetween": 30,
                                        "slidesPerView": 2
                                    },
                                    "991": {
                                        "spaceBetween": 30,
                                        "slidesPerView": 3
                                    },
                                    "1199": {
                                        "spaceBetween": 30,
                                        "slidesPerView": 5
                                    }
                                }}'>
          <div class="swiper-wrapper">


            <div class="swiper-slide">
              <img src="../../public/assets/imgs/brand/brand-v1-img1.png" alt="#">
            </div>

            <div class="swiper-slide">
              <img src="../../public/assets/imgs/brand/brand-v1-img2.png" alt="#">
            </div>

            <div class="swiper-slide">
              <img src="../../public/assets/imgs/brand/brand-v1-img3.png" alt="#">
            </div>

            <div class="swiper-slide">
              <img src="../../public/assets/imgs/brand/brand-v1-img4.png" alt="#">
            </div>

            <div class="swiper-slide">
              <img src="../../public/assets/imgs/brand/brand-v1-img5.png" alt="#">
            </div>

            <div class="swiper-slide">
              <img src="../../public/assets/imgs/brand/brand-v1-img1.png" alt="#">
            </div>

            <div class="swiper-slide">
              <img src="../../public/assets/imgs/brand/brand-v1-img2.png" alt="#">
            </div>

            <div class="swiper-slide">
              <img src="../../public/assets/imgs/brand/brand-v1-img3.png" alt="#">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Brand One -->


    <!--Start Contact One-->
    <section class="contact-one">
      <div class="contact-one__img wow slideInRight" data-wow-delay="500ms" data-wow-duration="2500ms">
        <img class="float-bob-y" src="../../public/assets/imgs/resources/content-v1-img1.png" alt="#">
      </div>
      <div class="shape1"><img src="../../public/assets/imgs/shapes/contact-v1-shape1.png" alt="#"></div>
      <div class="shape2"><img src="../../public/assets/imgs/shapes/contact-v1-shape2.png" alt="#"></div>
      <div class="container">
        <div class="row">
          <!--Start Contact One Form-->
          <div class="col-xl-8">
            <div class="contact-one__form">
              <div class="sec-title">
                <div class="sec-title__tagline">
                  <h6>Contact Us</h6>
                  <span class="right"></span>
                </div>
                <h2 class="sec-title__title">You Can Easily <br> Contact Us</h2>
              </div>


              <form id="contact-form" name="contact_form" class="default-form2" action="assets/inc/sendmail.php"
                method="post">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input-box">
                      <input type="text" name="form_name" value="" placeholder="Your Name" required="">
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input-box">
                      <input type="email" name="form_email" value="" placeholder="Email Address" required="">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input-box">
                      <input type="text" name="form_subject" value="" placeholder="Select Date" id="datepicker">
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input-box">
                      <input type="text" name="time" placeholder="Select time">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input-box">
                      <div class="select-box">
                        <select class="selectmenu wide">
                          <option selected="selected">Select Categories</option>
                          <option>Categories 01</option>
                          <option>Categories 02</option>
                          <option>Categories 03</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="contact-one__form-btn">
                      <button class="thm-btn" type="submit" data-loading-text="Please wait...">
                        <span class="txt">Send Now</span>
                        <i class="icon-double-chevron"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!--End Contact One Form-->
        </div>
      </div>
    </section>
    <!--End Contact One-->

    <!--Start Services One -->
    <section class="services-one">
      <div class="gradient-bg"></div>
      <div class="auto-container">
        <div class="sec-title text-center">
          <div class="sec-title__tagline">
            <span class="left"></span>
            <h6>Our Services</h6>
            <span class="right"></span>
          </div>
          <h2 class="sec-title__title">Professional Featured</h2>
        </div>

        <div class="row">
          <!--Start Services One Single-->
          <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
            <div class="services-one__single">
              <div class="shape1"><img src="../../public/assets/imgs/shapes/services-v1-shape2.png" alt="#">
              </div>
              <div class="shape2"><img src="../../public/assets/imgs/shapes/services-v1-shape3.png" alt="#">
              </div>
              <div class="shape3"><img src="../../public/assets/imgs/shapes/services-v1-shape4.png" alt="#">
              </div>
              <div class="services-one__single-img">
                <div class="services-one__single-img-bg"
                  style="background-image: url(../../public/assets/imgs/shapes/services-v1-shape1.png);"></div>
                <div class="overlay-icon">
                  <div class="icon-box">
                    <span class="icon-gardening-1"></span>
                  </div>
                </div>
                <img src="../../public/assets/imgs/team/services-v1-img1.jpg" alt="#">
              </div>

              <div class="services-one__single-content text-center">
                <h2><a href="arbor-management.html">Irrigation And <br> Drainage </a></h2>
                <p>I was impresed by the agrion services, not lorem ipsum is simply free text.</p>
              </div>
            </div>
          </div>
          <!--End Services One Single-->

          <!--Start Services One Single-->
          <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms">
            <div class="services-one__single">
              <div class="shape1"><img src="../../public/assets/imgs/shapes/services-v1-shape2.png" alt="#">
              </div>
              <div class="shape2"><img src="../../public/assets/imgs/shapes/services-v1-shape3.png" alt="#">
              </div>
              <div class="shape3"><img src="../../public/assets/imgs/shapes/services-v1-shape4.png" alt="#">
              </div>
              <div class="services-one__single-img">
                <div class="services-one__single-img-bg"
                  style="background-image: url(../../public/assets/imgs/shapes/services-v1-shape1.png);"></div>
                <div class="overlay-icon">
                  <div class="icon-box">
                    <span class="icon-gardening-1"></span>
                  </div>
                </div>
                <img src="../../public/assets/imgs/team/services-v1-img6.jpg" alt="#">
              </div>

              <div class="services-one__single-content text-center">
                <h2><a href="arbor-management.html">Tree And Shrub <br> Services </a></h2>
                <p>I was impresed by the agrion services, not lorem ipsum is simply free text.</p>
              </div>
            </div>
          </div>
          <!--End Services One Single-->

          <!--Start Services One Single-->
          <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
            <div class="services-one__single">
              <div class="shape1"><img src="../../public/assets/imgs/shapes/services-v1-shape2.png" alt="#">
              </div>
              <div class="shape2"><img src="../../public/assets/imgs/shapes/services-v1-shape3.png" alt="#">
              </div>
              <div class="shape3"><img src="../../public/assets/imgs/shapes/services-v1-shape4.png" alt="#">
              </div>
              <div class="services-one__single-img">
                <div class="services-one__single-img-bg"
                  style="background-image: url(../../public/assets/imgs/shapes/services-v1-shape1.png);"></div>
                <div class="overlay-icon">
                  <div class="icon-box">
                    <span class="icon-gardening-1"></span>
                  </div>
                </div>
                <img src="../../public/assets/imgs/team/services-v1-img2.jpg" alt="#">
              </div>

              <div class="services-one__single-content text-center">
                <h2><a href="arbor-management.html">Garden Commercial <br> Landscaping </a></h2>
                <p>I was impresed by the agrion services, not lorem ipsum is simply free text.</p>
              </div>
            </div>
          </div>
          <!--End Services One Single-->

          <!--Start Services One Single-->
          <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">
            <div class="services-one__single">
              <div class="shape1"><img src="../../public/assets/imgs/shapes/services-v1-shape2.png" alt="#">
              </div>
              <div class="shape2"><img src="../../public/assets/imgs/shapes/services-v1-shape3.png" alt="#">
              </div>
              <div class="shape3"><img src="../../public/assets/imgs/shapes/services-v1-shape4.png" alt="#">
              </div>
              <div class="services-one__single-img">
                <div class="services-one__single-img-bg"
                  style="background-image: url(../../public/assets/imgs/shapes/services-v1-shape1.png);"></div>
                <div class="overlay-icon">
                  <div class="icon-box">
                    <span class="icon-gardening-1"></span>
                  </div>
                </div>
                <img src="../../public/assets/imgs/team/services-v1-img5.jpg" alt="#">
              </div>

              <div class="services-one__single-content text-center">
                <h2><a href="arbor-management.html">Lawn And Garden br Care</a></h2>
                <p>I was impresed by the agrion services, not lorem ipsum is simply free text.</p>
              </div>
            </div>
          </div>
          <!--End Services One Single-->

          <!--Start Services One Single-->
          <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">
            <div class="services-one__single">
              <div class="shape1"><img src="../../public/assets/imgs/shapes/services-v1-shape2.png" alt="#">
              </div>
              <div class="shape2"><img src="../../public/assets/imgs/shapes/services-v1-shape3.png" alt="#">
              </div>
              <div class="shape3"><img src="../../public/assets/imgs/shapes/services-v1-shape4.png" alt="#">
              </div>
              <div class="services-one__single-img">
                <div class="services-one__single-img-bg"
                  style="background-image: url(../../public/assets/imgs/shapes/services-v1-shape1.png);"></div>
                <div class="overlay-icon">
                  <div class="icon-box">
                    <span class="icon-gardening-1"></span>
                  </div>
                </div>
                <img src="../../public/assets/imgs/team/services-v1-img4.jpg" alt="#">
              </div>

              <div class="services-one__single-content text-center">
                <h2><a href="arbor-management.html">Lawn And Garden br Care</a></h2>
                <p>I was impresed by the agrion services, not lorem ipsum is simply free text.</p>
              </div>
            </div>
          </div>
          <!--End Services One Single-->

          <!--Start Services One Single-->
          <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">
            <div class="services-one__single">
              <div class="shape1"><img src="../../public/assets/imgs/shapes/services-v1-shape2.png" alt="#">
              </div>
              <div class="shape2"><img src="../../public/assets/imgs/shapes/services-v1-shape3.png" alt="#">
              </div>
              <div class="shape3"><img src="../../public/assets/imgs/shapes/services-v1-shape4.png" alt="#">
              </div>
              <div class="services-one__single-img">
                <div class="services-one__single-img-bg"
                  style="background-image: url(../../public/assets/imgs/shapes/services-v1-shape1.png);"></div>
                <div class="overlay-icon">
                  <div class="icon-box">
                    <span class="icon-gardening-1"></span>
                  </div>
                </div>
                <img src="../../public/assets/imgs/team/services-v1-img3.jpg" alt="#">
              </div>

              <div class="services-one__single-content text-center">
                <h2><a href="arbor-management.html">Lawn And Garden br Care</a></h2>
                <p>I was impresed by the agrion services, not lorem ipsum is simply free text.</p>
              </div>
            </div>
          </div>
          <!--End Services One Single-->
        </div>
      </div>
    </section>
    <!--End Services One -->


    <!--Start Projects One-->
    <section class="projects-one">
      <div class="projects-one__bg"
        style="background-image: url(../../public/assets/imgs/backgrounds/projects-v1-bg.jpg);">
      </div>
      <div class="container">
        <div class="sec-title">
          <div class="sec-title__tagline">
            <h6>Our Projects </h6>
            <span class="right"></span>
          </div>
          <h2 class="sec-title__title">We Have Successful <span class="odometer" data-count="50">00</span>
            <span class="plus">+</span> <br> More Projects
          </h2>
        </div>

        <div class="projects-one__inner">
          <ul class="row filter-layout masonary-layout">
            <li class="col-xl-4 col-lg-4 col-md-6 wow animated fadeInUp" data-wow-delay="0.1s">
              <div class="projects-one__single mb60">
                <div class="projects-one__single-img">
                  <img src="../../public/assets/imgs/project/projects-v1-img1.jpg" alt="#">
                  <div class="btn-box">
                    <a href="#"><span class="icon-right-arrow-1"></span></a>
                  </div>
                  <div class="overlay-content">
                    <span>farming</span>
                    <h2><a href="#">Harvest <br>
                        Innovations</a></h2>
                  </div>
                </div>
              </div>
            </li>

            <li class="col-xl-4 col-lg-4 col-md-6 wow animated fadeInUp" data-wow-delay="0.3s">
              <div class="projects-one__single mb30">
                <div class="projects-one__single-img">
                  <img src="../../public/assets/imgs/project/projects-v1-img2.jpg" alt="#">
                  <div class="btn-box">
                    <a href="#"><span class="icon-right-arrow-1"></span></a>
                  </div>
                  <div class="overlay-content">
                    <span>farming</span>
                    <h2><a href="#">Harvest <br>
                        Innovations</a></h2>
                  </div>
                </div>
              </div>
            </li>

            <li class="col-xl-4 col-lg-4 col-md-6 wow animated fadeInUp" data-wow-delay="0.5s">
              <div class="projects-one__single">
                <div class="projects-one__single-img">
                  <img src="../../public/assets/imgs/project/projects-v1-img3.jpg" alt="#">
                  <div class="btn-box">
                    <a href="#"><span class="icon-right-arrow-1"></span></a>
                  </div>
                  <div class="overlay-content">
                    <span>farming</span>
                    <h2><a href="#">Harvest <br>
                        Innovations</a></h2>
                  </div>
                </div>
              </div>
            </li>

            <li class="col-xl-4 col-lg-4 col-md-6 wow animated fadeInUp" data-wow-delay="0.1s">
              <div class="projects-one__single">
                <div class="projects-one__single-img">
                  <img src="../../public/assets/imgs/project/projects-v1-img4.jpg" alt="#">
                  <div class="btn-box">
                    <a href="#"><span class="icon-right-arrow-1"></span></a>
                  </div>
                  <div class="overlay-content">
                    <span>farming</span>
                    <h2><a href="#">Harvest <br>
                        Innovations</a></h2>
                  </div>
                </div>
              </div>
            </li>

            <li class="col-xl-4 col-lg-4 col-md-6 wow animated fadeInUp" data-wow-delay="0.3s">
              <div class="projects-one__single">
                <div class="projects-one__single-img">
                  <img src="../../public/assets/imgs/project/projects-v1-img5.jpg" alt="#">
                  <div class="btn-box">
                    <a href="#"><span class="icon-right-arrow-1"></span></a>
                  </div>
                  <div class="overlay-content">
                    <span>farming</span>
                    <h2><a href="#">Harvest <br>
                        Innovations</a></h2>
                  </div>
                </div>
              </div>
            </li>

            <li class="col-xl-4 col-lg-4 col-md-6 wow animated fadeInUp" data-wow-delay="0.5s">
              <div class="projects-one__single mb0">
                <div class="projects-one__single-img">
                  <img src="../../public/assets/imgs/project/projects-v1-img6.jpg" alt="#">
                  <div class="btn-box">
                    <a href="#"><span class="icon-right-arrow-1"></span></a>
                  </div>
                  <div class="overlay-content">
                    <span>farming</span>
                    <h2><a href="#">Harvest <br>
                        Innovations</a></h2>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!--End Projects One-->


    <!--Start Work Process One-->
    <section class="work-process-one">
      <div class="shape1"></div>
      <div class="shape2"><img src="../../public/assets/imgs/shapes/work-process-v1-shape1.png" alt="#"></div>
      <div class="container">
        <div class="sec-title text-center">
          <div class="sec-title__tagline">
            <span class="left"></span>
            <h6>Work Process</h6>
            <span class="right"></span>
          </div>
          <h2 class="sec-title__title">How We Work Our Company</h2>
        </div>
        <div class="row filter-layout masonary-layout">
          <!--Start Work Process One Single-->
          <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1000ms">
            <div class="work-process-one__single">
              <div class="work-process-one__single-icon">
                <div class="inner">
                  <span class="icon-gardener"></span>
                </div>
                <div class="count-box"></div>
              </div>

              <div class="work-process-one__single-content text-center">
                <h2><a href="arbor-management.html">Genaret Uniq Idea</a></h2>
                <p>Simply free dumy text of <br> the printing and amet <br> piscing</p>

              </div>
            </div>
          </div>
          <!--End Work Process One Single-->

          <!--Start Work Process One Single-->
          <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1000ms">
            <div class="work-process-one__single style2 mt100">
              <div class="work-process-one__single-icon">
                <div class="inner">
                  <span class="icon-watering-plants"></span>
                </div>
                <div class="count-box"></div>
              </div>

              <div class="work-process-one__single-content text-center">
                <h2><a href="arbor-management.html">Friendly Services
                  </a></h2>
                <p>Simply free dumy text of <br> the printing and amet <br> piscing</p>

              </div>
            </div>
          </div>
          <!--End Work Process One Single-->

          <!--Start Work Process One Single-->
          <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1000ms">
            <div class="work-process-one__single mt50">
              <div class="work-process-one__single-icon">
                <div class="inner">
                  <span class="icon-home"></span>
                </div>
                <div class="count-box"></div>
              </div>

              <div class="work-process-one__single-content text-center">
                <h2><a href="arbor-management.html">Set Design Target</a></h2>
                <p>Simply free dumy text of <br> the printing and amet <br> piscing</p>

              </div>
            </div>
          </div>
          <!--End Work Process One Single-->

          <!--Start Work Process One Single-->
          <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInRight" data-wow-delay="100ms" data-wow-duration="1000ms">
            <div class="work-process-one__single style2">
              <div class="work-process-one__single-icon">
                <div class="inner">
                  <span class="icon-field"></span>
                </div>
                <div class="count-box"></div>
              </div>

              <div class="work-process-one__single-content text-center">
                <h2><a href="arbor-management.html">Pruning Plants</a></h2>
                <p>Simply free dumy text of <br> the printing and amet <br> piscing</p>

              </div>
            </div>
          </div>
          <!--End Work Process One Single-->
        </div>
      </div>
    </section>
    <!--End Work Process One-->

    <!--Start Faq One -->
    <section class="faq-one">
      <div class="shape1"></div>
      <div class="container">
        <div class="row">
          <!--Start Faq One Progress-->
          <div class="col-xl-6 col-lg-6">
            <div class="faq-one__progress">
              <div class="sec-title">
                <div class="sec-title__tagline">
                  <h6>Our Faq</h6>
                  <span class="right"></span>
                </div>
                <h2 class="sec-title__title">Our Frequently Asked <br> Some Question</h2>
              </div>

              <!--Start Faq One Progress Single-->
              <div class="faq-one__progress-single">
                <h4 class="faq-one__progress-title">Soil Re-bulding
                </h4>
                <div class="bar">
                  <div class="bar-inner count-bar" data-percent="90%">
                    <div class="count-text">90%</div>
                  </div>
                </div>
              </div>
              <!--End Faq One Progress Single-->

              <!--Start Faq One Progress Single-->
              <div class="faq-one__progress-single">
                <h4 class="faq-one__progress-title">Landscaping Ground
                </h4>
                <div class="bar">
                  <div class="bar-inner count-bar" data-percent="80%">
                    <div class="count-text">80%</div>
                  </div>
                </div>
              </div>
              <!--End Faq One Progress Single-->

              <!--Start Faq One Progress Single-->
              <div class="faq-one__progress-single mb0">
                <h4 class="faq-one__progress-title">Planting Plants
                </h4>
                <div class="bar">
                  <div class="bar-inner count-bar" data-percent="70%">
                    <div class="count-text">70%</div>
                  </div>
                </div>
              </div>
              <!--End Faq One Progress Single-->
            </div>
          </div>
          <!--End Faq One Progress-->

          <!--Start Faq One Accordion-->
          <div class="col-xl-6 col-lg-6">
            <div class="faq-one__accordion">
              <ul class="accordion-box">
                <li class="accordion block active-block">
                  <div class="acc-btn active">
                    <div class="icon-outer">
                      <i class="icon-up-arrow"></i>
                    </div>
                    <h3>
                      How Does Gardening Make You Feel ?
                    </h3>
                  </div>
                  <div class="acc-content current">
                    <p>Suspendisse finibus urna mauris, vitae consequat quam vel. Vestibulum leo
                      ligula, vit commodo nisl Sed luctus venenatis pellentesque.</p>
                  </div>
                </li>

                <li class="accordion block">
                  <div class="acc-btn">
                    <div class="icon-outer">
                      <i class="icon-up-arrow"></i>
                    </div>
                    <h3>
                      Do Gardens Help The Environment ?
                    </h3>
                  </div>
                  <div class="acc-content">
                    <p>Suspendisse finibus urna mauris, vitae consequat quam vel. Vestibulum leo
                      ligula, vit commodo nisl Sed luctus venenatis pellentesque.</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!--End Faq One Accordion-->
        </div>
      </div>
    </section>
    <!--End Faq One -->

    <!--Start Testimonial One -->
    <section class="testimonial-one">
      <div class="shape2"></div>
      <div class="shape5"></div>
      <div class="container">
        <div class="row">
          <!--Start Testimonial One Img-->
          <div class="col-xl-6">
            <div class="testimonial-one__img">
              <div class="shape1"></div>
              <div class="shape3"></div>
              <div class="shape4"></div>
              <div class="testimonial-one__img1">
                <img src="../../public/assets/imgs/testimonial/testimonial-v1-img1.png" alt="#">
              </div>
              <div class="testimonial-one__img2">
                <img src="../../public/assets/imgs/testimonial/testimonial-v1-img2.png" alt="#">
              </div>

              <div class="testimonial-one__img3">
                <img src="../../public/assets/imgs/testimonial/testimonial-v1-img3.png" alt="#">
              </div>

              <div class="testimonial-one__img4">
                <img src="../../public/assets/imgs/testimonial/testimonial-v1-img4.png" alt="#">
              </div>

              <div class="testimonial-one__img5">
                <img src="../../public/assets/imgs/testimonial/testimonial-v1-img5.png" alt="#">
              </div>

              <div class="testimonial-one__img6">
                <img src="../../public/assets/imgs/testimonial/testimonial-v1-img1.png" alt="#">
              </div>

              <div class="testimonial-one__img7">
                <div class="inner">
                  <img src="../../public/assets/imgs/testimonial/testimonial-v1-img6.png" alt="#">
                </div>
              </div>
            </div>
          </div>
          <!--End Testimonial One Img-->


          <!--Start Testimonial One Content-->
          <div class="col-xl-6">
            <div class="testimonial-one__content">
              <div class="sec-title">
                <div class="sec-title__tagline">
                  <h6>Our Client</h6>
                  <span class="right"></span>
                </div>
                <h2 class="sec-title__title">Our Sweet Client Say</h2>
              </div>

              <div class="testimonial-one__content-inner">

                <div class="owl-carousel owl-theme thm-owl__carousel testimonial-one__carousel" data-owl-options='{
                                    "loop": true,
                                    "autoplay": true,
                                    "margin": 0,
                                    "nav": false,
                                    "dots": true,
                                    "smartSpeed": 500,
                                    "autoplayTimeout": 10000,
                                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                                    "responsive": {
                                            "0": {
                                                "items": 1
                                            },
                                            "768": {
                                                "items": 1
                                            },
                                            "992": {
                                                "items": 1
                                            },
                                            "1200": {
                                                "items": 1
                                            }
                                        }
                                    }'>

                  <!--Start Testimonial One Single-->
                  <div class="testimonial-one__single">
                    <div class="testimonial-one__single-bg"
                      style="background-image: url(../../public/assets/imgs/shapes/testimonial-v1-shape1.png);">
                    </div>
                    <div class="inner">
                      <div class="img-box">
                        <div class="inner-box">
                          <img src="../../public/assets/imgs/testimonial/testimonial-v1-img7.jpg" alt="#">
                        </div>
                        <div class="icon-box">
                          <span class="icon-quote"></span>
                        </div>
                      </div>

                      <div class="content-box">
                        <p>There are many variations of passage of available but the majority
                          have
                          suffered alteration in some form by injected humor or randomed.</p>

                        <div class="client-info">
                          <div class="text-box">
                            <h2>Bonnie tolbet</h2>
                            <p>Customer</p>
                          </div>

                          <div class="rating-box">
                            <ul>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                            </ul>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!--End Testimonial One Single-->

                  <!--Start Testimonial One Single-->
                  <div class="testimonial-one__single">
                    <div class="testimonial-one__single-bg"
                      style="background-image: url(../../public/assets/imgs/shapes/testimonial-v1-shape1.png);">
                    </div>
                    <div class="inner">
                      <div class="img-box">
                        <div class="inner-box">
                          <img src="../../public/assets/imgs/testimonial/testimonial-v1-img7.jpg" alt="#">
                        </div>
                        <div class="icon-box">
                          <span class="icon-quote"></span>
                        </div>
                      </div>

                      <div class="content-box">
                        <p>There are many variations of passage of available but the majority
                          have
                          suffered alteration in some form by injected humor or randomed.</p>

                        <div class="client-info">
                          <div class="text-box">
                            <h2>Bonnie tolbet</h2>
                            <p>Customer</p>
                          </div>

                          <div class="rating-box">
                            <ul>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                            </ul>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!--End Testimonial One Single-->

                  <!--Start Testimonial One Single-->
                  <div class="testimonial-one__single">
                    <div class="testimonial-one__single-bg"
                      style="background-image: url(../../public/assets/imgs/shapes/testimonial-v1-shape1.png);">
                    </div>
                    <div class="inner">
                      <div class="img-box">
                        <div class="inner-box">
                          <img src="../../public/assets/imgs/testimonial/testimonial-v1-img7.jpg" alt="#">
                        </div>
                        <div class="icon-box">
                          <span class="icon-quote"></span>
                        </div>
                      </div>

                      <div class="content-box">
                        <p>There are many variations of passage of available but the majority
                          have
                          suffered alteration in some form by injected humor or randomed.</p>

                        <div class="client-info">
                          <div class="text-box">
                            <h2>Bonnie tolbet</h2>
                            <p>Customer</p>
                          </div>

                          <div class="rating-box">
                            <ul>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                              <li>
                                <span class="icon-pointed-star"></span>
                              </li>
                            </ul>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!--End Testimonial One Single-->

                </div>
              </div>
            </div>
          </div>
          <!--End Testimonial One Content-->
        </div>
      </div>
    </section>
    <!--End Testimonial One -->


    <!--Start Excellent Work One -->
    <section class="excellent-work-one">
      <div class="shape1 wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img class="float-bob-y"
          src="../../public/assets/imgs/shapes/excellent-work-v1-shape1.png" alt="#"></div>
      <div class="excellent-work-one__bg"
        style="background-image: url(../../public/assets/imgs/backgrounds/excellent-work-v1-bg.jpg);">

        <div class="content-box">
          <div class="img-box">
            <img src="../../public/assets/imgs/resources/excellent-work-v1-img2.png" alt="#">
          </div>
          <div class="text-box">
            <h2>We Have Solution For Your Garden</h2>
          </div>

          <div class="btn-box">
            <a class="thm-btn" href="contact.php?id=<?php echo $user_id; ?>">
              <span class="txt">Contact Now</span>
              <i class="fa fa-angle-double-right"></i>
            </a>
          </div>
        </div>

      </div>
      <div class="container">
        <div class="row">
          <div class="col-xl-6"></div>

          <!--Start Excellent Work One Content-->
          <div class="col-xl-6">
            <div class="excellent-work-one__content">
              <div class="sec-title">
                <div class="sec-title__tagline">
                  <h6>Excellent Work</h6>
                  <span class="right"></span>
                </div>
                <h2 class="sec-title__title">We Work at a Landscape <br> Company Process</h2>
              </div>

              <div class="text-box">
                <p>There cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo
                  massa mollis estiegittis massa at urnaaculis estie. miristum nulla sed medy
                  fringilla vitae.</p>
              </div>

              <div class="excellent-work-one__progress">
                <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="excellent-work-one__progress-single">
                      <div class="progress-box">
                        <div class="graph-outer">
                          <input type="text" class="dial" data-fgColor="#79b823" data-bgColor="#dbe3e0" data-width="110"
                            data-height="110" data-linecap="normal" value="90">
                          <div class="inner-text count-box"><span class="count-text" data-stop="90"
                              data-speed="2000"></span><span class="count-Parsent">%</span>
                          </div>
                        </div>
                      </div>
                      <div class="title-box">
                        <h2>Agriculture <br> Projects</h2>
                      </div>
                    </div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="excellent-work-one__progress-single">
                      <div class="progress-box">
                        <div class="graph-outer">
                          <input type="text" class="dial" data-fgColor="#79b823" data-bgColor="#dbe3e0" data-width="110"
                            data-height="110" data-linecap="normal" value="66">
                          <div class="inner-text count-box"><span class="count-text" data-stop="66"
                              data-speed="2000"></span><span class="count-Parsent">%</span>
                          </div>
                        </div>
                      </div>
                      <div class="title-box">
                        <h2>Quality <br> products</h2>
                      </div>
                    </div>
                  </div>


                </div>
              </div>

              <ul class="excellent-work-one__content-list">
                <li>
                  <p> <span class="icon-tick"></span> There are many variations of passage of
                    lorem.</p>
                </li>

                <li>
                  <p> <span class="icon-tick"></span> Available but the majority alteration.</p>
                </li>
              </ul>
            </div>
          </div>
          <!--End Excellent Work One Content-->
        </div>
      </div>
    </section>
    <!--End Excellent Work One -->


    <!--Start Blog One -->
    <section class="blog-one">
      <div class="container">
        <div class="sec-title text-center">
          <div class="sec-title__tagline">
            <span class="left"></span>
            <h6>Recent Posts</h6>
            <span class="right"></span>
          </div>
          <h2 class="sec-title__title">Latest News From Blog</h2>
        </div>
        <div class="row">
          <!--Start Blog One Single-->
          <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
            <div class="blog-one__single">
              <div class="blog-one__single-content">
                <ul class="meta-box clearfix">
                  <li>
                    <div class="icon">
                      <span class="icon-calendar"></span>
                    </div>
                    <div class="text">
                      <p><a href="#"> January 2, 2023 </a></p>
                    </div>
                  </li>

                  <li>
                    <div class="icon">
                      <span class="icon-user"></span>
                    </div>
                    <div class="text">
                      <p><a href="#"> by Admin</a></p>
                    </div>
                  </li>
                </ul>

                <div class="blog-one__single-content-inner">
                  <h2><a href="blog-details.html">Ex-homeless shelter head
                      agrees to settlement</a></h2>
                  <p>Nulla commodo dolor massa, vel pellen esque nulla congue quis.</p>
                </div>


                <div class="blog-one__single-content-bottom clearfix">
                  <ul class="clearfix">
                    <li>
                      <div class="comment-box">
                        <a href="#"> <span class="icon-conversation"></span> 3 comments</a>
                      </div>
                    </li>

                    <li>
                      <div class="btn-box">
                        <a href="#">Read More <span class="icon-right-arrow-1"></span></a>
                      </div>
                    </li>
                  </ul>
                </div>

              </div>

              <div class="blog-one__single-img">
                <img src="../../public/assets/imgs/blog/blog-v1-img1.jpg" alt="#">
              </div>
            </div>
          </div>
          <!--End Blog One Single-->

          <!--Start Blog One Single-->
          <div class="col-xl-4 col-lg-4 wow fadeInDown" data-wow-delay=".3s">
            <div class="blog-one__single">
              <div class="blog-one__single-content">
                <ul class="meta-box clearfix">
                  <li>
                    <div class="icon">
                      <span class="icon-calendar"></span>
                    </div>
                    <div class="text">
                      <p><a href="#"> January 2, 2023 </a></p>
                    </div>
                  </li>

                  <li>
                    <div class="icon">
                      <span class="icon-user"></span>
                    </div>
                    <div class="text">
                      <p><a href="#"> by Admin</a></p>
                    </div>
                  </li>
                </ul>

                <div class="blog-one__single-content-inner">
                  <h2><a href="blog-details.html">Complete solution for your
                      land & garden design</a></h2>
                  <p>Nulla commodo dolor massa, vel pellen esque nulla congue quis.</p>
                </div>


                <div class="blog-one__single-content-bottom clearfix">
                  <ul class="clearfix">
                    <li>
                      <div class="comment-box">
                        <a href="#"> <span class="icon-conversation"></span> 3 comments</a>
                      </div>
                    </li>

                    <li>
                      <div class="btn-box">
                        <a href="#">Read More <span class="icon-right-arrow-1"></span></a>
                      </div>
                    </li>
                  </ul>
                </div>

              </div>

              <div class="blog-one__single-img">
                <img src="../../public/assets/imgs/blog/blog-v1-img2.jpg" alt="#">
              </div>
            </div>
          </div>
          <!--End Blog One Single-->

          <!--Start Blog One Single-->
          <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay=".3s">
            <div class="blog-one__single">
              <div class="blog-one__single-content">
                <ul class="meta-box clearfix">
                  <li>
                    <div class="icon">
                      <span class="icon-calendar"></span>
                    </div>
                    <div class="text">
                      <p><a href="#"> January 2, 2023 </a></p>
                    </div>
                  </li>

                  <li>
                    <div class="icon">
                      <span class="icon-user"></span>
                    </div>
                    <div class="text">
                      <p><a href="#"> by Admin</a></p>
                    </div>
                  </li>
                </ul>

                <div class="blog-one__single-content-inner">
                  <h2><a href="blog-details.html">The environment benefits
                      of tower gardens</a></h2>
                  <p>Nulla commodo dolor massa, vel pellen esque nulla congue quis.</p>
                </div>


                <div class="blog-one__single-content-bottom clearfix">
                  <ul class="clearfix">
                    <li>
                      <div class="comment-box">
                        <a href="#"> <span class="icon-conversation"></span> 3 comments</a>
                      </div>
                    </li>

                    <li>
                      <div class="btn-box">
                        <a href="#">Read More <span class="icon-right-arrow-1"></span></a>
                      </div>
                    </li>
                  </ul>
                </div>

              </div>

              <div class="blog-one__single-img">
                <img src="../../public/assets/imgs/blog/blog-v1-img3.jpg" alt="#">
              </div>
            </div>
          </div>
          <!--End Blog One Single-->

        </div>
      </div>
    </section>
    <!--End Blog One -->

    <!--Start Footer One -->
    <footer class="footer-one">
      <div class="footer-one__bg" style="background-image: url(../../public/assets/imgs/shapes/footer-v1-shape3.png);">
      </div>
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
                    <a href="index.php?id=<?php echo $user_id; ?>"><img
                        src="../../public/assets/imgs/resources/footer-logo.png" alt="#"></a>
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
                          <li><a href="contact.php?id=<?php echo $user_id; ?>">Contact Us</a></li>
                          <li><a href="#">Our History</a></li>
                          <li><a href="addReport.php?id=<?php echo $user_id; ?>">Repport</a></li>
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