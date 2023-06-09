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
                    <form action="/soal" method="GET">
                        <input type="search" class="form-control border-0 shadow-none" name="search"
                            placeholder="Search..." aria-label="Search..." />


                </div>
                <select class="form-select ms-5" name="search">
                    <option value="">Semua Kategori</option>
                    @foreach ($kategori as $kat2)
                        <option value="{{ $kat2->id }}">{{ $kat2->kategori }}</option>
                    @endforeach

                </select>

                <button class="btn btn-primary ms-5" type="submit">search</button>
                </form>
            </div>
            <!-- /Search -->
            </ul>
        </div>
    </nav>


    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light">Resource /</span> Paket Soal</h4>
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

        <div class="modal fade" id="createSoal" tabindex="-1" aria-labelledby="createSoal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createSoal">Create New Soal</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Register Card -->
                        <div class="card">
                            <div class="card-body">
                                <form id="formAuthentication" class="mb-3" action="/soal" method="POST">
                                    @csrf
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
                                                <option value="{{ $kat2->id }}">{{ $kat2->kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="soal" class="form-label">Soal</label>
                                        <input type="text" id="soal" name="soal"
                                            class="form-control @error('soal') is-invalid @enderror"
                                            placeholder="Enter your Soal" autofocus required />
                                        @error('soal')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="jawaban_A" class="form-label">Jawaban A</label>
                                        <input type="text" id="jawaban_A" name="jawaban_A"
                                            class="form-control @error('jawaban_A') is-invalid @enderror"
                                            placeholder="Enter your Jawaban" autofocus required />
                                        @error('jawaban_A')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <select class="dropdown mt-3 mb-3 form-select" name="poin_A"
                                            onchange="updateOptions(this)" data-index="1">
                                            <option value="">Pilih nilai poin</option>
                                            <option value="1">Poin 1</option>
                                            <option value="2">Poin 2</option>
                                            <option value="3">Poin 3</option>
                                            <option value="4">Poin 4</option>
                                            <option value="5">Poin 5</option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jawaban_B" class="form-label">Jawaban B<B></B></label>
                                        <input type="text" id="jawaban_B" name="jawaban_B"
                                            class="form-control @error('jawaban_B') is-invalid @enderror"
                                            placeholder="Enter your Jawaban" autofocus required />
                                        @error('jawaban_B')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <select class="dropdown mt-3 mb-3 form-select" name="poin_B"
                                            onchange="updateOptions(this)" data-index="2">
                                            <option value="">Pilih nilai poin</option>
                                            <option value="1">Poin 1</option>
                                            <option value="2">Poin 2</option>
                                            <option value="3">Poin 3</option>
                                            <option value="4">Poin 4</option>
                                            <option value="5">Poin 5</option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jawaban_C" class="form-label">Jawaban C</label>
                                        <input type="text" id="jawaban_C" name="jawaban_C"
                                            class="form-control @error('jawaban_C') is-invalid @enderror"
                                            placeholder="Enter your Jawaban" autofocus required />
                                        @error('jawaban_C')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <select class="dropdown mt-3 mb-3 form-select" name="poin_C"
                                            onchange="updateOptions(this)" data-index="3">
                                            <option value="">Pilih nilai poin</option>
                                            <option value="1">Poin 1</option>
                                            <option value="2">Poin 2</option>
                                            <option value="3">Poin 3</option>
                                            <option value="4">Poin 4</option>
                                            <option value="5">Poin 5</option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jawaban_D" class="form-label">Jawaban D</label>
                                        <input type="text" id="jawaban_D" name="jawaban_D"
                                            class="form-control @error('jawaban_D') is-invalid @enderror"
                                            placeholder="Enter your Jawaban" autofocus required />
                                        @error('jawaban_D')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <select class="dropdown mt-3 mb-3 form-select" name="poin_D"
                                            onchange="updateOptions(this)" data-index="4">
                                            <option value="">Pilih nilai poin</option>
                                            <option value="1">Poin 1</option>
                                            <option value="2">Poin 2</option>
                                            <option value="3">Poin 3</option>
                                            <option value="4">Poin 4</option>
                                            <option value="5">Poin 5</option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jawaban_E" class="form-label">Jawaban E</label>
                                        <input type="text" id="jawaban_E" name="jawaban_E"
                                            class="form-control @error('jawaban_E') is-invalid @enderror"
                                            placeholder="Enter your Jawaban" autofocus required />
                                        @error('jawaban_E')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <select class="dropdown mt-3 mb-3 form-select" name="poin_E"
                                            onchange="updateOptions(this)" data-index="5">
                                            <option value="">Pilih nilai poin</option>
                                            <option value="1">Poin 1</option>
                                            <option value="2">Poin 2</option>
                                            <option value="3">Poin 3</option>
                                            <option value="4">Poin 4</option>
                                            <option value="5">Poin 5</option>

                                        </select>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>


                        <!-- Modal Card -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>

            </div>
        </div>

        <!-- Basic Bootstrap Table -->
        <div class="card mt-4">
            <h5 class="card-header">Table Paket Soal</h5>
            <div class="row align-items-start">
                <div class="row">

                    <div class="col-md-4 offset-md-10">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#createSoal">Create New Soal</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table mb-4 mt-3">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th>Soal</th>
                            <th>Kategori</th>
                            <th>Jawaban A</th>
                            <th>Jawaban B</th>
                            <th>Jawaban C</th>
                            <th>Jawaban D</th>
                            <th>Jawaban E</th>
                            <th>Poin A</th>
                            <th>Poin B</th>
                            <th>Poin C</th>
                            <th>Poin D</th>
                            <th>Poin E</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $poin)
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true"
                                        title="<i class='bx bx-book-open bx-xs' ></i> <span>view</span>">
                                        <span class="tf-icons bx bx-book-open" data-bs-toggle="modal"
                                            data-bs-target="#view{{ $poin->id }}"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-success"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<i class='bx bx-edit bx-xs' ></i> <span>edit</span>">
                                        <span class="tf-icons bx bx-edit" data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $poin->id }}"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-danger"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true"
                                        title="<i class='bx bx-trash bx-xs' ></i> <span>delete</span>">
                                        <span class="tf-icons bx bx-trash" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete{{ $poin->id }}"></span>
                                    </button>
                                </td>
                                <td>
                                    <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                    <strong> {{ $poin->soal }}</strong>
                                </td>
                                <td>
                                    {{ $poin->kategori->kategori }}
                                </td>
                                <td>
                                    {{ $poin->jawaban_A }}
                                </td>
                                <td>
                                    {{ $poin->jawaban_B }}
                                </td>
                                <td>
                                    {{ $poin->jawaban_C }}
                                </td>
                                <td>
                                    {{ $poin->jawaban_D }}
                                </td>
                                <td>
                                    {{ $poin->jawaban_E }}
                                </td>
                                <td>
                                    {{ $poin->poin_A }}
                                </td>
                                <td>
                                    {{ $poin->poin_B }}
                                </td>
                                <td>
                                    {{ $poin->poin_C }}
                                </td>
                                <td>
                                    {{ $poin->poin_D }}
                                </td>
                                <td>
                                    {{ $poin->poin_E }}
                                </td>

                            </tr>


                            {{-- MODAL VIEW --}}

                            <div class="modal fade" id="view{{ $poin->id }}" tabindex="-1" aria-labelledby="edit"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit">View Soal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Register Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <form id="formAuthentication" class="mb-3">
                                                        <div class="mb-3">
                                                            <label for="soal" class="form-label">Kategori</label>
                                                            <input type="text" id="soal" name="soal"
                                                                class="form-control" autofocus required
                                                                value="{{ $poin->kategori->kategori }}" disabled />
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="soal" class="form-label">Soal</label>
                                                            <input type="text" id="soal" name="soal"
                                                                class="form-control" autofocus required
                                                                value="{{ $poin->soal }}" disabled />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jawaban_A" class="form-label">Jawaban
                                                                A</label>
                                                            <input type="text" id="jawaban_A" name="jawaban_A"
                                                                class="form-control" autofocus required
                                                                value="{{ $poin->jawaban_A }} | Poin : {{ $poin->poin_A }}"
                                                                disabled />

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jawaban_B" class="form-label">Jawaban
                                                                B</label>
                                                            <input type="text" id="jawaban_B" name="jawaban_B"
                                                                class="form-control" autofocus required
                                                                value="{{ $poin->jawaban_B }} | Poin : {{ $poin->poin_B }}"
                                                                disabled />

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jawaban_C" class="form-label">Jawaban
                                                                C</label>
                                                            <input type="text" id="jawaban_C" name="jawaban_C"
                                                                class="form-control" autofocus required
                                                                value="{{ $poin->jawaban_C }} | Poin : {{ $poin->poin_C }}"
                                                                disabled />

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jawaban_D" class="form-label">Jawaban
                                                                D</label>
                                                            <input type="text" id="jawaban_D" name="jawaban_D"
                                                                class="form-control" autofocus required
                                                                value="{{ $poin->jawaban_D }} | Poin : {{ $poin->poin_D }}"
                                                                disabled />

                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jawaban_E" class="form-label">Jawaban
                                                                E</label>
                                                            <input type="text" id="jawaban_E" name="jawaban_E"
                                                                class="form-control" autofocus required
                                                                value="{{ $poin->jawaban_E }} | Poin : {{ $poin->poin_E }}"
                                                                disabled />

                                                        </div>
                                                </div>

                                            </div>
                                            </form>


                                            <!-- Modal Card -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>

                                </div>
                            </div>


                            {{-- MODAL UPDATE --}}

                            <div class="modal fade" id="edit{{ $poin->id }}" tabindex="-1" aria-labelledby="edit"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="edit">Edit Soal</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Register Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <form id="formAuthentication" class="mb-3"
                                                        action="/soal/edit/{{ $poin->id }}" method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="soal" class="form-label">Kategori</label>
                                                            <select
                                                                class="form-select @error('kategori_id') is-invalid @enderror"
                                                                aria-label="Default select example" name="kategori_id"
                                                                required>
                                                                @error('kategori_id')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                                <option value="{{ $poin->kategori->id }}" selected>
                                                                    {{ $poin->kategori->kategori }}</option>
                                                                @foreach ($kategori as $kat2)
                                                                    <option value="{{ $kat2->id }}">
                                                                        {{ $kat2->kategori }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="soal" class="form-label">Soal</label>
                                                            <input type="text" id="soal" name="soal"
                                                                class="form-control @error('soal') is-invalid @enderror"
                                                                placeholder="Enter your Soal" autofocus required
                                                                value="{{ $poin->soal }}" />
                                                            @error('soal')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jawaban_A" class="form-label">Jawaban
                                                                A</label>
                                                            <input type="text" id="jawaban_A" name="jawaban_A"
                                                                class="form-control @error('jawaban_A') is-invalid @enderror"
                                                                placeholder="Enter your Jawaban" autofocus required
                                                                value="{{ $poin->jawaban_A }}" />
                                                            @error('jawaban_A')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <select class="dropdown mt-3 mb-3 form-select" name="poin_A"
                                                                onchange="updateOptions(this)" data-index="1">
                                                                <option value="{{ $poin->poin_A }}">{{ $poin->poin_A }}
                                                                </option>
                                                                <option value="1">Poin 1</option>
                                                                <option value="2">Poin 2</option>
                                                                <option value="3">Poin 3</option>
                                                                <option value="4">Poin 4</option>
                                                                <option value="5">Poin 5</option>

                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jawaban_B" class="form-label">Jawaban
                                                                B<B></B></label>
                                                            <input type="text" id="jawaban_B" name="jawaban_B"
                                                                class="form-control @error('jawaban_B') is-invalid @enderror"
                                                                placeholder="Enter your Jawaban" autofocus required
                                                                value="{{ $poin->jawaban_B }}" />
                                                            @error('jawaban_B')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <select class="dropdown mt-3 mb-3 form-select" name="poin_B"
                                                                onchange="updateOptions(this)" data-index="2">
                                                                <option value="{{ $poin->poin_B }}">{{ $poin->poin_B }}
                                                                </option>
                                                                <option value="1">Poin 1</option>
                                                                <option value="2">Poin 2</option>
                                                                <option value="3">Poin 3</option>
                                                                <option value="4">Poin 4</option>
                                                                <option value="5">Poin 5</option>

                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jawaban_C" class="form-label">Jawaban
                                                                C</label>
                                                            <input type="text" id="jawaban_C" name="jawaban_C"
                                                                class="form-control @error('jawaban_C') is-invalid @enderror"
                                                                placeholder="Enter your Jawaban" autofocus required
                                                                value="{{ $poin->jawaban_C }}" />
                                                            @error('jawaban_C')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <select class="dropdown mt-3 mb-3 form-select" name="poin_C"
                                                                onchange="updateOptions(this)" data-index="3">
                                                                <option value="{{ $poin->poin_C }}">{{ $poin->poin_C }}
                                                                </option>
                                                                <option value="1">Poin 1</option>
                                                                <option value="2">Poin 2</option>
                                                                <option value="3">Poin 3</option>
                                                                <option value="4">Poin 4</option>
                                                                <option value="5">Poin 5</option>

                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jawaban_D" class="form-label">Jawaban
                                                                D</label>
                                                            <input type="text" id="jawaban_D" name="jawaban_D"
                                                                class="form-control @error('jawaban_D') is-invalid @enderror"
                                                                placeholder="Enter your Jawaban" autofocus required
                                                                value="{{ $poin->jawaban_D }}" />
                                                            @error('jawaban_D')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <select class="dropdown mt-3 mb-3 form-select" name="poin_D"
                                                                onchange="updateOptions(this)" data-index="4">
                                                                <option value="{{ $poin->poin_D }}">{{ $poin->poin_D }}
                                                                </option>
                                                                <option value="1">Poin 1</option>
                                                                <option value="2">Poin 2</option>
                                                                <option value="3">Poin 3</option>
                                                                <option value="4">Poin 4</option>
                                                                <option value="5">Poin 5</option>

                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jawaban_E" class="form-label">Jawaban
                                                                E</label>
                                                            <input type="text" id="jawaban_E" name="jawaban_E"
                                                                class="form-control @error('jawaban_E') is-invalid @enderror"
                                                                placeholder="Enter your Jawaban" autofocus required
                                                                value="{{ $poin->jawaban_E }}" />
                                                            @error('jawaban_E')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <select class="dropdown mt-3 mb-3 form-select" name="poin_E"
                                                                onchange="updateOptions(this)" data-index="5">
                                                                <option value="{{ $poin->poin_E }}">{{ $poin->poin_E }}
                                                                </option>
                                                                <option value="1">Poin 1</option>
                                                                <option value="2">Poin 2</option>
                                                                <option value="3">Poin 3</option>
                                                                <option value="4">Poin 4</option>
                                                                <option value="5">Poin 5</option>

                                                            </select>
                                                        </div>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            </form>


                                            <!-- Modal Card -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>

                                </div>
                            </div>


                            {{-- MODAL DELETE --}}
                            <div class="modal fade" id="ModalDelete{{ $poin->id }}" tabindex="-1"
                                aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Soal</h5>
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
                                            <form action="/soal/{{ $poin->id }}" method="post" class="d-inline">
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
