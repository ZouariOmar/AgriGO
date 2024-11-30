<?php
//? Include declaration part
include '../../../vendor/autoload.php';  // Load Composer autoload
include '../../conf/database.php';
include '../components/custom.php';

// Fetch Sessions and clear them
session_start();
$status = $_SESSION['status'] ?? null;
unset($_SESSION['status']);

// Fetch the GET Request
$admin_id = $_GET['id'];

// Verify if the user is suspended or not
is_suspend($admin_id, 'Location: login.php');

//* Connect to the DB
$db = new Database('../../');

// Select with role
$sql = "SELECT U.* FROM Usrs AS U
				JOIN Usr_Roles AS UR ON U.ID = UR.Usr_ID
    		WHERE UR.Role_ID = :role
";

// Fetch farmers
$farmers = $db->query($sql, [
  'role' => 4
]);

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
          <li class="menu-item">
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

          <!-- Users Settings -->
          <li class="menu-item active">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">Users Settings</div>
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
          <!-- / Users Settings -->

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

          <!-- Others -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-cube-alt"></i>
              <div data-i18n="Misc">Others</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="pages-misc-error.html" class="menu-link">
                  <div data-i18n="Error">Error</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="pages-misc-under-maintenance.html" class="menu-link">
                  <div data-i18n="Under Maintenance">Under Maintenance</div>
                </a>
              </li>
            </ul>
          </li>
          <!-- / Others -->

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

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../../public/assets/default-user.png" alt class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../../public/assets/default-user.png" alt
                              class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">John Doe</span>
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
                    <a class="dropdown-item" href="auth-login-basic.html">
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
            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light">Users Settings /</span>
              Farmers Table
            </h4>
            <div class="row">
              <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                  <li class="nav-item">
                    <a class="nav-link" href="clients.php?id=<?php echo $admin_id ?>"><i class="bx bx-user me-1"></i> Clients</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                      Farmers</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="admins.php?id=<?php echo $admin_id ?>"><i class="bx bx-user me-1"></i>
                      Admins</a>
                  </li>
                </ul>
              </div>
              <!-- Farmers Table -->
              <ul class="order-5">
                <div class="card col-lg order-5 mb-4">
                  <h5 class="card-header">Farmers Table</h5>
                  <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Profile Link</th>
                          <th>Created At</th>
                          <th>Update At</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody class="table-border-bottom-0">
                        <?php users_table($farmers, $admin_id); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </ul>
              <!--/ Farmers Table -->
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
    <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank"
      class="btn btn-danger btn-buy-now">New Event</a>
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

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>