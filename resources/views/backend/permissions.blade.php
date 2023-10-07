@extends('backend.layouts.main')

@section('title', 'Roles')
@section('main-section')

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="customerList">
            <div class="card-header border-bottom-dashed">
                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <div class="col-xl-2">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Search for permission...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2">
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                            <button class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#CreatePermission" ><i class="ri-add-line align-bottom me-1"></i> Create Permission</button>
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i> Export</button>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="card-body">
                <div class="table-responsive table-card mb-1">
                    <table class="table align-middle">
                        <thead class="table-light text-muted">
                            <tr>
                                <th >SL</th>
                                <th >Prefix</th>
                                <th >Permission Name</th>
                                <th >Create Date</th>
                                <th >Update Date</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody class="bottom">
                            @foreach ($permissions as $key=>$permission)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $permission->prefix }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ date('d M, Y', strtotime($permission->created_at)) }}</td>
                                <td>
                                    @if ($permission->created_at == $permission->updated_at)
                                        {{ 'N/A' }}
                                    @else
                                        {{  date('d M, Y', strtotime($permission->created_at)) }}
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#Edit-{{ $permission->id }}" class="btn btn-primary btn-sm">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" href="#deleteRole{{ $permission->id }}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade zoomIn" id="deleteRole{{ $permission->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mt-2 text-center">
                                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                    <h4>Are you sure ?</h4>
                                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record ?</p>
                                                </div>
                                            </div>
                                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Default Modals -->
                            <div class="modal fade" id="Edit-{{ $permission->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" >Update Permission</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form class="needs-validation" action="{{ route('permissions.update', $permission->id) }}" method="POST" novalidate>
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="col-md-12 mb-3">
                                                    <label for="display_name" class="form-label">Display Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="display_name" id="display_name" placeholder="Enter Display Name" value="{{ $permission->name }}" required>
                                                    <div class="invalid-feedback">
                                                        Please enter display name.
                                                    </div>
                                                    @error('display_name')
                                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="prefix" class="form-label">Prefix Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="prefix" id="prefix" placeholder="Enter Prefix Name" value="{{ $permission->prefix }}" required>
                                                    <div class="invalid-feedback">
                                                        Please enter prefix name.
                                                    </div>
                                                    @error('prefix')
                                                        <span class="text-danger"><small>{{ $message }}</small></span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Permission</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
                <!-- Varying modal content -->
                <div class="modal fade" id="CreatePermission" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" >Create Permission</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form class="needs-validation" action="{{ route('permissions.store') }}" method="POST" novalidate>
                                @csrf
                                <div class="modal-body">
                                    <div class="col-md-12 mb-3">
                                        <label for="display_name" class="form-label">Display Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="display_name" id="display_name" placeholder="Enter Display Name" required>
                                        <div class="invalid-feedback">
                                            Please enter display name.
                                        </div>
                                        @error('display_name')
                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="prefix" class="form-label">Prefix Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="prefix" id="prefix" placeholder="Enter Prefix Name" required>
                                        <div class="invalid-feedback">
                                            Please enter prefix name.
                                        </div>
                                        @error('prefix')
                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Permission</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
            </div>
        </div>

    </div>
    <!--end col-->
</div>
<!--end row-->

@endsection