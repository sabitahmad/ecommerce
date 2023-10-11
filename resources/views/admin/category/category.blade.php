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
                                    <label class="form-label" for="default-01">Category name</label>
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
                                                <li><a href="#"><span>New Items</span></a></li>
                                                <li><a href="#"><span>Featured</span></a></li>
                                                <li><a href="#"><span>Out of Stock</span></a></li>
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
                                                                <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Category</span></a>
                                                                </li>
                                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Category</span></a>
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
                                <div class="g">
                                    <div
                                        class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                        <div>Page</div>
                                        <div>
                                            <select class="form-select js-select2" data-search="on"
                                                    data-dropdown="xs center">
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


        });
    </script>

@endpush
