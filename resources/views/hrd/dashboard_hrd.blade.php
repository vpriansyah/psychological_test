@Extends('layouts.hrd')

@section('hrd')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Hello -->
                <div class="navbar-nav align-items-center">
                    <div class="nav-item d-flex align-items-center text-primary">
                        <i class="bx bx-home fs-4 lh-0"> Hallo, {{ auth()->user()->username }} </i>
                    </div>
                </div>
                <!-- /Hello -->

                <ul class="navbar-nav flex-row align-items-center ms-auto">

                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="assets/admin&login/img/avatars/default.png" alt
                                    class="w-px-40 h-auto rounded-circle" />
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="assets/admin&login/img/avatars/default.png" alt
                                                    class="w-px-40 h-auto rounded-circle" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-semibold d-block">{{ auth()->user()->username }}</span>
                                            <small class="text-muted">HRD</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#LogoutModal">
                                    <i class="bx bx-power-off me-2 text-danger"></i>
                                    <span class="align-middle text-danger" data-bs-toggle="modal"
                                        data-bs-target="#LogoutModal">Log
                                        Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--/ User -->
                </ul>
            </div>
        </nav>

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-13 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Selamat Datang {{ auth()->user()->username }}! 🎉
                                    </h5>
                                    <p class="mb-4">
                                        Sambutan hangat dari kami untuk Anda yang baru datang, selamat datang !
                                    </p>
                                </div>
                            </div>
                            <div class="col-sm-4 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="assets/admin&login/img/illustrations/man-with-laptop-light.png" height="140"
                                        alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                        data-app-light-img="illustrations/man-with-laptop-light.png" />
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <div class="content-backdrop fade"></div>

                <div class="card" style="width: 600px;height: 600px">
                    <div class="card-body">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6 col-md-4 order-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="assets/admin&login/img/icons/unicons/cc-primary.png"
                                                alt="chart success" class="rounded" />
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">Jumlah Pendaftar</span>
                                    <h3 class="card-title mb-2">{{ $data2 }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="assets/admin&login/img/icons/unicons/cc-success.png" alt="Credit Card"
                                                class="rounded" />
                                        </div>
                                    </div>
                                    <span>Sudah Mengerjakan</span>
                                    <h3 class="card-title text-nowrap mb-1">{{ $sudah_mengerjakan }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="assets/admin&login/img/icons/unicons/cc-warning.png"
                                                alt="chart success" class="rounded" />
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">User Aktif</span>
                                    <h3 class="card-title mb-2">{{ $user_aktif }}</h3>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                            <img src="assets/admin&login/img/icons/unicons/wallet.png" alt="Credit Card"
                                                class="rounded" />
                                        </div>
                                    </div>
                                    <span>Belum Mengerjakan</span>
                                    <h3 class="card-title text-nowrap mb-1">
                                        {{ $sudah_mengerjakan }}</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Content wrapper -->
    @endsection
