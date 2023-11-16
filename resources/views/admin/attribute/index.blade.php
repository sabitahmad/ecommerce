@extends('admin.layouts.main')

@section('title', 'Attribute')

@section('head_title', 'Add Attributes')

@section('content')
    <div class="row">
        @can('add attribute')
            <div class="col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('attribute.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="default-01">Attribute name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="default-01" placeholder="Enter attribute name" name="attribute_name" value="{{ old('attribute_name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Attribute Type</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" name="attribute_type">
                                        <option value="color">Color</option>
                                        <option value="value">Value</option>
                                    </select>
{{--                                    @error('status')--}}
{{--                                    <span class="text-danger"><small>{{ $message }}</small></span>--}}
{{--                                    @enderror--}}
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
        @can('view attribute')
            <div class="col-lg-8">
                <div class="card p-4">

                    <div class="nk-content-body">
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h3 class="nk-block-title page-title">Attribute List</h3>
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
                                    <div class="nk-tb-col tb-col-md"><span>Attribute Name</span></div>
                                    <div class="nk-tb-col tb-col-md"><span>Create Date</span></div>
                                    <div class="nk-tb-col tb-col-md"><span>Update Date</span></div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1 my-n1">
                                            <li>
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><em class="icon ni ni-edit"></em><span>Active</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-truck"></em><span>Inactive</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .nk-tb-item -->
                                @foreach ($attributes as $key=>$attribute)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="{{ $attribute->id }}">
                                                <label class="custom-control-label" for="{{ $attribute->id }}"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-lead">{{ ++$key }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-sub"><a href="{{ route('attribute.value.index', $attribute) }}">{{ $attribute->attribute_name }}</a></span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span class="tb-sub text-primary">{{ date('d M, Y', strtotime($attribute->created_at)) }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                <span class="tb-sub text-primary">
                                    @if ($attribute->created_at == $attribute->updated_at)
                                        {{ 'N/A' }}
                                    @else
                                        {{  date('d M, Y', strtotime($attribute->created_at)) }}
                                    @endif
                                </span>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">

                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                <li class="me-n1">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                           data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                @can('edit attribute')
                                                                <li><a class="attribute-edit-button" style="cursor: pointer" data-id="{{$attribute->id}}"><em class="icon ni ni-edit"></em><span>Edit attribute</span></a></li>
                                                                @endcan
                                                                <li>
                                                                    <form action="{{ route('attribute.delete', $attribute) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <a href="" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                            <em class="icon ni ni-trash"></em><span>Remove attribute</span>
                                                                        </a>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>

{{--                                            <div class="btn-group">--}}
{{--                                                @can('delete attribute')--}}
{{--                                                    <form action="{{ route('color.destroy', $attribute->id) }}" method="POST">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('DELETE')--}}
{{--                                                        <button type="submit" class="btn btn-danger btn-sm" >Delete</button>--}}
{{--                                                    </form>--}}
{{--                                                @endcan--}}
{{--                                            </div>--}}
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

    <div class="modal fade" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Attribute</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" method="post" id="modal-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="full-name">Attribute Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="attribute-name" name="attribute_name" required>
                            </div>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label class="form-label" for="cat-modal-status">Color Status</label>--}}
{{--                            <div class="custom-switch">--}}
{{--                                <input type="checkbox" class="custom-control-input" name="status" id="color-modal-status">--}}
{{--                                <label class="custom-control-label" for="color-modal-status">Active</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}


                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('bottom_js')

    <script>
        $(document).ready(function () {
            $("#catImage").change(function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $("#imagePreview").attr("src", e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });

            $("#cat-modal-image").change(function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $("#modalImagePreview").attr("src", e.target.result).show();
                    };
                    reader.readAsDataURL(file);
                }
            });


            $('.attribute-edit-button').click(function () {
                const id = $(this).data('id');

                $.get('{{ route('attribute.edit', ['id' => ':id']) }}'.replace(':id', id), function (data) {
                    $('#attribute-name').val(data.attribute_name);

                    console.log(data)
                    $('#modal-form').attr('action', '{{ route('attribute.update', ['id' => ':id']) }}'.replace(':id', id)); // Set form action
                    $('#modalForm').modal('show'); // Show modal
                });
            });


        });
    </script>

@endpush
