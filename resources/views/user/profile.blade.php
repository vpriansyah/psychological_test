@Extends('layouts.user')
@section('user')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span> Profile User</h4>
        @if (session()->has('update'))
            <div class="alert alert-success alert-dismissible fade show mx-auto" role="alert">
                {{ session('update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('warning'))
            <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Basic Bootstrap Table -->
        {{-- <div class="card"> --}}
        <br>
        <div class="row">
            <!-- Basic -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Profile</h5>
                    @if (auth()->user()->images == null)
                        <img src="assets/admin&login/img/avatars/default.png" alt class="rounded-circle mx-auto"
                            height="160px" width="160px" />
                    @else
                        <img src="{{ asset(auth()->user()->images) }}" alt class="rounded-circle mx-auto" height="160px"
                            width="160px" />
                    @endif

                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="form-Username-toggle">
                            <h6>Username</h6>
                            <div class="input-group text-primary fs-5">
                                <p>{{ auth()->user()->username }}</p>
                            </div>
                        </div>
                        <div class="form-Email-toggle">
                            <h6>Email User</h6>
                            <div class="input-group text-primary fs-5">
                                <p>{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <div class="form-Nama-toggle">
                            <h6>Nama Lengkap</h6>
                            <div class="input-group text-primary fs-5">
                                <p>{{ auth()->user()->nama_lengkap }}</p>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

            <!-- Merged -->
            <div class="col-md-6">
                <div class="card mb-4">

                    <div class="card-body demo-vertical-spacing demo-only-element">
                        <div class="form-gender-toggle">
                            <h6>Gender</h6>
                            <div class="input-group text-primary fs-5">
                                <p>{{ auth()->user()->gender }}</p>
                            </div>
                        </div>
                        <div class="form-posisi-toggle">
                            <h6>Posisi Pilihan</h6>
                            <div class="input-group text-primary fs-5">
                                <p>{{ auth()->user()->posisi_pilihan }}</p>
                            </div>
                        </div>
                        <div class="form-tempat-toggle">
                            <h6>Tempat Lahir</h6>
                            <div class="input-group text-primary fs-5">
                                <p>{{ auth()->user()->tempat_lahir }}</p>
                            </div>
                        </div>
                        <div class="form-tanggal-toggle">
                            <h6>Tanggal Lahir</h6>
                            <div class="input-group text-primary fs-5">
                                <p>{{ auth()->user()->tanggal_lahir }}</p>
                            </div>
                        </div>
                        <div class="form-alamat-toggle">
                            <h6>Alamat Rumah</h6>
                            <div class="input-group text-primary fs-5">
                                <p>{{ auth()->user()->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="container">
            <div class="row justify-content-center mb-4">
                <a type="button" class="btn rounded-pill btn-primary" href="/profileEdit">
                    <span class="tf-icons bx bx-edit"></span>&nbsp; Perbarui Profile
                </a>
            </div>
        </div>
    </div>


    <!--/ Basic Bootstrap Table -->
@endsection
