@extends('admin.layouts.main')

@section('title', 'Create Role')

@section('head_title', 'Create Role')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="customerList">
            <div class="card-header border-bottom-dashed">
                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <h4 class="card-title mb-0 flex-grow-1">Create Role</h4>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2 mb-4">
                            <a href="{{ route('roles.index') }}" class="btn btn-primary add-btn"> Role List</a>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                <form class="row g-3 needs-validation" action="{{ route('roles.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="col-md-12 mb-4">
                        <div class="col-md-4 mx-auto">
                            <label for="rolename" class="form-label">Role name</label>
                            <input type="text" class="form-control" name="role_name" id="rolename" placeholder="Role Name" value="{{ old('role_name') }}" required>
                            <div class="invalid-feedback">
                                Please enter role name.
                            </div>
                            @error('role_name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                    <div class="row ms-1">
                        @foreach($permissions as $permission)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header border-bottom-dashed">
                                        <div class="row g-4 align-items-center">
                                            <div class="col-sm">
                                                @foreach($permission as $key=>$value)
                                                <h4 class="card-title mb-0 flex-grow-1">
                                                    @if($key <1)
                                                    {{ucwords($value->prefix)}}
                                                    @endif
                                                </h4>
                                                @endforeach
                                            </div>
                                            <div class="col-sm-auto">
                                                <div class="d-flex flex-wrap align-items-start gap-2">
                                                    <div class="form-check form-switch form-switch-md">
                                                        <input class="form-check-input" type="checkbox" role="switch" id="checkall" >
                                                        <label class="form-check-label" for="checkall">Select All</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach($permission as $key=>$value)
                                            <div class="col-6">
                                            <!-- Custom Switches -->
                                                <div class="form-check form-switch form-switch-md mb-3">
                                                    <input class="form-check-input" name="permissions[]" value="{{ $value->id }}" type="checkbox" role="switch" id="Switch{{ $value->id }}" >
                                                    <label class="form-check-label" for="Switch{{ $value->id }}">{{ $value->name }}</label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        @endforeach
                    </div>
                        
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">Role Create</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->

@endsection