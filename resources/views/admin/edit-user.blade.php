@extends('admin.layouts.main')

@section('title', 'Edit User')

@section('head_title', 'Edit User')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card" id="customerList">
            <div class="card-header border-bottom-dashed">
                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <h4 class="card-title mb-0 flex-grow-1">Edit User</h4>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2 mb-4">
                            <a href="{{ route('users.index') }}" class="btn btn-primary add-btn"> User List</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" action="{{ route('users.update', $user->id) }}" method="POST" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">First name</label>
                        <input type="text" class="form-control" name="fname" id="validationCustom01" placeholder="Enter First Name" value="{{ $user->fname }}" required>
                        <div class="invalid-feedback">
                            Please enter first name.
                        </div>
                        @error('fname')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" class="form-control" name="lname" id="validationCustom02" placeholder="Enter Last Name" value="{{ $user->lname }}" required>
                        <div class="invalid-feedback">
                            Please enter last name.
                        </div>
                        @error('lname')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="validationCustom03" placeholder="Enter Email" value="{{ $user->email }}" required>
                        <div class="invalid-feedback">
                            Please enter email.
                        </div>
                        @error('email')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="phone-field" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone-field" class="form-control" placeholder="Enter phone no." value="{{ $user->phone }}" required />
                        <div class="invalid-feedback">Please enter a phone.</div>
                    </div>
                    <div class="col-md-6">
                        <label for="choices-single-default" class="form-label">Role select</label>
                        <select class="form-control" data-choices name="role" id="choices-single-default" required>
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                            <option @if (in_array($role->id, $data)) selected @endif value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Please select role.</div>
                        @error('role')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="status-field" class="form-label">Status</label>
                        <select class="form-control" name="status" id="status-field" required>
                            <option value="">Status</option>
                            <option @if ($user->status == true) selected @endif value="1">Active</option>
                            <option @if ($user->status == false) selected @endif value="0">Block</option>
                        </select>
                        <div class="invalid-feedback">Please enter a phone.</div>
                        @error('status')
                            <span class="text-danger"><small>{{ $message }}</small></span>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="password-input">Password</label>
                            <div class="position-relative auth-pass-inputgroup">
                                <input type="password" class="form-control pe-5 password-input" name="password" onpaste="return false" value="{{ old('password') }}" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                <div class="invalid-feedback">
                                    Please enter password
                                </div>
                                @error('password')
                                    <span class="text-danger"><small>{{ $message }}</small></span>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Update User</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->

@endsection