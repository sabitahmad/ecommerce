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
                                <input type="text" class="form-control search" placeholder="Search for roles...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2">
                            <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                            <a href="{{ route('roles.create') }}" class="btn btn-primary add-btn"><i class="ri-add-line align-bottom me-1"></i> Create Role</a>
                            <button type="button" class="btn btn-secondary"><i class="ri-file-download-line align-bottom me-1"></i> Import</button>
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
                                <th >Role Name</th>
                                <th >Permission</th>
                                <th >Create Date</th>
                                <th >Update Date</th>
                                <th >Action</th>
                            </tr>
                        </thead>
                        <tbody class="bottom">
                            @foreach ($roles as $key=>$role)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $role->name }}</td>
                                <td><span class="text-primary fs-3 cursor-pointer" data-bs-toggle="modal" data-bs-target="#permission-{{ $role->id }}"> <i class="bx bx-show"></i></span></td>
                                <td>{{ date('d M, Y', strtotime($role->created_at)) }}</td>
                                <td>
                                    @if ($role->created_at == $role->updated_at)
                                        {{ 'N/A' }}
                                    @else
                                        {{  date('d M, Y', strtotime($role->created_at)) }}
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('roles.edit', $role->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" href="#deleteRole{{ $role->id }}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade zoomIn" id="deleteRole{{ $role->id }}" tabindex="-1" aria-hidden="true">
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
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
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
                            <div id="permission-{{ $role->id }}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Permission</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-2">
                                                @foreach ($role->permissions as $item)
                                                <div class="col-4">
                                                    <span class="badge bg-primary-subtle fs-6 text-primary badge-border">{{ $item->name }}</span>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                            @endforeach 
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="showModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-light p-3">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                            </div>
                            <form class="tablelist-form" action="{{ route('users.store') }}" method="POST" >
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="customername-field" class="form-label">Customer Name</label>
                                        <input type="text" name="name" id="customername-field" class="form-control" placeholder="Enter name" required />
                                        <div class="invalid-feedback">Please enter a customer name.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email-field" class="form-label">Email</label>
                                        <input type="email" name="email" id="email-field" class="form-control" placeholder="Enter email" required />
                                        <div class="invalid-feedback">Please enter an email.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="phone-field" class="form-label">Phone</label>
                                        <input type="text" name="phone" id="phone-field" class="form-control" placeholder="Enter phone no." required />
                                        <div class="invalid-feedback">Please enter a phone.</div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="password-input">Password</label>
                                        <div class="position-relative auth-pass-inputgroup">
                                            <input type="password" class="form-control pe-5 password-input" name="password" value="{{ old('password') }}" placeholder="Enter password" id="password-input" aria-describedby="passwordInput" required>
                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                            <div class="invalid-feedback">
                                                Please enter password
                                            </div>
                                            @error('password')
                                                <span class="text-danger"><small>{{ $message }}</small></span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="status-field" class="form-label">Status</label>
                                        <select class="form-control" name="status" data-choices data-choices-search-false name="status-field" id="status-field"  required>
                                            <option value="">Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Block</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="add-btn">Add Customer</button>
                                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                    </div>
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