@Extends('layouts.admin')
@section('admin')
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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span> Notification</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Ajuan</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Alasan</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $ajuan)
                            <tr>
                                <td>
                                    <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                    <strong>{{ $ajuan->nama }}</strong>
                                </td>
                                <td>
                                    {{ $ajuan->email }}
                                </td>
                                <td>
                                    {{ $ajuan->keperluan }}
                                </td>
                                <td>
                                    ...
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-primary" href="javascript:void(0);"><i
                                                    class="bx bx-show-alt me-1 text-primary"></i> View</a>
                                            <a class="dropdown-item text-success" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1 text-success"></i> Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1 text-danger"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <!--/ Basic Bootstrap Table -->
    @endsection
