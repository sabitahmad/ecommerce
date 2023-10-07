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
                <div>
                    <div class="table-responsive table-card mb-1">
                        <table class="table align-middle" id="customerTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="sort" data-sort="customer_name">SL</th>
                                    <th class="sort" data-sort="email">Role Name</th>
                                    <th class="sort" data-sort="phone">Permission</th>
                                    <th class="sort" data-sort="date">Create Date</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @forelse ($users as $user)
                                <tr>
                                    <td class="customer_name">{{ $user->name }}</td>
                                    <td class="email">{{ $user->email }}</td>
                                    <td class="phone">{{ $user->phone }}</td>
                                    <td class="date">{{ date('d M, Y', strtotime($user->created_at)) }}</td>
                                    <td class="status">
                                        @if ($user->status == true)
                                            <span class="badge bg-success-subtle text-success text-uppercase">Active</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger text-uppercase">Block</span>
                                        @endif
                                    </td>
                                    <td>
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="#edit-{{ $user->id }}" data-bs-toggle="modal" class="text-primary d-inline-block edit-item-btn">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                <a class="text-danger d-inline-block remove-item-btn" data-bs-toggle="modal" href="#deleteUser{{ $user->id }}">
                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade zoomIn" id="deleteUser{{ $user->id }}" tabindex="-1" aria-hidden="true">
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
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
                                <div class="modal fade" id="edit-{{ $user->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light p-3">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                                            </div>
                                            <form class="tablelist-form" action="{{ route('users.update', $user->id) }}" method="POST" >
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="customername-field" class="form-label">Customer Name</label>
                                                        <input type="text" name="name" id="customername-field" class="form-control" placeholder="Enter name" required value="{{ $user->name }}"/>
                                                        <div class="invalid-feedback">Please enter a customer name.</div>
                                                        @error('name')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="email-field" class="form-label">Email</label>
                                                        <input type="email" name="email" id="email-field" class="form-control" placeholder="Enter email" required value="{{ $user->email }}" />
                                                        <div class="invalid-feedback">Please enter an email.</div>
                                                        @error('email')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="phone-field" class="form-label">Phone</label>
                                                        <input type="text" name="phone" id="phone-field" class="form-control" placeholder="Enter phone no." required value="{{ $user->phone }}" />
                                                        <div class="invalid-feedback">Please enter a phone.</div>
                                                        @error('phone')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="password-input">Password</label>
                                                        <div class="position-relative auth-pass-inputgroup">
                                                            <input type="password" class="form-control pe-5 password-input" name="password" value="{{ old('password') }}" placeholder="Enter password" id="password-input" aria-describedby="passwordInput">
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
                                                        <select class="form-control" name="status"  id="status-field" required>
                                                            <option value="">Status</option>
                                                            <option @if($user->status == true) selected @endif value="1">Active</option>
                                                            <option @if($user->status == false) selected @endif value="0">Block</option>
                                                        </select>
                                                        @error('status')
                                                            <span class="text-danger"><small>{{ $message }}</small></span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" id="add-btn">Update Customer</button>
                                                        <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end modal -->
                                @empty
                                <div class="noresult">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ customer We did not find any customer for you search.</p>
                                    </div>
                                </div>
                                @endforelse --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
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