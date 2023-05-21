<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard Admin</title>

    <meta name="description" content="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/admin&login/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/admin&login/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/admin&login/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/admin&login/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/admin&login/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/admin&login/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/admin&login/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/admin&login/js/config.js"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="admin" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="/admin" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Account</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Account Settings</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/account" class="menu-link">
                                    <div data-i18n="Account">Account</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/notification" class="menu-link">
                                    <div data-i18n="Notifications">Notifications</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Resource -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Resource</span></li>
                    <!-- Paket soal -->
                    <li class="menu-item">
                        <a href="/paket_soal" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Tables">Paket Soal</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="/laporan" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-table"></i>
                            <div data-i18n="Tables">Laporan</div>
                        </a>
                    </li>
                    </li>
                    <!-- Logout -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Logout</span></li>

                    {{-- Logout --}}
                    <li class="menu-item text-danger">
                        <a href="#" class="menu-link text-danger">
                            <i class="menu-icon tf-icons bx bx-right-arrow-circle bx-fade-right-hover"></i>
                            <div data-i18n="Tables">Logout</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                @yield('admin')
                <!-- Footer -->
                <br>
                <footer class="content-footer footer bg-footer-theme">
                    <div class="footer-legal text-center">
                        <div
                            class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                            <div class="d-flex flex-column align-items-center align-items-lg-start">
                                <div class="copyright">
                                    &copy; Copyright <strong><span>Devanza Prianyah Putra</span></strong>. Project Tugas
                                    Akhir
                                </div>
                            </div>
                        </div>

                        <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                            <a href="https://www.instagram.com/monstergroup.co.id/" class="instagram"><i
                                    class="bi bi-instagram"></i></a>
                            <a href="https://id.linkedin.com/company/monstergroup" class="linkedin"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>

                    </div>
            </div>
            </footer>
            <!-- / Footer -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:assets/admin&login/vendor/js/core.js -->
    <script src="assets/admin&login/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/admin&login/vendor/libs/popper/popper.js"></script>
    <script src="assets/admin&login/vendor/js/bootstrap.js"></script>
    <script src="assets/admin&login/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/admin&login/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/admin&login/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/admin&login/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/admin&login/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
