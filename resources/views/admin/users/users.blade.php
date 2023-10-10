@extends('admin.layouts.main')

@section('title', 'Users')

@section('head_title', 'Users')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card" id="customerList">
            <div class="card-header border-bottom-dashed">
                <div class="row g-4 align-items-center">
                    <div class="col-sm">
                        <div class="col-xl-2">
                            <form action="{{url()->current()}}" method="GET">
                                <div class="search-box">
                                    <input type="text" class="form-control search" placeholder="Search for User..." value="{{$search}}" name="search">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-auto">
                        <div class="d-flex flex-wrap align-items-start gap-2 mb-4">
                            @can('add user')
                                <a href="{{ route('users.create') }}" type="button" class="btn btn-primary add-btn"><i class="ri-add-line align-bottom me-1"></i> Add User</a>
                            @endcan
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
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Joining Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $key=>$user)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $user->fname.' '.$user->lname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            <span class="badge bg-primary-subtle text-primary text-uppercase">{{ $role->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ date('d M, Y', strtotime($user->created_at)) }}</td>
                                    <td>
                                        @if ($user->status == true)
                                            <span class="badge bg-success-subtle text-success text-uppercase">Active</span>
                                        @else
                                            <span class="badge bg-danger-subtle text-danger text-uppercase">Block</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            @can('edit user')
                                                <a href="{{ route('users.edit', $user->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>
                                            @endcan
                                            @can('delete user')
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" href="#deleteUser{{ $user->id }}">Delete</button>
                                            @endcan
                                        </div>
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
                                                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                        <h4>Are you sure ?</h4>
                                                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record ?</p>
                                                    </div>
                                                </div>
                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                                                        <button type="button" class="btn btn-light p-3" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger p-3" id="delete-record">Yes, Delete It!</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="noresult">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                        <p class="text-muted mb-0">We've searched more than 150+ customer We did not find any customer for you search.</p>
                                    </div>
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="card">
                            <div class="card-inner">
                                <div class="nk-block-between-md g-3">
                                    <div class="g">
                                        <ul class="pagination justify-content-center justify-content-md-start">
                                            @if($users->previousPageUrl())
                                                <li class="page-item"><a class="page-link" href="{{ $users->previousPageUrl() }}"><em class="icon ni ni-chevrons-left"></em></a></li>
                                            @endif

                                            @foreach(range(1, $users->lastPage()) as $page)
                                                @if($page == $users->currentPage())
                                                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                                @else
                                                    <li class="page-item"><a class="page-link" href="{{ $users->url($page) }}">{{ $page }}</a></li>
                                                @endif
                                            @endforeach

                                            @if($users->nextPageUrl())
                                                <li class="page-item"><a class="page-link" href="{{ $users->nextPageUrl() }}"><em class="icon ni ni-chevrons-right"></em></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="g">
                                        <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                            <div>Page</div>
                                            <div>
                                                <select class="form-select js-select2 " data-search="on" data-dropdown="xs center">
                                                    <option value="page-1">1</option>
                                                    <option value="page-2">2</option>
                                                    <option value="page-4">4</option>
                                                    <option value="page-5">5</option>
                                                    <option value="page-6">6</option>
                                                    <option value="page-7">7</option>
                                                    <option value="page-8">8</option>
                                                    <option value="page-9">9</option>
                                                    <option value="page-10">10</option>
                                                    <option value="page-11">11</option>
                                                    <option value="page-12">12</option>
                                                    <option value="page-13">13</option>
                                                    <option value="page-14">14</option>
                                                    <option value="page-15">15</option>
                                                    <option value="page-16">16</option>
                                                    <option value="page-17">17</option>
                                                    <option value="page-18">18</option>
                                                    <option value="page-19">19</option>
                                                    <option value="page-20">20</option>
                                                </select>
                                            </div>
                                            <div>OF 102</div>
                                        </div>
                                    </div><!-- .pagination-goto -->
                                </div><!-- .nk-block-between -->
                            </div>
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
