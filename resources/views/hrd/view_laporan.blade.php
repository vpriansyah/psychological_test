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
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header mb-3">View Table Laporan</h5>
            <div class="table-responsive text-nowrap">
                <a style="width: 120px" type="button" href="/print_laporan_hrd" target="_blank"
                    class="btn btn-sm rounded-pill btn-icon btn-outline-primary col-md-4 ms-3 mb-2" data-bs-toggle="tooltip"
                    data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                    title="<i class='bx bx-printer bx-xs' ></i> <span>Print</span>">
                    <span class="tf-icons bx bx-printer" data-bs-toggle="modal"></span>
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Posisi Pilihan</th>
                            <th>Hasil Poin</th>
                            <th>Status</th>
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
                                    @if (($hasil->jumlah_poin > $kategori->ambang_batas) | ($hasil->jumlah_poin == $kategori->ambang_batas))
                                        <span class="badge rounded-pill bg-label-success">
                                            Lolos Ambang Batas
                                        </span>
                                    @endif

                                    @if ($hasil->jumlah_poin < $kategori->ambang_batas)
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
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true"
                                        title="<i class='bx bx-book-open bx-xs' ></i> <span>view</span>">
                                        <span class="tf-icons bx bx-book-open" data-bs-toggle="modal"
                                            data-bs-target="#view{{ $hasil->id }}"></span>
                                    </button>
                                </td>
                            </tr>


                    </tbody>


                    {{-- MODAL VIEW --}}

                    <div class="modal fade" id="view{{ $hasil->id }}" tabindex="-1" aria-labelledby="createAccount"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createAccount">View Laporan User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Register Card -->
                                    <div class="card">
                                        <div class="card-body">

                                            @php
                                                $condition = $hasil->jumlah_poin > 127;
                                            @endphp

                                            <div class="mb-3">
                                                <label for="nama_lengkap" class="form-label">Nama lengkap</label>
                                                <input type="text" id="nama_lengkap" name="nama_lengkap"
                                                    class="form-control" placeholder="Enter your nama_lengkap" autofocus
                                                    required value="{{ $hasil->user->nama_lengkap }}" disabled />

                                            </div>

                                            <div class="mb-3">
                                                <label for="posisi_pilihan" class="form-label">Posisi Pilihan</label>
                                                <input type="text" id="posisi_pilihan" name="posisi_pilihan"
                                                    class="form-control" placeholder="Enter your posisi_pilihan" required
                                                    value="{{ $hasil->user->posisi_pilihan }}" disabled />

                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="keperluan">Keterangan</label>
                                                <div class="input-group input-group-merge">
                                                    <textarea type="text" id="keperluan" name="keperluan" class="form-control" aria-describedby="keperluan" required
                                                        value="" disabled>{{ $hasil->keterangan }}</textarea>
                                                </div>
                                            </div>
                                            <div class="mb-4">
                                                <label class="form-label" for="password">Status</label>
                                                <br>
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
                                            </div>

                                            <div class="mb-3">
                                                Email&nbsp; : &nbsp;{{ $hasil->user->email }}
                                            </div>

                                            <div class="mb-3">
                                                @if ($hasil->jumlah_poin > 127)
                                                    <form action="/EmailLolos" method="POST">
                                                        @csrf
                                                        <input type="text" id="email" name="email"
                                                            class="form-control" placeholder="Enter your email" required
                                                            value="{{ $hasil->user->email }}" hidden />
                                                        <input type="text" id="email" name="email"
                                                            class="form-control" placeholder="Enter your email" required
                                                            value="{{ $hasil->user->email }}" hidden />
                                                        <button type="submit" class="btn rounded-pill btn-success">
                                                            <span class="tf-icons bx bx-mail-send"></span>&nbsp; Kirim
                                                            Email
                                                            Lolos Tahap Selanjutnya
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="/EmailTidakLolos" method="POST">
                                                        @csrf
                                                        <input type="text" id="email" name="email"
                                                            class="form-control" placeholder="Enter your email" required
                                                            value="{{ $hasil->user->email }}" hidden />
                                                        <button type="submit" class="btn rounded-pill btn-danger">
                                                            <span class="tf-icons bx bx-mail-send"></span>&nbsp; Kirim
                                                            Email
                                                            Tidak Lolos
                                                        </button>
                                                    </form>
                                                @endif


                                            </div>



                                        </div>
                                    </div>


                                    <!-- View Card -->
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach
                </table>
                <div class="col-md-4 ms-3 mb-3 mt-5">
                    {{ $data->links() }}
                </div>
            </div>
        </div>

        <!--/ Basic Bootstrap Table -->
    @endsection
