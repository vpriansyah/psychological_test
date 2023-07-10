<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard User</title>

    <meta name="description" content="" />

    <!-- Fonts -->
    <link rel="stylesheet" href="assets/admin&login/vendor/libs/animate-css/animate.css">
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

    {{-- SWEET ALERT --}}
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/admin&login/js/config.js"></script>
</head>

<body>
    @php $time = explode(':','00:44:59',); @endphp
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="user" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Calon Karyawan</span>
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
                        <a href="/user" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Account</span>
                    </li>
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="/profile" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Analytics">Profile</div>
                        </a>
                    </li>

                    <!-- Task -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Task</span></li>
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="/exam" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Analytics">Exam</div>
                        </a>
                    </li>
                    <!-- Logout -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Logout</span></li>

                    {{-- Logout --}}
                    <li class="menu-item">
                        &emsp;<button type="button" class="btn rounded-pill btn-danger" data-bs-toggle="modal"
                            data-bs-target="#LogoutModal">
                            <span class="tf-icons bx bx-right-arrow-circle"></span>&nbsp; Logout
                        </button>
                        </form>
                    </li>

                </ul>
            </aside>
            <!-- / Menu -->

            {{-- MODAL LOGOUT --}}
            <div class="modal animate__animated animate__swing" id="LogoutModal" tabindex="-1"
                aria-labelledby="LogoutModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin keluar ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Layout container -->
            <div class="layout-page">
                @yield('user')
                <br>
            </div>

        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:assets/admin&login/vendor/js/core.js -->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new Tooltip(tooltipTriggerEl);
        });
    </script>
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



    <script>
        if (localStorage.getItem("count_timer")) {
            var count_timer = localStorage.getItem("count_timer");
        } else {
            var count_timer = 30;
        }

        var minutes = parseInt(count_timer / 60);
        var seconds = parseInt(count_timer % 60);

        function countDownTimer() {
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            if (minutes < 10) {
                minutes = "0" + minutes;
            }

            document.getElementById("total-time-left").innerHTML = minutes + " Minutes " + seconds +
                " Seconds" + " Left";


            if (count_timer <= 0) {
                localStorage.clear("count_timer");
                $('#exam_form').submit();
            } else {
                count_timer = count_timer - 1;
                minutes = parseInt(count_timer / 60);
                seconds = parseInt(count_timer % 60);
                localStorage.setItem("count_timer", count_timer);
                setTimeout("countDownTimer()", 1000);
            }

        }
        setTimeout("countDownTimer()", 1000);
    </script>



</body>


</html>
