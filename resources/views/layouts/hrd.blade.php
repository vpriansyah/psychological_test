<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard HRD</title>

    <meta name="description" content="" />

    {{-- SweetAlert2 --}}
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">

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
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="admin" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">HRD</span>
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
                        <a href="/hrd" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Resource -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Data</span></li>
                    <!-- Pisisi -->
                    <li class="menu-item">
                        <a href="/posisi" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Tables">Posisi Pilihan</div>
                        </a>
                    </li>
                    <!-- Resource -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Resource</span></li>
                    <!-- Rules -->
                    <li class="menu-item">
                        <a href="/rules" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Tables">Rules Exam</div>
                        </a>
                    </li>
                    <!-- Rules -->
                    <li class="menu-item">
                        <a href="/alur" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Tables">Alur Pengerjaan</div>
                        </a>
                    </li>
                    <!-- Laporan -->
                    <li class="menu-item">
                        <a href="/view_laporan" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Tables">View Laporan</div>
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
                @yield('hrd')
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

    {{-- SweetAler2 --}}
    <script src="assets/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $("posisi").DataTable()
        });

        $(function() {
            $('.form-check-input').change(function() {
                var status = $(this).prop('checked') == true ? 1 : 0;
                var id = $(this).data('id');
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '/changeStatusPosisi',
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



</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Jumlah Pendaftar', 'Sudah Mengerjakan', 'Belum Mengerjakan', 'User Aktif'],
            datasets: [{
                label: 'Grafik Account',
                data: [{{ $data2 }}, {{ $sudah_mengerjakan }}, {{ $data2 }} -
                    {{ $sudah_mengerjakan }}, {{ $user_aktif }}
                ],
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'x',
            // Elements options apply to all of the options unless overridden in a dataset
            // In this case, we are setting the border of each horizontal bar to be 2px wide
            elements: {
                bar: {
                    borderWidth: 1,
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    position: 'right',
                },
                title: {
                    display: true,
                    text: 'Grafik Account User'
                }
            }
        },
    });
</script>

</html>
