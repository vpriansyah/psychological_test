@Extends('layouts.admin')
@section('admin')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resource /</span>Laporan</h4>
        @if (session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('delete'))
            <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Table Laporan</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Posisi Pilihan</th>
                            <th>Hasil Poin</th>
                            <th>Keterangan</th>
                            <th>Tanggal Pengerjaan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $hasil)
                            <tr>
                                <td>
                                    <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                    <strong>{{ $hasil->user->nama_lengkap }}</strong>
                                </td>
                                <td>
                                    {{ $hasil->user->posisi_pilihan }}
                                </td>
                                <td>
                                    {{ $hasil->jumlah_poin }}
                                </td>
                                <td>
                                    {{ $hasil->keterangan }}
                                </td>
                                <td>
                                    @php
                                        echo $hasil->created_at->format('l, d F Y H:i:s');
                                    @endphp
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-success"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<i class='bx bx-edit bx-xs' ></i> <span>edit</span>">
                                        <span class="tf-icons bx bx-edit" data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $hasil->id }}"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-danger"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<i class='bx bx-edit bx-xs' ></i> <span>edit</span>">
                                        <span class="tf-icons bx bx-trash" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $hasil->id }}"></span>
                                    </button>
                                    </button>
                                </td>
                            </tr>

                            {{-- MODAL DELETE --}}
                            <div class="modal fade" id="delete{{ $hasil->id }}" tabindex="-1"
                                aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda ingin menghapus data {{ $hasil->user->nama_lengkap }} ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="/laporan/{{ $hasil->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"> <span
                                                        class="tf-icons bx bx-trash"></span>Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- MODAL EDIT --}}

                            <div class="modal fade" id="edit{{ $hasil->id }}" tabindex="-1" aria-labelledby="editAlur"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editAlur">Tambah keterangan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Register Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <form id="formAuthentication" class="mb-3"
                                                        action="/laporan/edit/{{ $hasil->id }}" method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="keterangan" class="form-label">Keterangan</label>
                                                            <input type="text" id="keterangan" name="keterangan"
                                                                class="form-control" placeholder="Enter your keterangan"
                                                                autofocus required />
                                                        </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>


                                            <!-- Register Card -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

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
