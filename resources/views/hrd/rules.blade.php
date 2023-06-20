@Extends('layouts.hrd')

@section('hrd')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resource /</span> Rules Exam</h4>
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
        <!-- Modal -->
        <div class="modal fade" id="createAlur" tabindex="-1" aria-labelledby="createAlur" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createAlur">Create New Rules</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Register Card -->
                        <div class="card">
                            <div class="card-body">
                                <form id="formAuthentication" class="mb-3" action="/rules" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="rules_pengerjaan" class="form-label">Rules</label>
                                        <input type="text" id="rules_pengerjaan" name="rules_pengerjaan"
                                            class="form-control @error('rules_pengerjaan') is-invalid @enderror"
                                            placeholder="Enter your rules" autofocus required />
                                        @error('rules_pengerjaan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>


                        <!-- alur Card -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>

            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Table Rules</h5>
            <div class="row align-items-start">
                <div class="row">
                    <div class="col-md-4 offset-md-9">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#createAlur">Create New Rules</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Aturan Pengerjaan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $tatatertib)
                            <tr>
                                <td>
                                    {{ $tatatertib->rules_pengerjaan }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true"
                                        title="<i class='bx bx-book-open bx-xs' ></i> <span>view</span>">
                                        <span class="tf-icons bx bx-book-open" data-bs-toggle="modal"
                                            data-bs-target="#view{{ $tatatertib->id }}"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-success"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<i class='bx bx-edit bx-xs' ></i> <span>edit</span>">
                                        <span class="tf-icons bx bx-edit" data-bs-toggle="modal"
                                            data-bs-target="#edit{{ $tatatertib->id }}"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-danger"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<i class='bx bx-trash bx-xs' ></i> <span>delete</span>">
                                        <span class="tf-icons bx bx-trash" data-bs-toggle="modal"
                                            data-bs-target="#ModalDelete{{ $tatatertib->id }}"></span>
                                    </button>
                                </td>
                            </tr>

                            {{-- MODAL VIEW --}}

                            <div class="modal fade" id="view{{ $tatatertib->id }}" tabindex="-1"
                                aria-labelledby="viewRules" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="viewRules">View Rules Pengerjaan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Register Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <form id="formAuthentication" class="mb-3" action=""
                                                        method="">

                                                        <div class="mb-3">
                                                            <label for="rules_pengerjaan" class="form-label">Rules</label>
                                                            <input type="text" id="rules_pengerjaan"
                                                                name="rules_pengerjaan"
                                                                class="form-control @error('rules_pengerjaan') is-invalid @enderror"
                                                                placeholder="Enter your alur" autofocus required
                                                                value="{{ $tatatertib->rules_pengerjaan }}" disabled />
                                                            @error('rules_pengerjaan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                </div>
                                            </div>
                                            </form>


                                            <!-- View Card -->
                                        </div>
                                        <br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Close</button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- MODAL EDIT --}}

                            <div class="modal fade" id="edit{{ $tatatertib->id }}" tabindex="-1"
                                aria-labelledby="editRules" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editRules">Edit Rules Pengerjaan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Register Card -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <form id="formAuthentication" class="mb-3"
                                                        action="/rules/edit/{{ $tatatertib->id }}" method="POST">
                                                        @method('put')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="rules_pengerjaan" class="form-label">Rules</label>
                                                            <input type="text" id="rules_pengerjaan"
                                                                name="rules_pengerjaan"
                                                                class="form-control @error('rules_pengerjaan') is-invalid @enderror"
                                                                placeholder="Enter your alur" autofocus required
                                                                value="{{ $tatatertib->rules_pengerjaan }}" />
                                                            @error('rules_pengerjaan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
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


                            {{-- MODAL DELETE --}}
                            <div class="modal fade" id="ModalDelete{{ $tatatertib->id }}" tabindex="-1"
                                aria-labelledby="ModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Alur</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin ingin menghapus data ini ?
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <form action="/rules/{{ $tatatertib->id }}" method="post" class="d-inline">
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
            </div>
        </div>
    @endsection
