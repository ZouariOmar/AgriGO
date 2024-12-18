<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection
include '../config.php';
require_once '../Controllers/ProductController.php';
$pdo = new PDO('mysql:host=localhost;dbname=SDD', 'zouari_omar', 'root');

// Initialize variables
$products = [];
$id = '';
$editProductId = null; // To store the ID of the product being edited
$editProductData = []; // To store the data of the product being edited

// Check if it's a GET request with an id
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);


    if ($id !== false && $id > 0) {

        // Fetch products for this user (assuming id corresponds to user_id)
        $stmt = $pdo->prepare("SELECT * FROM produit WHERE user_id = :user_id");
        $stmt->bindParam(':user_id', $id, PDO::PARAM_INT);

        // Execute the statement
        if ($stmt->execute()) {
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}

// Handle edit request
if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['product_id'])) {
    $editProductId = filter_var($_GET['product_id'], FILTER_VALIDATE_INT);


    if ($editProductId !== false && $editProductId > 0) {
        // Fetch product data for editing
        $stmt = $pdo->prepare("SELECT * FROM produit WHERE id = :id");
        $stmt->bindParam(':id', $editProductId, PDO::PARAM_INT);
        $stmt->execute();
        $editProductData = $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

// Update product if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $updateProductId = filter_var($_POST['product_id'], FILTER_VALIDATE_INT);
    $libelle = htmlspecialchars(strip_tags(trim($_POST['libelle'])));
    $prix = filter_var($_POST['prix'], FILTER_VALIDATE_FLOAT);
    $id_categorie = filter_var($_POST['id_categorie'], FILTER_VALIDATE_INT);
    $Quantitie = filter_var($_POST['Quantitie'], FILTER_VALIDATE_INT);
    $location = htmlspecialchars(strip_tags(trim($_POST['location'])));

    if ($updateProductId !== false && $updateProductId > 0) {

        // Prepare SQL statement to update the product
        $query = "UPDATE produit SET libelle = :libelle, prix = :prix, id_categorie = :id_categorie, Quantitie = :Quantitie, location = :location WHERE id = :id";
        // Prepare the statement
        $stmt = $pdo->prepare($query);

        // Bind parameters
        $stmt->bindParam(':libelle', $libelle);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':id_categorie', $id_categorie);
        $stmt->bindParam(':Quantitie', $Quantitie);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':id', $updateProductId, PDO::PARAM_INT);

        // Execute the statement and handle redirection
        if ($stmt->execute()) {
            // Redirect with success message, including the user ID in the URL
            header("Location: Usr_prodlist.php?success=Product updated successfully.&id=" . $_POST['id']);
            exit();
        } else {
            // Redirect with error message, including the user ID in the URL
            header("Location: Usr_prodlist.php?error=Error updating product.&id=" . urlencode($id));
            exit();
        }
    }
}

// Delete product if action is specified in the GET request
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['product_id'])) {
    $productId = filter_var($_GET['product_id'], FILTER_VALIDATE_INT);

    if ($productId !== false && $productId > 0) {
        try {
            // Disable foreign key checks
            $pdo->exec("SET FOREIGN_KEY_CHECKS=0;");

            // Prepare SQL statement to delete the product
            $query = "DELETE FROM produit WHERE id = :id";

            // Prepare the statement
            $stmt = $pdo->prepare($query);

            // Bind the parameter
            $stmt->bindParam(':id', $productId, PDO::PARAM_INT);

            // Execute the statement
            if ($stmt->execute()) {
                // Redirect with success message
                header("Location: Usr_prodlist.php?id=" . urlencode($id));
                exit();
            } else {
                // Redirect with error message
                header("Location: Usr_prodlist.php?error=Error deleting product.&id=" . urlencode($id));
                exit();
            }
        } catch (PDOException $e) {
            // Handle any errors during deletion
            header("Location: Usr_prodlist.php?error=" . urlencode($e->getMessage()) . "&id=" . urlencode($id));
            exit();
        } finally {
            // Re-enable foreign key checks
            $pdo->exec("SET FOREIGN_KEY_CHECKS=1;");
        }
    }
}

// Fetch categories for dropdown (if needed)
$stmt = $pdo->query("SELECT id, libelle FROM categorie");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="images/favicon.png" />
    <title>Agrigo - Make Offer</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../../../pkg/font-awesome/css/font-awesome.min.css" />
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

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
        }

        a.edit {
            background-color: #4CAF50;
            color: white;

        }

        a.delete {
            background-color: #e74c3c;
            color: white;
        }

        a.edit:hover,
        a.delete:hover {
            opacity: 0.8;
        }
    </style>



    <!-- loop -->
    <link rel="stylesheet" href="../../../vendor/bootstrap/css/bootstrap.min.css" />
    <!-- template styles -->
    <link rel="stylesheet" href="../../public/css/style.css" />
    <link rel="stylesheet" href="../../public/css/responsive.css" />
    <link rel="stylesheet" href="../../public/css/style-2.css" />
    <!-- js scripts -->
    <!-- the stoping loop -->
    <script src="../../../vendor/timepicker/timePicker.js"></script>
    <!-- Template js -->
    <script src="../../public/js/custom.js"></script>
    <!-- the 2nd temp -->
    <script src="../../public/js/jquery.min.js"></script>
    <script src="../../public/js/bootstrap.min.js"></script>
    <script src="../../public/js/custom copy.js"></script>
