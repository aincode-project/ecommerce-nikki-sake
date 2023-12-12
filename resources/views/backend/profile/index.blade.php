@extends('backend.backend_layout.admin')

@section('backend')
<!--breadcrumb-->
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Master Data</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Profile User</li>
            </ol>
        </nav>
    </div>
    {{-- <div class="ms-auto">
        <div class="btn-group">
            <button type="button" class="btn btn-primary">Settings</button>
            <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                <a class="dropdown-item" href="javascript:;">Another action</a>
                <a class="dropdown-item" href="javascript:;">Something else here</a>
                <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
            </div>
        </div>
    </div> --}}
</div>
<!--end breadcrumb-->
{{-- <h6 class="mb-0 text-uppercase">Data User</h6> --}}
<hr/>
<div class="container">
    <div class="main-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="post">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 mb-2 text-secondary">
                                    <h6 class="mb-2">Nama</h6>
                                    <input type="text" class="form-control" name="name" required value="{{ $dataUser->name }}" />
                                </div>
                                <div class="col-sm-6 mb-2 text-secondary">
                                    <h6 class="mb-2">Username</h6>
                                    <input type="text" class="form-control" name="username" required value="{{ $dataUser->username }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-2 text-secondary">
                                    <h6 class="mb-2">Email</h6>
                                    <input type="text" class="form-control" disabled value="{{ $dataUser->email }}" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mb-2 text-secondary text-end">
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Update Profile</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form action="{{ route('profile.updatePassword') }}" method="post">
                            @method('put')
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="password" class="form-label">New Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Enter New Password">
                                    </div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6 mb-4">
                                    <label for="password-confirm" class="form-label">Confirm New Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Enter New Password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mb-2 text-secondary text-end">
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
