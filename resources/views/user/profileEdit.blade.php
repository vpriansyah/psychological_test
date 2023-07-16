@Extends('layouts.user')
@section('user')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account / Profile User /</span> Edit</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Profile Edit</h5>
                    <small class="text-muted float-end">Calon Karyawan</small>
                </div>
                <div class="card-body">
                    <form onsubmit="return validateAge()" id="formAuthentication" class="mb-3"
                        action="/profileEdit/{{ auth()->user()->id }}" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" id="basic-default-name" placeholder="Masukkan Usename"
                                    value="{{ auth()->user()->username }}" />
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" name="nama_lengkap"
                                    class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    id="basic-default-company" placeholder="Masukkan Nama Lengkap"
                                    value="{{ auth()->user()->nama_lengkap }}" />
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Gender</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('gender') is-invalid @enderror"
                                    aria-label="Default select example" name="gender" required>
                                    @error('gender')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <option value="{{ auth()->user()->gender }}" selected>{{ auth()->user()->gender }}
                                    </option>
                                    <option value="Laki - laki">Laki - laki</option>
                                    <option value="Perempuan">Perempuan</option>

                                </select>
                            </div>

                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input name="email" type="text" id="basic-default-email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Masukkan Email" aria-label="john.doe"
                                        aria-describedby="basic-default-email2" value="{{ auth()->user()->email }}" />
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                </div>
                                <div class="form-text">Segala pemberian informasi melalui email.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Posisi Pilihan</label>
                            <div class="col-sm-10">
                                <select class="form-select @error('posisi_pilihan') is-invalid @enderror"
                                    aria-label="Default select example" name="posisi_pilihan" required>
                                    <option value="">Pilih Posisi Pilihan</option>
                                    @foreach ($posisi as $posisi)
                                        <option value="{{ $posisi->posisi }}">{{ $posisi->posisi }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input name="tempat_lahir" type="text"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    id="basic-default-company" placeholder="Masukkan Tempat Lahir"
                                    value="{{ auth()->user()->tempat_lahir }}" />
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="lahir" class="col-md-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-10">
                                <input name="tanggal_lahir"
                                    class="form-control @error('tanggal_lahir') is-invalid @enderror" type="date"
                                    value="{{ auth()->user()->tanggal_lahir }}" id="tanggal_lahir" />
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="alamat" type="text" id="basic-default-phone"
                                    class="form-control phone-mask @error('alamat') is-invalid @enderror" placeholder="Masukkan Alamat"
                                    aria-label="" aria-describedby="">{{ auth()->user()->alamat }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="formFile" class="form-label">Masukkan Foto Formal</label>
                            <input class="form-control mb-2" type="file" id="formFile" name="images" />
                        </div>

                        <div class="">
                            <a type="button" href="/profile" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>

    </div>


    <!--/ Basic Bootstrap Table -->
@endsection
