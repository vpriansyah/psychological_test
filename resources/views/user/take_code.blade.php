@Extends('layouts.user')
@section('user')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Task /</span> Exam</h4>
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card text-center">
            <div class="card-header text-danger">
                Quiz
            </div>
            <div class="card-body">
                <h3 class="card-title mb-3">Halaman Validasi</h3>
                <div class="row">
                    <div class="mb-3">
                        <div class="text-center">
                        </div>
                        <form action="/take_code" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="kode" class="form-label mb-3">Masukkan Kode Unik Pengerjaan</label>
                                <input type="text" id="kode" name="kode" class="form-control"
                                    placeholder="Enter your kode" autofocus required />

                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-secondary" href="/exam">Back</button>
                                <button type="submit" class="btn btn-primary">Take Quiz</button>
                            </div>
                        </form>

                        note : periksa email untuk memasukkan kode

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
