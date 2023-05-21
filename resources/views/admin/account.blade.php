@Extends('layouts.admin')

@section('admin')
    <!-- Content wrapper -->
    <div class="content-wrapper">


        <!-- Modal -->
        <div class="modal fade" id="createAccount" tabindex="-1" aria-labelledby="createAccount" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createAccount">Create New Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Register Card -->
                        <div class="card">
                            <div class="card-body">
                                <form id="formAuthentication" class="mb-3" action="/account" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" id="username" name="username"
                                            class="form-control @error('username') is-invalid @enderror"
                                            placeholder="Enter your username" autofocus required
                                            value="{{ old('username') }}" />
                                        @error('username')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter your email" required value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password" class="form-control"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" required />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" aria-label="Default select example" name="role_id">
                                            <option selected>Role User</option>
                                            <option value="1">User</option>
                                            <option value="2">HRD</option>
                                            <option value="3">admin</option>
                                        </select>
                                    </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>


                        <!-- Register Card -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>

            </div>
        </div>


        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Setting /</span>
                Account</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Account User</h5>
                <div class="row align-items-start">
                    <div class="row">
                        <div class="col-md-4 offset-md-10">
                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                data-bs-target="#createAccount">Create New Account</button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table">

                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @foreach ($data as $account)
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        <strong>{{ $account->username }}</strong>
                                    </td>
                                    <td>{{ $account->email }}</td>
                                    <td>
                                        {{ $account->password }}
                                    </td>
                                    <td>
                                        {{ $account->role_id }}
                                    </td>
                                    <td><span class="badge bg-label-primary me-1">Active</span></td>
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
