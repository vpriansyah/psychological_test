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
                                    .....
                                </td>
                            </tr>

                            {{-- MODAL DELETE --}}
                            <div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="ModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda ingin menghapus data ini ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                            <button type="button" class="btn btn-danger"> <span
                                                    class="tf-icons bx bx-trash"></span>Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <!--/ Basic Bootstrap Table -->
    @endsection
