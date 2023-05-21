@Extends('layouts.hrd')
@section('hrd')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Resource /</span> Alur Pengerjaan</h4>
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
    @endsection
