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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resource /</span> Paket Soal</h4>
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
                                <form id="formAuthentication" class="mb-3" action="/paket_soal" method="POST">
                                    @csrf
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
                                        <input type="number" list="poin" id="poin_A" name="poin_A"
                                            class="form-control" placeholder="Enter your Poin" autofocus required>
                                        <datalist id="poin">
                                            <option value="1">
                                            <option value="2">
                                            <option value="3">
                                            <option value="4">
                                            <option value="5">
                                        </datalist>
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
                                        <input type="number" class="form-control" list="poin" name="poin_B"
                                            id="poin_B" placeholder="Enter your Poin">
                                        <datalist id="poin">
                                            <option value="1">
                                            <option value="2">
                                            <option value="3">
                                            <option value="4">
                                            <option value="5">
                                        </datalist>
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
                                        <input type="number" class="form-control" list="poin" name="poin_C"
                                            id="poin_C" placeholder="Enter your Poin">
                                        <datalist id="poin">
                                            <option value="1">
                                            <option value="2">
                                            <option value="3">
                                            <option value="4">
                                            <option value="5">
                                        </datalist>
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
                                        <input type="number" class="form-control" list="poin" name="poin_D"
                                            id="poin_D" placeholder="Enter your Poin">
                                        <datalist id="poin">
                                            <option value="1">
                                            <option value="2">
                                            <option value="3">
                                            <option value="4">
                                            <option value="5">
                                        </datalist>
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
                                        <input type="number" class="form-control" list="poin" name="poin_E"
                                            id="poin_E" placeholder="Enter your Poin">
                                        <datalist id="poin">
                                            <option value="1">
                                            <option value="2">
                                            <option value="3">
                                            <option value="4">
                                            <option value="5">
                                        </datalist>
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
        <div class="card">
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
                <table class="table">
                    <thead>
                        <tr>
                            <th>Soal</th>
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
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $poin)
                            <tr>
                                <td>
                                    <i class="fab fa-bootstrap fa-lg text-primary me-3"></i>
                                    <strong> {{ $poin->soal }}</strong>
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
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-primary" href="javascript:void(0);"><i
                                                    class="bx bx-show-alt me-1 text-primary"></i> View</a>
                                            <a class="dropdown-item text-success" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1 text-success"></i> Edit</a>
                                            <a class="dropdown-item text-danger" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1 text-danger"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <!--/ Basic Bootstrap Table -->
    @endsection
