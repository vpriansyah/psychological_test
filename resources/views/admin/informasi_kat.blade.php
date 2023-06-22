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
                    <form action="/informasi" method="GET">
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
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Resource /</span> Informasi Kategori</h4>
        @if (session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('delete'))
            <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Modal  CREATE Informasi -->
        <div class="modal fade" id="createinformasi" tabindex="-1" aria-labelledby="createAlur" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Create New Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Register Card -->
                        <div class="card">
                            <div class="card-body">
                                <form id="formAuthentication" class="mb-3" action="/informasi" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="informasi" class="form-label">Informasi</label>
                                        <input type="text" id="informasi" name="informasi"
                                            class="form-control @error('informasi') is-invalid @enderror"
                                            placeholder="Enter your informasi" autofocus required />
                                        @error('informasi')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <select class="form-select @error('kategori_id') is-invalid @enderror"
                                            aria-label="Default select example" name="kategori_id" required>
                                            @error('kategori_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <option value="" selected>Kategori Soal</option>
                                            @foreach ($kategori as $kat2)
                                                <option value="{{ $kat2->id }}">
                                                    {{ $kat2->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>


                        <!-- informasi Card -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>

            </div>
        </div>

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Table Informasi Kategori</h5>
                <div class="row align-items-start">
                    <div class="row">
                        <div class="col-md-4 offset-md-9 mb-3">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#createinformasi">Create New Informasi</button>
                        </div>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Informasi</th>
                            <th></th>
                            <th></th>
                            <th>Kategori</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $informasi)
                            <tr>
                                <td>
                                    <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                    <strong>{{ $informasi->informasi }}</strong>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    {{ $informasi->informasi_kategori->kategori }}
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true"
                                        title="<i class='bx bx-book-open bx-xs' ></i> <span>view</span>">
                                        <span class="tf-icons bx bx-book-open" data-bs-toggle="modal"
                                            data-bs-target="#informasiview{{ $informasi->id }}"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-success"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<i class='bx bx-edit bx-xs' ></i> <span>edit</span>">
                                        <span class="tf-icons bx bx-edit" data-bs-toggle="modal"
                                            data-bs-target="#informasiedit{{ $informasi->id }}"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-danger"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<i class='bx bx-edit bx-xs' ></i> <span>edit</span>">
                                        <span class="tf-icons bx bx-trash" data-bs-toggle="modal"
                                            data-bs-target="#informasidelete{{ $informasi->id }}"></span>
                                    </button>
                                    </button>
                                </td>
                            </tr>



                            {{-- MODAL VIEW --}}

                            <div class="modal fade" id="informasiview{{ $informasi->id }}" tabindex="-1"
                                aria-labelledby="viewAlur" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewAlur">View Informasi</h5>
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
                                                            <label for="informasi" class="form-label">Informasi</label>
                                                            <input type="text" id="informasi" name="informasi"
                                                                class="form-control" placeholder="Enter your informasi"
                                                                autofocus required value="{{ $informasi->informasi }}"
                                                                disabled />

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="kategori" class="form-label">Kategori</label>
                                                            <select
                                                                class="form-select @error('kategori_id') is-invalid @enderror"
                                                                aria-label="Default select example" name="kategori_id"
                                                                required disabled>
                                                                @error('kategori_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                                <option value="" selected>
                                                                    {{ $informasi->informasi_kategori->kategori }}</option>
                                                            </select>
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


                            <!-- Modal  UPDATE Informasi -->
                            <div class="modal fade" id="informasiedit{{ $informasi->id }}" tabindex="-1"
                                aria-labelledby="" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="">Update Informasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Register Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <form id="formAuthentication" class="mb-3"
                                                        action="/informasi/edit/{{ $informasi->id }}" method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="informasi" class="form-label">Informasi</label>
                                                            <input type="text" id="informasi" name="informasi"
                                                                class="form-control @error('informasi') is-invalid @enderror"
                                                                placeholder="Enter your informasi" autofocus required
                                                                value="{{ $informasi->informasi }}" />
                                                            @error('informasi')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="kategori" class="form-label">Kategori</label>
                                                            <select
                                                                class="form-select @error('kategori_id') is-invalid @enderror"
                                                                aria-label="Default select example" name="kategori_id"
                                                                required>
                                                                @error('kategori_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                                <option value="{{ $informasi->informasi_kategori->id }}"
                                                                    selected>
                                                                    {{ $informasi->informasi_kategori->kategori }}</option>
                                                                @foreach ($kategori as $kat2)
                                                                    <option value="{{ $kat2->id }}">
                                                                        {{ $kat2->kategori }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>


                                            <!-- Informasi Card -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- MODAL DELETE Informasi --}}
                            <div class="modal fade" id="informasidelete{{ $informasi->id }}" tabindex="-1"
                                aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Informasi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin ingin menghapus data ini ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="/informasi/{{ $informasi->id }}" method="post"
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
