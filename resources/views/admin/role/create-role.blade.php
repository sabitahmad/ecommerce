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
                    <div class="row ms-1" data-masonry='{"percentPosition": true }'>
                        @foreach ($groupedPermissions->chunk(1) as $chunks)
                        <div class="col-md-3">
                            <div class="card ">
                                @foreach ($chunks as $prefix => $permissions)
                                    <span class="p-3">
                                        <label class="fs-18 float-start" for="">{{ ucwords($prefix) }}</label>
                                        <label class="float-end fs-15" for="prefix-checkbox-{{ $prefix }}">Select All</label>
                                        <input type="checkbox" class="prefix-checkbox form-check-input me-2 float-end" id="prefix-checkbox-{{$prefix }}" role="switch" data-prefix="{{ $prefix }}">
                                    </span>
                                    <ul class="p-3">
                                    @foreach($permissions as $permission)
                                        <div>
                                            <input type="checkbox" name="permissions[]" id="permission-checkbox-{{ $permission->id }}" value="{{ $permission->id }}" class="form-check-input permission-checkbox">
                                            <label for="permission-checkbox-{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                    </ul>
                                @endforeach
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
@push('bottom_js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.prefix-checkbox').on('click', function() {
                var prefix = $(this).data('prefix');
                var permissionCheckboxes = $(this).closest('span').next('ul').find('.permission-checkbox');
                var isChecked = $(this).prop('checked');

                permissionCheckboxes.prop('checked', isChecked);
            });

            $('.permission-checkbox').on('click', function() {
                var checkboxId = $(this).attr('id');
                var prefix = $(this).closest('ul').prev('span').find('.prefix-checkbox');
                var permissionCheckboxes = $(this).closest('ul').find('.permission-checkbox');
                var isAllChecked = permissionCheckboxes.length === permissionCheckboxes.filter(':checked').length;

                prefix.prop('checked', isAllChecked);
            });

            // Handle click event on text elements
            $('label[for^="permission-checkbox-"]').on('click', function() {
                var checkboxId = $(this).attr('for');
                $('#' + checkboxId).prop('checked'); // Trigger the associated checkbox click event
            });
            $('label[for^="permission-checkbox-"]').on('click', function() {
                var checkboxId = $(this).attr('for');
                $('#' + checkboxId).prop('checked'); // Trigger the associated checkbox click event
            });
        });
    </script>
@endpush