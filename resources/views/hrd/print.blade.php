<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Print</title>

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

    <div class="card">
        <h5 class="card-header mb-3">Laporan Psikotes Calon Karyawan </h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nama Lengkap</th>
                        <th>Posisi Pilihan</th>
                        <th>Hasil Poin</th>
                        <th>Status</th>
                        <th>Tanggal Pengerjaan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($data as $hasil)
                        <tr>
                            <td>
                                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                <strong>{{ $hasil->nama_lengkap }}</strong>
                            </td>
                            <td>
                                {{ $hasil->posisi_pilihan }}
                            </td>
                            <td>
                                {{ $hasil->jumlah_poin }}
                            </td>
                            <td>
                                @if ($hasil->jumlah_poin > 127)
                                    <span class="badge rounded-pill bg-label-success">
                                        Lolos Ambang Batas
                                    </span>
                                @endif

                                @if ($hasil->jumlah_poin < 127)
                                    <span class="badge rounded-pill bg-label-danger">
                                        Tidak lolos Ambang Batas
                                    </span>
                                @endif

                            </td>
                            <td>
                                @php
                                    echo $hasil->created_at->format('l, d F Y H:i:s');
                                @endphp
                            </td>
                        </tr>


                </tbody>
                @endforeach
            </table>

        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

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


</body>

</html>
