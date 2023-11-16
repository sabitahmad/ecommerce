@extends('admin.layouts.main')

@section('title', "Edit $attribute->attribute_name values")

@section('head_title', "$attribute->attribute_name values")

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-inner">

                    <form action="{{route('attribute.value.store' , $attribute->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-label" for="default-01">Value name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="default-01"
                                               placeholder="Enter value name" name="value_name">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">

                                @if($attribute->attribute_type == 'color')
                                    <div class="form-group">
                                        <label class="form-label" for="default-02">Color</label>
                                        <div class="form-control-wrap">
                                            <input type="color" class="form-control" id="default-02" name="color_code" value="{{ old('color_code') }}">
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>

                        <button class="btn btn-primary mt-2"><em class="icon ni ni-plus"></em><span>Create</span></button>

                    </form>


                </div>
            </div>


            <div class="nk-block-between mt-4 mb-2 justify-content-end">
                <div class="nk-block-head-content">
                    <div class="toggle-wrap nk-block-tools-toggle">
                        <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                class="icon ni ni-more-v"></em></a>
                        <div class="toggle-expand-content" data-content="pageMenu">
                            <ul class="nk-block-tools g-3">
                                <li>
                                    <div class="form-control-wrap">
                                        <div class="form-icon form-icon-right">
                                            <em class="icon ni ni-search"></em>
                                        </div>
                                        <form action="{{url()->current()}}" method="get">
                                            <input type="text" class="form-control" id="default-04"
                                                   placeholder="Quick search" name="search" value="">
                                        </form>

                                    </div>
                                </li>
                                <li>
                                    <div class="drodown">
                                        <a href="#"
                                           class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white"
                                           data-bs-toggle="dropdown">Status</a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{url()->current().'?filter_status=active'}}"><span>Active</span></a></li>
                                                <li><a href="{{url()->current().'?filter_status=deactivate'}}"><span>Deactivate</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head-content -->
            </div><!-- .nk-block-between -->

            <div class="nk-block nk-block-lg">

                <div class="card">
                    <div class="card-inner-group">
                        <div class="card-inner p-0">
                            <div class="nk-tb-list">
                                <div class="nk-tb-item nk-tb-head">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="pid">
                                            <label class="custom-control-label" for="pid"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                                    @if($attribute->attribute_type == 'color')
                                        <div class="nk-tb-col"><span>Color</span></div>
                                    @endif
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1 my-n1">
                                            <li class="me-n1">
                                                <div class="dropdown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                       data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!-- .nk-tb-item -->

                                @foreach($attribute_values as $attribute_value)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="cid">
                                                <label class="custom-control-label" for="pid1"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm">
                                            <span class="tb-product">
                                                <span class="title">{{$attribute_value->attribute_value}}</span>
                                            </span>
                                        </div>

                                        @if($attribute->attribute_type == 'color')
                                        <div class="nk-tb-col">
                                            <span class="dot bg-warning d-sm-none"></span>
                                            <span class="badge  d-sm-inline-flex" style="background-color: {{ $attribute_value->color }};">{{ $attribute_value->color }}</span>
                                        </div>
                                        @endif
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                <li class="me-n1">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                           data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a class="attribute-value-edit-button" style="cursor: pointer" data-id="{{$attribute_value->id}}"><em class="icon ni ni-edit"></em><span>Edit Value</span></a></li>
                                                                <li>
                                                                    <form action="{{ route('attribute.value.delete', $attribute_value) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <a href="" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                            <em class="icon ni ni-trash"></em><span>Remove Value</span>
                                                                        </a>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- .nk-tb-item -->
                            </div><!-- .nk-tb-list -->
                        </div>
                        <div class="card-inner">
                            <div class="nk-block-between-md g-3">
                                <div class="g">
                                    <ul class="pagination justify-content-center justify-content-md-start">
                                        @if($attribute_values->previousPageUrl())
                                            <li class="page-item"><a class="page-link" href="{{ $attribute_values->previousPageUrl() }}"><em class="icon ni ni-chevrons-left"></em></a></li>
                                        @endif

                                        @foreach(range(1, $attribute_values->lastPage()) as $page)
                                            @if($page == $attribute_values->currentPage())
                                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $attribute_values->url($page) }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        @if($attribute_values->nextPageUrl())
                                            <li class="page-item"><a class="page-link" href="{{ $attribute_values->nextPageUrl() }}"><em class="icon ni ni-chevrons-right"></em></a></li>
                                        @endif

                                    </ul><!-- .pagination -->
                                </div>
                            </div><!-- .nk-block-between -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Category</h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form class="form-validate is-alter" method="post" id="modal-form" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="full-name">Value name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="value-name" name="value_name" required>
                            </div>
                        </div>

                        @if($attribute->attribute_type == 'color')
                            <div class="form-group">
                                <label class="form-label" for="default-02">Color</label>
                                <div class="form-control-wrap">
                                    <input type="color" class="form-control" id="value-color" name="color_code" value="{{ old('color_code') }}">
                                </div>
                            </div>
                        @endif


                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                {{--                <div class="modal-footer bg-light">--}}
                {{--                    <span class="sub-text">Modal Footer Text</span>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

@endsection


@push('bottom_js')

    <script>
        $(document).ready(function () {

            $('.attribute-value-edit-button').click(function () {
                const id = $(this).data('id');
                $.get('{{ route('attribute.value.edit', ['id' => ':id']) }}'.replace(':id', id), function (data) {
                    $('#value-name').val(data.attribute_value);
                    $('#value-color').val(data.color);

                    $('#modal-form').attr('action', '{{ route('update.category', ['id' => ':id']) }}'.replace(':id', id)); // Set form action
                    $('#modalForm').modal('show'); // Show modal
                });
            });


        });
    </script>

@endpush
