<?php

include "../Controllers/reportController.php";
$reportC = new reportController();

// Récupérer la catégorie filtrée depuis l'URL, si elle existe
$category = isset($_GET['category']) ? $_GET['category'] : null;

// Passer la catégorie à la méthode pour obtenir les rapports filtrés
$list = $reportC->reportList($category);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report List</title>
    <link rel="stylesheet" href="../../public/css/liststyle.css"> <!-- Link to the updated CSS file -->
    <!-- Favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/images/favicons/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/images/favicons/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/images/favicons/favicon-16x16.png" />
    <link rel="manifest" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/images/favicons/site.webmanifest" />
    <meta name="description" content="Gardnma HTML 5 Template " />

    <!-- fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/animate/animate.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/animate/custom-animate.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/bootstrap-select/css/bootstrap-select.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/bxslider/jquery.bxslider.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/fontawesome/css/all.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/nice-select/nice-select.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/nouislider/nouislider.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/nouislider/nouislider.pips.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/odometer/odometer.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/owl-carousel/owl.carousel.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/owl-carousel/owl.theme.default.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/swiper/swiper.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/timepicker/timePicker.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/tiny-slider/tiny-slider.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/vegas/vegas.min.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/thm-icons/style.css">
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/slick-slider/slick.css">
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/language-switcher/polyglot-language-switcher.css">
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/vendors/reey-font/stylesheet.css">

        <!-- template styles -->
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/css/style.css" />
        <link rel="stylesheet" href="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/css/responsive.css" />
</head>

<body>

    <!-- Title section -->
    <div class="page-wrapper">
            <!--Start Main Header One Bottom-->
            <div class="main-header-one__bottom">
                <div class="main-header-one__bottom-inner">
                    <nav class="main-menu main-menu-one">
                        <div class="main-menu__wrapper clearfix">
                            <div class="auto-container">
                                <div class="main-menu__wrapper-inner">
                                    <div class="main-header-one__bottom-left">
                                        <div class="logo-box-one">
                                            <a href="../../../templates/gardnma-package-files/1_gardnma-html-files/index.html">
                                                <img src="../../../templates/gardnma-package-files/1_gardnma-html-files/assets/images/resources/logo-1.png" alt="Awesome Logo"
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
                                                    <a href="../../../templates/gardnma-package-files/1_gardnma-html-files/index.html">Home <span class="line"></span></a>
                                                    <ul>
                                                        <li>
                                                            <a href="../../../templates/gardnma-package-files/1_gardnma-html-files/index.html">Home One</a>
                                                        </li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/index-2.html">Home Two</a></li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/index-3.html">Home Three</a></li>
                                                        <li class="dropdown">
                                                            <a href="#">Header Styles</a>
                                                            <ul>
                                                                <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/index.html">Header One</a></li>
                                                                <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/index-2.html">Header Two</a></li>
                                                                <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/index-3.html">Header Three</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li>
                                                    <a href="../../../templates/gardnma-package-files/1_gardnma-html-files/about.html">About <span class="line"></span></a>
                                                </li>

                                                <li class="dropdown">
                                                    <a href="#">Services <span class="line"></span></a>
                                                    <ul>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/services.html">Services</a></li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/arbor-management.html">Arbor Management</a>
                                                        </li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/garden-management.html">Garden Management</a>
                                                        </li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/nursery.html">Nursery & Tree Farm</a>
                                                        </li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/trimming.html">Trimming & Pruning</a>
                                                        </li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/weeds-control.html">Pests & Weeds Control</a>
                                                        </li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/flowers-garden.html">Fruits & Flowers Garden</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="dropdown">
                                                    <a href="#">Pages <span class="line"></span></a>
                                                    <ul>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/team.html">Team</a></li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/team-details.html">Team Details</a></li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/portfolio-1.html">Portfolio 01</a></li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/portfolio-2.html">Portfolio 02</a>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/faq.html">Faq</a>
                                                        </li>
                                                    </ul>
                                                </li>

                                                <li class="dropdown">
                                                    <a href="#">Blog <span class="line"></span></a>
                                                    <ul>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/blog.html">Blog</a></li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/blog-grid.html">Blog Grid</a></li>
                                                        <li><a href="../../../templates/gardnma-package-files/1_gardnma-html-files/blog-details.html">Blog Details</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="reportList.php">Report <span class="line"></span></a>
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
                                            <a href="../../../templates/gardnma-package-files/1_gardnma-html-files/contact.html">Get A Quote</a>
                                        </div>

                                        <div class="contact-box">
                                            <div class="icon">
                                                <span class="icon-chatting"></span>
                                            </div>
                                            <div class="text">
                                                <p>Call Anytime</p>
                                                <a href="tel:926668880000">92 666 888 0000</a>
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

        <h1 class="reports-title">Your Reports</h1>

<!-- Add Report link -->
<a href="addReport.php" class="reports-add-link">Add Report</a>

<form method="GET" action="reportList.php" class="reports-filter-form">
    <label for="category">Filter by Category:</label>
    <select name="category" id="category" class="reports-category-select">
        <option value="">All</option>
        <option value="Technical" <?= isset($_GET['category']) && $_GET['category'] == 'Technical' ? 'selected' : ''; ?>>Technical</option>
        <option value="Service" <?= isset($_GET['category']) && $_GET['category'] == 'Service' ? 'selected' : ''; ?>>Service</option>
        <option value="Feedback" <?= isset($_GET['category']) && $_GET['category'] == 'Feedback' ? 'selected' : ''; ?>>Feedback</option>
        <option value="Other" <?= isset($_GET['category']) && $_GET['category'] == 'Other' ? 'selected' : ''; ?>>Other</option>
    </select>
    <input type="submit" value="Filter" class="reports-filter-button">
</form>

<!-- Table to display reports -->
<table class="reports-table">
    <thead>
        <tr>
            <th class="reports-table-header">Category</th>
            <th class="reports-table-header">Subject</th>
            <th class="reports-table-header">Description</th>
            <th class="reports-table-header">Status</th>
            <th class="reports-table-header">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($list as $report) {
            ?>
            <tr class="reports-table-row">
                <td class="reports-table-cell"><?= htmlspecialchars($report['category']); ?></td>
                <td class="reports-table-cell"><?= htmlspecialchars($report['subject']); ?></td>
                <td class="reports-table-cell"><?= htmlspecialchars($report['description']); ?></td>
                <td class="reports-table-cell">
                   <?= htmlspecialchars($report['sta']); ?>
                </td>
                <td class="reports-table-cell report-actions">
                    <form method="POST" action="updateReport.php" class="report-update-form">
                        <input type="submit" name="update" value="Update" class="report-update-button">
                        <input type="hidden" value="<?= htmlspecialchars($report['Report_ID']); ?>" name="id">
                    </form>
                    <a href="deleteReport.php?id=<?= htmlspecialchars($report['Report_ID']); ?>" class="report-delete-link">Delete</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>