@Extends('layouts.user')
@section('user')
    <style>
        .fixed_div {
            position: fixed;
            padding: 20px;
            text-align: center;
            color: blue;
            top: 50px;
            right: 0;
        }
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-0"><span class="text-muted fw-light">Task /</span> Quiz</h4>
        <div id="total-time-left" align="center"> </div>
        @php
            $nomor_soal = 1;
            $no_id = 1;
            $count = 1;
            $count_id = 1;
        @endphp
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="fixed_div">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">

                        <div class="row">
                            @while ($count_id <= 45)
                                <div class="col"><a class="nav-link scrollto"
                                        href="#{{ $count_id++ }}">{{ $count++ }}</a></div>
                            @endwhile
                        </div>
                    </div>
                </div>

            </div>

            <form id="exam_form" class="mb-3" action="/submitquiz" method="POST">
                @csrf
                @foreach ($tkp->shuffle() as $soal)
                    <div id="{{ $no_id++ }}" class="card mt-4 col-lg-9 mb-4 order-0" style="padding: 0px 20px">
                        <div class="card-header text-danger">
                            No. {{ $nomor_soal++ }}

                        </div>
                        <div class="card-body">

                            <h5 class="card-title mb-5">{{ $soal->soal }}</h5>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault{{ $soal->id }}"
                                    id="flexRadioDefault1" value="{{ $soal->poin_A }}"
                                    {{ $selectedRadio == $soal->poin_A ? 'checked' : '' }} />
                                <label class="form-check-label mb-3" for="flexRadioDefault1">
                                    {{ $soal->jawaban_A }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault{{ $soal->id }}"
                                    id="flexRadioDefault2" value="{{ $soal->poin_B }}" />
                                <label class="form-check-label mb-3" for="flexRadioDefault2">
                                    {{ $soal->jawaban_B }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault{{ $soal->id }}"
                                    id="flexRadioDefault3" value="{{ $soal->poin_C }}" />
                                <label class="form-check-label mb-3" for="flexRadioDefault3">
                                    {{ $soal->jawaban_C }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault{{ $soal->id }}"
                                    id="flexRadioDefault4" value="{{ $soal->poin_D }}" />
                                <label class="form-check-label mb-3" for="flexRadioDefault4">
                                    {{ $soal->jawaban_D }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault{{ $soal->id }}"
                                    id="flexRadioDefault5" value="{{ $soal->poin_E }}" />
                                <label class="form-check-label mb-3" for="flexRadioDefault5">
                                    {{ $soal->jawaban_E }}
                                </label>
                            </div>

                        </div>
                        {{-- <div class="col-md-4 ms-2 mb-3 mt-5">
                    {{ $data->links() }}
                </div> --}}
                    </div>
                @endforeach
                {{-- <input type="text" id="peserta_id" name="peserta_id" class="form-control" autofocus required hidden
                value="{{ auth()->user()->id }}" /> --}}


                <div class="d-flex justify-content-start">
                    <button type="button" class="btn btn-primary mt-3 mb-5 me-3 " data-bs-toggle="modal"
                        data-bs-target="#submit">Finish Attemp</button>
                </div>


                {{-- MODAL SUBMIT --}}
                <div class="modal
                    fade" id="submit" tabindex="-1" aria-labelledby="ModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan !</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda yakin ingin submit pengerjaan ?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <button type="submit" class="btn btn-primary">Submit
                                    <span class="tf-icons bx bx-flag"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>



    </div>
@endsection
