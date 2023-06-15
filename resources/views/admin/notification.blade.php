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
                    <span class="bx bx-search fs-4 lh-0"></span>
                    <form action="/notification" method="GET">
                        <input type="search" class="form-control border-0 shadow-none" name="search"
                            placeholder="Search..." aria-label="Search..." />


                </div>
                <button class="btn btn-primary ms-5" type="submit">search</button>
                </form>
            </div>
            <!-- /Search -->
            </ul>
        </div>
    </nav>

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span> Notification</h4>
        @if (session()->has('delete'))
            <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Ajuan</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Keperluan</th>
                            <th>Status Diterima</th>
                            <th>Action</th>
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
                                    <div class="form-check form-switch mb-2">
                                        <input data-id="{{ $ajuan->id }}" class="form-check-input" type="checkbox"
                                            id="flexSwitchCheckDefault" {{ $ajuan->status ? 'checked' : '' }} />
                                        <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true"
                                        title="<i class='bx bx-book-open bx-xs' ></i> <span>view</span>">
                                        <span class="tf-icons bx bx-book-open" data-bs-toggle="modal"
                                            data-bs-target="#view{{ $ajuan->id }}"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-danger"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<i class='bx bx-trash bx-xs' ></i> <span>delete</span>">
                                        <span class="tf-icons bx bx-trash" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete{{ $ajuan->id }}"></span>
                                    </button>
                                </td>
                            </tr>

                            {{-- MODAL VIEW --}}

                            <div class="modal fade" id="view{{ $ajuan->id }}" tabindex="-1"
                                aria-labelledby="createAccount" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createAccount">View Akun Ajuan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Register Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <form id="formAuthentication" class="mb-3" action=""
                                                        method="">

                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">nama</label>
                                                            <input type="text" id="nama" name="nama"
                                                                class="form-control" placeholder="Enter your nama" autofocus
                                                                required value="{{ $ajuan->nama }}" disabled />

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" id="email" name="email"
                                                                class="form-control" placeholder="Enter your email" required
                                                                value="{{ $ajuan->email }}" disabled />

                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="keperluan">Keperluan</label>
                                                            <div class="input-group input-group-merge">
                                                                <textarea type="text" id="keperluan" name="keperluan" class="form-control" aria-describedby="keperluan" required
                                                                    value="" disabled>{{ $ajuan->keperluan }}</textarea>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                            </form>


                                            <!-- View Card -->
                                        </div>
                                        <br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- MODAL DELETE --}}
                            <div class="modal fade" id="ModalDelete{{ $ajuan->id }}" tabindex="-1"
                                aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Akun Ajuan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin ingin menghapus data {{ $ajuan->nama }} ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="/notification/{{ $ajuan->id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"> <span
                                                        class="tf-icons bx bx-trash"></span>Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>
                <div class="col-md-4 ms-3 mb-3 mt-5">
                    {{ $data->links() }}
                </div>
            </div>
        </div>

        <!--/ Basic Bootstrap Table -->
    @endsection