</head>

<body>
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
                    style="background-image: url(../../public/assets/imgs/shapes/main-header-v2-bg.png);"></div>
                <div class="main-header-one__bottom-inner">
                    <nav class="main-menu main-menu-one">
                        <div class="main-menu__wrapper clearfix">
                            <div class="auto-container">
                                <div class="main-menu__wrapper-inner">
                                    <div class="main-header-one__bottom-left">
                                        <div class="logo-box-one">
                                            <a href="index.html">
                                                <img src="../../public/assets/imgs/resources/logo-2.png" alt="Awesome Logo"
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
                                                        <li><a href="Store.php?id=<?php echo $id; ?>">Store</a></li>
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





        <div class="col-sm-9" id="content">
            <div class="breadcrumbs">
                <a href="index.html"><i class="fa fa-home"></i></a>
                <a href="existOff.php">Your Offers</a>
            </div>
            <h1>Need Help?</h1>
            <p> <small><strong class="define_note"></strong></small>If you need any help or have any question
                <a href="login.html">click here</a>.
            </p>
            <div class="form-horizontal">
                <div class="contentText">
                    <!-- the prod display usr -->
                    <h2>Your Products</h2>
                    <?php if (empty($products)): ?>
                        <p>You haven't added any products yet.</p>
                    <?php else: ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Location</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($product['libelle']); ?></td>
                                        <td><?php echo htmlspecialchars($product['prix']); ?></td>
                                        <td><?php echo htmlspecialchars($product['id_categorie']); ?></td>
                                        <td><?php echo htmlspecialchars($product['Quantitie']); ?></td>
                                        <td><?php echo htmlspecialchars($product['location']); ?></td>
                                        <td>
                                            <a href="?action=edit&product_id=<?php echo $product['id']; ?>&id=<?php echo urlencode($id); ?>"
                                                class="edit">Edit</a>
                                            <a href="?action=delete&product_id=<?php echo $product['id']; ?>&id=<?php echo urlencode($id); ?>"
                                                class="delete"
                                                onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php endif; ?>
                    <!-- Edit Product Form -->
                    <?php if ($editProductId !== null): ?>
                        <fieldset id="editProduct">
                            <h3>Edit Product</h3>
                            <form method="POST" action="">
                                <input type="hidden" name="product_id"
                                    value="<?php echo htmlspecialchars($editProductData['id']); ?>">

                                <!-- Product Name -->
                                <div class="form-group required">
                                    <label for="libelle" class="col-sm-2 control-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="libelle" name="libelle"
                                            value="<?php echo htmlspecialchars($editProductData['libelle']); ?>" required
                                            placeholder="Enter product name">
                                        <div id="libelleError" class="error-message" style="display:none;"></div>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="form-group required">
                                    <label for="prix" class="col-sm-2 control-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="0.01" class="form-control" id="prix" name="prix"
                                            value="<?php echo htmlspecialchars($editProductData['prix']); ?>" required
                                            placeholder="Enter product price">
                                        <div id="prixError" class="error-message" style="display:none;"></div>
                                    </div>
                                </div>

                                <!-- Quantity -->
                                <div class="form-group required">
                                    <label for="Quantitie" class="col-sm-2 control-label">Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="number" step="1" class="form-control" id="Quantitie" name="Quantitie"
                                            value="<?php echo htmlspecialchars($editProductData['Quantitie']); ?>" required
                                            placeholder="Enter your quantity">
                                        <div id="QuantitieError" class="error-message" style="display:none;"></div>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="form-group required">
                                    <label for="location" class="col-sm-2 control-label">Location</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="location" name="location"
                                            value="<?php echo htmlspecialchars($editProductData['location']); ?>" required
                                            placeholder="Enter your product location">
                                        <div id="locationError" class="error-message" style="display:none;"></div>
                                    </div>
                                </div>
                                <input type="text" name="id" value="<?php echo htmlspecialchars($id); ?>" hidden>

                                <!-- Category -->
                                <div class="form-group required">
                                    <label for="id_categorie" class="col-sm-2 control-label">Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="id_categorie" name="id_categorie" required>
                                            <?php foreach ($categories as $category): ?>
                                                <option value="<?php echo htmlspecialchars($category['id']); ?>" <?php echo ($category['id'] == $editProductData['id_categorie']) ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($category['libelle']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div id="categorieError" class="error-message" style="display:none;"></div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary" name="update_product">Update Product</button>
                            </form>
                        </fieldset>
                    <?php endif; ?>


                    <!-- Display success/error messages -->
                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success"><?php echo htmlspecialchars($_GET['success']); ?></div>
                    <?php elseif (isset($_GET['error'])): ?>
                        <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

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
                                    <a href="index.html"><img src="../../public/assets/imgs/resources/footer-logo.png" alt="#"></a>
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
                <a href="index.html" aria-label="logo image">
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
    <script src="../../public/js/pff1.js"></script>


</body>

</html>