@extends('admin.layouts.main')

@section('title', 'Category')

@section('head_title', 'Category')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-inner">

                    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-lg-6">

                                <div class="form-group">
                                    <label class="form-label" for="default-01">Category name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="default-01"
                                               placeholder="Enter category name" name="name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="default-01">Category description</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control no-resize" id="default-textarea" placeholder="Category description" name="description"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="customFileLabel">Choose category image</label>
                                    <div class="form-control-wrap">
                                        <div class="form-file">
                                            <input type="file" class="form-file-input" id="catImage" required
                                                   accept="images/*" name="image">
                                            <label class="form-file-label" for="customFile">Choose image</label>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="col-lg-6">

                                <div class="d-flex justify-content-center align-items-center mt-md-2 mt-sm-2" style="height: 100%">

                                    <img class="rounded-5" id="imagePreview"
                                         src="{{asset('admin/assets/images/category.svg')}}" alt="" height="120"
                                         width="120">

                                </div>

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
                                                   placeholder="Quick search" name="search" value="{{$search}}">
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
                                    <div class="nk-tb-col"><span>Description</span></div>
                                    <div class="nk-tb-col"><span>Status</span></div>
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

                                @foreach($categories as $category)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col nk-tb-col-check">
                                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                                <input type="checkbox" class="custom-control-input" id="cid">
                                                <label class="custom-control-label" for="pid1"></label>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm">
                                                            <span class="tb-product">
                                                                <img src="{{$category->image == 'error.png' ? asset('admin/assets/images/category.svg') : asset('storage/category/').'/'.$category->image}}" alt="" class="thumb">
                                                                <span class="title">{{$category->name}}</span>
                                                            </span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="tb-sub">{{$category->description}}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            <span class="dot {{$category->status == 'deactivate' ? 'bg-warning' : 'bg-success'}} d-sm-none"></span>
                                            <span class="badge badge-sm badge-dot has-bg {{$category->status == 'deactivate' ? 'bg-warning' : 'bg-success'}} d-none d-sm-inline-flex">{{ucfirst($category->status)}}</span>
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-1 my-n1">
                                                <li class="me-n1">
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                           data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a class="category-edit-button" style="cursor: pointer" data-id="{{$category->id}}"><em class="icon ni ni-edit"></em><span>Edit Category</span></a></li>
                                                                <li>
                                                                    <form action="{{ route('category.destroy', $category) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <a href="" onclick="event.preventDefault(); this.closest('form').submit();">
                                                                            <em class="icon ni ni-trash"></em><span>Remove Category</span>
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
                                        @if($categories->previousPageUrl())
                                            <li class="page-item"><a class="page-link" href="{{ $categories->previousPageUrl() }}"><em class="icon ni ni-chevrons-left"></em></a></li>
                                        @endif

                                        @foreach(range(1, $categories->lastPage()) as $page)
                                            @if($page == $categories->currentPage())
                                                <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                            @else
                                                <li class="page-item"><a class="page-link" href="{{ $categories->url($page) }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        @if($categories->nextPageUrl())
                                            <li class="page-item"><a class="page-link" href="{{ $categories->nextPageUrl() }}"><em class="icon ni ni-chevrons-right"></em></a></li>
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
                            <label class="form-label" for="full-name">Category Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="category-name" name="name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="email-address">Category Slug</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="modal-category-slug" name="slug" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone-no">Category description</label>
                            <div class="form-control-wrap">
                                <textarea type="text" class="form-control" id="modal-category-description" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="catImage">Category image</label>
                            <div class="form-control-wrap">
                                <input type="file" class="form-control" id="cat-modal-image"
                                       accept="images/*" name="image">
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <img class="rounded-5" id="modalImagePreview"
                                 src="{{asset('admin/assets/images/category.svg')}}" alt="" height="120"
                                 width="120">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="cat-modal-status">Category Status</label>
                            <div class="custom-switch">
                                <input type="checkbox" class="custom-control-input" name="status" id="cat-modal-status">
                                <label class="custom-control-label" for="cat-modal-status">Active</label>
                            </div>
                        </div>


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


            $('.category-edit-button').click(function () {
                const id = $(this).data('id');
                $.get('{{ route('edit.category', ['id' => ':id']) }}'.replace(':id', id), function (data) {
                    $('#category-name').val(data.name);
                    $('#modal-category-slug').val(data.slug);
                    $('#modal-category-description').val(data.description);
                    $('#cat-modal-status').prop('checked', data.status === 'active');

                    $('#modal-form').attr('action', '{{ route('update.category', ['id' => ':id']) }}'.replace(':id', id)); // Set form action
                    $('#modalForm').modal('show'); // Show modal
                });
            });


        });
    </script>

@endpush
