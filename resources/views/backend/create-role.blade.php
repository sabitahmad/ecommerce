@extends('backend.layouts.main')

@section('title', 'Create Roles')
@section('main-section')

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="customerList">
            <div class="card-header border-bottom-dashed">
                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <h4 class="card-title mb-0 flex-grow-1">Create Role</h4>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2">
                            <a href="{{ route('roles.index') }}" class="btn btn-primary add-btn"> Role List</a>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate>
                    <div class="col-md-12">
                        <div class="col-md-4 mx-auto">

                            <label for="rolename" class="form-label">Role name</label>
                            <input type="text" class="form-control" id="rolename" placeholder="Role Name" required>
                            <div class="invalid-feedback">
                                Please enter role name.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 card">
                        <div class="card-header border-bottom-dashed">
                            <div class="row g-4 align-items-center">
                                <div class="col-sm">
                                    <h4 class="card-title mb-0 flex-grow-1">User</h4>
                                </div>
                                <div class="col-sm-auto">
                                    <div class="d-flex flex-wrap align-items-start gap-2">
                                        <div class="form-check form-switch form-switch-md">
                                            <input class="form-check-input" type="checkbox" role="switch" id="selectAll" >
                                            <label class="form-check-label" for="selectAll">Select All</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                   <!-- Custom Switches -->
                                    <div class="form-check form-switch form-switch-md mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck1" >
                                        <label class="form-check-label" for="SwitchCheck1">View User</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- Switches Color -->
                                    <div class="form-check form-switch form-switch-md mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck2" >
                                        <label class="form-check-label" for="SwitchCheck2">Create User</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- Switches Color -->
                                    <div class="form-check form-switch form-switch-md mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck3" >
                                        <label class="form-check-label" for="SwitchCheck3">Edit User</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- Switches Color -->
                                    <div class="form-check form-switch form-switch-md mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch" id="SwitchCheck4" >
                                        <label class="form-check-label" for="SwitchCheck4">Delete User</label>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Submit form</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->

@endsection