@Extends('layouts.hrd')
@section('hrd')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resource /</span> Alur Pengerjaan</h4>
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
                        <h5 class="modal-title" id="createAlur">Create New Alur Pengerjaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Register Card -->
                        <div class="card">
                            <div class="card-body">
                                <form id="formAuthentication" class="mb-3" action="/alur" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="alur_pengerjaan" class="form-label">Alur Pengerjaan</label>
                                        <input type="text" id="alur_pengerjaan" name="alur_pengerjaan"
                                            class="form-control @error('alur_pengerjaan') is-invalid @enderror"
                                            placeholder="Enter your alur" autofocus required />
                                        @error('alur_pengerjaan')
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
            <h5 class="card-header">Table Alur</h5>
            <div class="row align-items-start">
                <div class="row">
                    <div class="col-md-4 offset-md-9">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                            data-bs-target="#createAlur">Create New Alur</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Alur Pengerjaan</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $alur)
                            <tr>
                                <td>
                                    {{ $alur->alur_pengerjaan }}
                                </td>
                                <td>
                                    ...
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true"
                                        title="<i class='bx bx-book-open bx-xs' ></i> <span>view</span>">
                                        <span class="tf-icons bx bx-book-open"></span>
                                    </button>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-success"
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                        data-bs-html="true" title="<i class='bx bx-edit bx-xs' ></i> <span>edit</span>">
                                        <span class="tf-icons bx bx-edit"></span>
                                    </button>
                                    <form action="/alur/{{ $alur->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm rounded-pill btn-icon btn-outline-danger"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                            data-bs-html="true"
                                            title="<i class='bx bx-trash bx-xs' ></i> <span>delete</span>">
                                            <span class="tf-icons bx bx-trash"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    @endsection
