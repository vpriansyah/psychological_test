@Extends('layouts.user')
@section('user')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Task /</span> Exam</h4>
        @if (session()->has('warning'))
            <div class="alert alert-danger alert-dismissible fade show mx-auto" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card text-center">
            <div class="card-header text-danger">
                Quiz
            </div>
            <div class="card-body">
                <h5 class="card-title">Psichological Test </h5>
                <p class="card-text">Kategori TKP (Tes Karakteristik Pribadi)</p>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#btnquiz">
                    Take Quiz
                </button>

                <div class="card-footer text-muted text-primary">
                    jumlah soal / waktu
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal animate__animated animate__flipInX" id="btnquiz" tabindex="-1" aria-labelledby="btnquiz"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="exampleModalLabel">Perhatian !</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-5">
                                <div class="text-center">
                                    <label for="nameFlipInX" class="form-label">
                                        <h6 class="text-primary">Informasi Quiz</h6>
                                    </label>
                                </div>
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>
                                                1. Quiz berisi pertanyaan menengai Tes Karakteristik Pribadi.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                2. Satu sesi berisi 45 butir soal.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                3. Satu sesi dikerjakan dalam waktu 60 menit.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <div class="text-center">
                                    <label for="nameFlipInX" class="form-label ">
                                        <h6 class="text-primary text-center">Rules Exam</h6>
                                    </label>
                                </div>
                                <table class="table table-borderless">
                                    <tbody>
                                        @foreach ($data as $rules)
                                            <tr>
                                                <td>
                                                    {{ $rules->rules_pengerjaan }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a type="button" href="/quiz-add" class="btn btn-primary">Take Quiz</a>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
