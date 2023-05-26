@Extends('layouts.hrd')
@section('hrd')
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
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
            </ul>
        </div>
    </nav>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resource /</span>View Laporan</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">View Table Laporan</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>..</th>
                            <th>..</th>
                            <th>..</th>
                            <th>..</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <tr>
                            <td>
                                <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                <strong>..</strong>
                            </td>
                            <td>
                                ..
                            </td>
                            <td>
                                ..
                            </td>
                            <td>
                                ...
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                                    data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                    data-bs-html="true" title="<i class='bx bx-book-open bx-xs' ></i> <span>view</span>">
                                    <span class="tf-icons bx bx-book-open"></span>
                                </button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>

        <!--/ Basic Bootstrap Table -->
    @endsection
