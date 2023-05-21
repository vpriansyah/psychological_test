@Extends('layouts.user')
@section('user')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span>Profile User</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <!-- Basic Layout -->
            <div class="col-xxl">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Profile Layout</h5>
                    <small class="text-muted float-end">Calon Karyawan</small>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-name"
                                    placeholder="Masukkan Usename" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-company"
                                    placeholder="Masukkan Nama Lengkap" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-default-email" class="form-control"
                                        placeholder="Masukkan Email" aria-label="john.doe"
                                        aria-describedby="basic-default-email2" />
                                    <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                </div>
                                <div class="form-text">Segala pemberian informasi melalui email.</div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Posisi Pilihan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-company"
                                    placeholder="Masukkan posisi yang dilamar" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Tempat Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="basic-default-company"
                                    placeholder="Masukkan Tempat Lahir" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="html5-date-input" class="col-md-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-md-10">
                                <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Alamat</label>
                            <div class="col-sm-10">
                                <textarea type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="Masukkan Alamat"
                                    aria-label="" aria-describedby=""></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Masukkan Foto Formal</label>
                            <input class="form-control" type="file" id="formFile" />
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-14">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>


        <!--/ Basic Bootstrap Table -->
    @endsection
