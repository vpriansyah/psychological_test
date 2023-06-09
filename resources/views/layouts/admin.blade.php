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

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/admin&login/js/config.js"></script>

    {{-- ajax slice --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"
        integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"
        integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                    {{-- <li class="menu-item">
                        <a href="/paket_soal" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Tables">Paket Soal</div>
                        </a>
                    </li> --}}
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Paket Soal">Paket Soal</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/kategori" class="menu-link">
                                    <div data-i18n="Kategori">Kategori</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/informasi" class="menu-link">
                                    <div data-i18n="informasi">Informasi Kategori</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/soal" class="menu-link">
                                    <div data-i18n="Soal">Soal</div>
                                </a>
                            </li>
                        </ul>
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
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new Tooltip(tooltipTriggerEl);
        });
    </script>
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

    {{-- Change Status User --}}
    <script>
        $(document).ready(function() {
            $("users").DataTable()
        });

        $(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatus',
                    data: {
                        'status': status,
                        'id': id
                    },
                    success: function(data) {
                        console.log('Success')
                    }
                })
            });
        });
    </script>

    {{-- Change Status Notification --}}
    <script>
        $(document).ready(function() {
            $("ajuan").DataTable()
        });

        $(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatusAjuan',
                    data: {
                        'status': status,
                        'id': id
                    },
                    success: function(data) {
                        console.log('Success')
                    }
                })
            });
        });
    </script>

    {{-- VALIDASI UNTUK SELECT PEMBUATAN PAKET SOAL  --}}

    <script>
        function updateOptions(select) {
            var selectedOption = select.options[select.selectedIndex].value;
            var selectedIndex = parseInt(select.getAttribute('data-index'));

            var select2 = document.querySelector('select[data-index="2"]');
            var options2 = select2.options;

            var select3 = document.querySelector('select[data-index="3"]');
            var options3 = select3.options;

            var select4 = document.querySelector('select[data-index="4"]');
            var options4 = select4.options;

            var select5 = document.querySelector('select[data-index="5"]');
            var options5 = select5.options;

            var select1Value = document.querySelector('select[data-index="1"]').value;
            var select2Value = document.querySelector('select[data-index="2"]').value;
            var select3Value = document.querySelector('select[data-index="3"]').value;
            var select4Value = document.querySelector('select[data-index="4"]').value;
            var select5Value = document.querySelector('select[data-index="5"]').value;

            for (var i = 0; i < options2.length; i++) {
                if (options2[i].value === select1Value) {
                    options2[i].disabled = true;
                } else {
                    options2[i].disabled = false;
                }
            }

            for (var i = 0; i < options3.length; i++) {
                if (options3[i].value === select1Value || options3[i].value === select2Value) {
                    options3[i].disabled = true;
                } else {
                    options3[i].disabled = false;
                }
            }

            for (var i = 0; i < options4.length; i++) {
                if (options4[i].value === select1Value || options4[i].value === select2Value || options4[i].value ===
                    select3Value) {
                    options4[i].disabled = true;
                } else {
                    options4[i].disabled = false;
                }
            }

            for (var i = 0; i < options5.length; i++) {
                if (options4[i].value === select1Value || options4[i].value === select2Value || options4[i].value ===
                    select3Value || options4[i].value === select4Value) {
                    options5[i].disabled = true;
                } else {
                    options5[i].disabled = false;
                }
            }

            // Jika opsi yang sudah dipilih pada select 1 dan 2 adalah opsi yang aktif pada select 3, atur select 3 menjadi nilai default
            if (selectedOption === select1Value) {
                select2.value = '';
            }
            if (selectedOption === select1Value || selectedOption === select2Value) {
                select3.value = '';
            }
            if (selectedOption === select1Value || selectedOption === select2Value || selectedOption === select3Value) {
                select4.value = '';
            }
            if (selectedOption === select1Value || selectedOption === select2Value || selectedOption === select3Value ||
                selectedOption === select4Value) {
                select5.value = '';
            }
        }
    </script>



</body>

</html>
