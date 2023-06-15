@Extends('layouts.admin')

@section('admin')
    <!-- Content wrapper -->
    <div class="content-wrapper">


        <!-- Modal Create -->
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
                                            placeholder="Enter your username" autofocus required />
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
                                            placeholder="Enter your email" required />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-password-toggle">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="input-group input-group-merge">
                                            <input type="password" id="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" required />
                                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select @error('role_id') is-invalid @enderror"
                                            aria-label="Default select example" name="role_id">
                                            @error('role_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                            <option value="" selected>Role User</option>
                                            <option value="1">User</option>
                                            <option value="2">HRD</option>
                                            <option value="3">admin</option>
                                        </select>
                                    </div>
                                    <input type="text" id="status" name="status" class="form-control" value="0"
                                        hidden />
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
                        <form action="/account" method="GET">
                            <input type="search" class="form-control border-0 shadow-none" name="search"
                                placeholder="Search..." aria-label="Search..." />


                    </div>
                    <button class="btn btn-primary ms-5" type="submit">search</button>
                    </form>

                </div>
                <!-- /Search -->
                </ul>
            </div>
        </nav>

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Setting /</span>
                Account</h4>
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
                                        {{ $account->role }}
                                    </td>
                                    <td>
                                        <div class="form-check form-switch mb-2">
                                            <input data-id="{{ $account->id }}" class="form-check-input"
                                                type="checkbox" id="flexSwitchCheckDefault"
                                                {{ $account->status ? 'checked' : '' }} />
                                            <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button"
                                            class="btn btn-sm rounded-pill btn-icon btn-outline-primary"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                            data-bs-html="true"
                                            title="<i class='bx bx-book-open bx-xs' ></i> <span>view</span>">
                                            <span class="tf-icons bx bx-book-open" data-bs-toggle="modal"
                                                data-bs-target="#view{{ $account->id }}"></span>
                                        </button>
                                        <button type="button"
                                            class="btn btn-sm rounded-pill btn-icon btn-outline-success"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                            data-bs-html="true"
                                            title="<i class='bx bx-edit bx-xs' ></i> <span>edit</span>">
                                            <span class="tf-icons bx bx-edit" data-bs-toggle="modal"
                                                data-bs-target="#edit{{ $account->id }}"></span>
                                        </button>
                                        <button type="button" class="btn btn-sm rounded-pill btn-icon btn-outline-danger"
                                            data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                            data-bs-html="true"
                                            title="<i class='bx bx-trash bx-xs' ></i> <span>delete</span>">
                                            <span class="tf-icons bx bx-trash" data-bs-toggle="modal"
                                                data-bs-target="#ModalDelete{{ $account->id }}"></span>
                                        </button>
                                    </td>
                                </tr>

                                {{-- MODAL VIEW --}}

                                <div class="modal fade" id="view{{ $account->id }}" tabindex="-1"
                                    aria-labelledby="createAccount" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createAccount">View Account</h5>
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
                                                                <label for="username" class="form-label">Username</label>
                                                                <input type="text" id="username" name="username"
                                                                    class="form-control" placeholder="Enter your username"
                                                                    autofocus required value="{{ $account->username }}"
                                                                    disabled />

                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" id="email" name="email"
                                                                    class="form-control" placeholder="Enter your email"
                                                                    required value="{{ $account->email }}" disabled />

                                                            </div>
                                                            <div class="mb-3 form-password-toggle">
                                                                <label class="form-label" for="password">Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input type="text" id="password" name="password"
                                                                        class="form-control" aria-describedby="password"
                                                                        required value="{{ $account->password }}"
                                                                        disabled />
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <select class="form-select"
                                                                    aria-label="Default select example" name="role_id"
                                                                    disabled>
                                                                    <option selected>{{ $account->role_id }}</option>
                                                                    <option value="1">User</option>
                                                                    <option value="2">HRD</option>
                                                                    <option value="3">admin</option>
                                                                </select>
                                                            </div>
                                                            <input type="text" id="status" name="status"
                                                                class="form-control" value="0" hidden />
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

                                <div class="modal fade" id="edit{{ $account->id }}" tabindex="-1"
                                    aria-labelledby="createAccount" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createAccount">Edit Account User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Register Card -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <form id="formAuthentication" class="mb-3"
                                                            action="/account/edit/{{ $account->id }}" method="POST">
                                                            @method('put')
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="username" class="form-label">Username</label>
                                                                <input type="text" id="username" name="username"
                                                                    class="form-control @error('username') is-invalid @enderror"
                                                                    placeholder="Enter your username" autofocus required
                                                                    value="{{ $account->username }}" />
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
                                                                    placeholder="Enter your email"
                                                                    value="{{ $account->email }}" />
                                                                @error('email')
                                                                    <div class="invalid-feedback">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3 form-password-toggle">
                                                                <label class="form-label" for="password">Password</label>
                                                                <div class="input-group input-group-merge">
                                                                    <input type="password" id="password" name="password"
                                                                        class="form-control @error('password') is-invalid @enderror"
                                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                                        aria-describedby="password" required
                                                                        value="{{ $account->password }}" disabled />
                                                                    <span
                                                                        class="input-group-text
                                                                        cursor-pointer"><i
                                                                            class="bx bx-hide"></i></span>
                                                                    @error('password')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <select
                                                                    class="form-select @error('role_id') is-invalid @enderror"
                                                                    aria-label="Default select example" name="role_id">
                                                                    @error('role_id')
                                                                        <div class="invalid-feedback">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                    <option selected>{{ $account->role_id }}</option>
                                                                    <option value="1">User</option>
                                                                    <option value="2">HRD</option>
                                                                    <option value="3">admin</option>
                                                                </select>
                                                            </div>
                                                            <input type="text" id="status" name="status"
                                                                class="form-control" value="0" hidden />
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
                                <div class="modal fade" id="ModalDelete{{ $account->id }}" tabindex="-1"
                                    aria-labelledby="ModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Apakah anda yakin ingin menghapus data {{ $account->username }} ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="/account/{{ $account->id }}" method="post"
                                                    class="d-inline">
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
