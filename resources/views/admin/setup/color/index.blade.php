@extends('admin.layouts.main')

@section('title', 'Color')

@section('head_title', 'Color')

@section('content')
<div class="row">
    @can('add color')
    <div class="col-lg-4 mb-4">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('color.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label" for="default-01">Color name</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" id="default-01" placeholder="Enter Color name" name="color_name" value="{{ old('color_name') }}">
                            @error('color_name')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="default-02">Color</label>
                        <div class="form-control-wrap">
                            <input type="color" class="form-control" id="default-02" name="color_code" value="{{ old('color_code') }}">
                            @error('color_code')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Select2 Default</label>
                        <div class="form-control-wrap">
                            <select class="form-select js-select2" name="status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger"><small>{{ $message }}</small></span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-lg btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endcan
    @can('view color')
    <div class="col-lg-8">
        <div class="card p-4">
            
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Color List</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right">
                                                    <em class="icon ni ni-search"></em>
                                                </div>
                                                <input type="text" class="form-control" id="default-04" placeholder="Quick search by id">
                                            </div>
                                        </li>
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown">Status</a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><span>On Hold</span></a></li>
                                                        <li><a href="#"><span>Delivered</span></a></li>
                                                        <li><a href="#"><span>Rejected</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt">
                                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="nk-tb-list is-separate is-medium mb-3">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="oid">
                                    <label class="custom-control-label" for="oid"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col"><span>SL</span></div>
                            <div class="nk-tb-col tb-col-md"><span>Color Name</span></div>
                            <div class="nk-tb-col"><span class="d-none d-sm-block">Color Code</span></div>
                            <div class="nk-tb-col tb-col-sm"><span>Created by</span></div>
                            <div class="nk-tb-col tb-col-md"><span>Create Date</span></div>
                            <div class="nk-tb-col tb-col-md"><span>Update Date</span></div>
                            <div class="nk-tb-col"><span>Action</span></div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1 my-n1">
                                    <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Update Status</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Orders</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-tb-item -->
                        @foreach ($colors as $key=>$color)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="{{ $color->id }}">
                                    <label class="custom-control-label" for="{{ $color->id }}"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-lead">{{ ++$key }}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span class="tb-sub">{{ $color->name }}</span>
                            </div>
                            <div class="nk-tb-col">
                                <span class="dot bg-warning d-sm-none"></span>
                                <span class="badge  d-sm-inline-flex" style="background-color: {{ $color->code }};">{{ $color->code }}</span>
                            </div>
                            <div class="nk-tb-col tb-col-sm">
                                <span class="tb-sub">{{ $color->user->fname.' '.$color->user->lname }}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span class="tb-sub text-primary">{{ date('d M, Y', strtotime($color->created_at)) }}</span>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-sub text-primary">
                                    @if ($color->created_at == $color->updated_at)
                                        {{ 'N/A' }}
                                    @else
                                        {{  date('d M, Y', strtotime($color->created_at)) }}
                                    @endif
                                </span>
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <div class="btn-group">
                                        @can('edit color')
                                            <a href="{{ route('roles.edit', $color->id) }}" type="button" class="btn btn-primary btn-sm">Edit</a>
                                        @endcan
                                        @can('delete color')
                                        <form action="{{ route('color.destroy', $color->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                                        </form>
                                        @endcan
                                    </div>
                            </div>
                        </div><!-- .nk-tb-item -->
                        @endforeach
                    </div><!-- .nk-tb-item -->
                </div><!-- .nk-block -->
            </div>
            
            
        </div>

    </div>
    @endcan
    <!--end col-->
</div>
<!--end row-->
@endsection