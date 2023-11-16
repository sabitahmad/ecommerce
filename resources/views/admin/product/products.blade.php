@extends('admin.layouts.main')

@section('title', 'Product')

@section('head_title', 'Products')

@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
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
                                        <li><a href="#"><span>New Items</span></a></li>
                                        <li><a href="#"><span>Featured</span></a></li>
                                        <li><a href="#"><span>Out of Stock</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="nk-block-tools-opt">
                            <a href="{{ route('products.create') }}" class=" btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                            <a href="{{ route('products.create') }}" class=" btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add Product</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div><!-- .nk-block-head -->
<div class="nk-block">
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
                        <div class="nk-tb-col"><span>Sl</span></div>
                        <div class="nk-tb-col tb-col-sm"><span>Name</span></div>
                        <div class="nk-tb-col"><span>SKU</span></div>
                        <div class="nk-tb-col"><span>Price</span></div>
                        <div class="nk-tb-col"><span>Stock</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Category</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Status</span></div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1 my-n1">
                                <li class="me-n1">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-bar-c"></em><span>Update Stock</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-invest"></em><span>Update Price</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->


                    @foreach($products as $product)
                        <div class="nk-tb-item">
                            <div class="nk-tb-col nk-tb-col-check">
                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                    <input type="checkbox" class="custom-control-input" id="pid3">
                                    <label class="custom-control-label" for="pid3"></label>
                                </div>
                            </div>
                            <div class="nk-tb-col"><span class="tb-lead"><a href="#">#{{$loop->iteration}}</a></span></div>
                            <div class="nk-tb-col tb-col-sm">
                            <span class="tb-product">
                                <img src="{{asset('storage/products/thumbnails/'. $product->thumbnail)}}" alt="" class="thumb">
                                <span class="title">{{$product->name}}</span>
                            </span>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-sub">{{$product->sku}}</span>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-lead">$ {{ $product->type == 'variable' && $product->variants()->count() > 0 ? $product->variants()->min('price') . '-' . $product->variants()->max('price') : $product->regular_price }}</span>
                            </div>
                            <div class="nk-tb-col">
                                <span class="tb-sub">{{$product->type == 'variable' ? $product->variants()->sum('quantity') :$product->stock}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                <span class="tb-sub">{{$product->category->name}}</span>
                            </div>
                            <div class="nk-tb-col tb-col-md">
                                @if($product->status == 'draft')
                                    <span class="dot bg-warning d-sm-none"></span>
                                    <span class="badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex">Draft</span>
                                @elseif($product->status == 'inactive')
                                    <span class="dot bg-danger d-sm-none"></span>
                                    <span class="badge badge-sm badge-dot has-bg bg-danger d-none d-sm-inline-flex">Inactive</span>
                                @elseif($product->status == 'active')
                                    <span class="dot bg-success d-sm-none"></span>
                                    <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex">Active</span>
                                @endif
                            </div>
                            <div class="nk-tb-col nk-tb-col-tools">
                                <ul class="nk-tb-actions gx-1 my-n1">
                                    <li class="me-n1">
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="{{route('products.edit', $product)}}"><em class="icon ni ni-edit"></em><span>Edit Product</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-eye"></em><span>View Product</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Product Orders</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Product</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- .nk-tb-item -->
                    @endforeach
                </div><!-- .nk-tb-list -->
            </div>
            <div class="card-inner">
                <div class="nk-block-between-md g-3">
                    <div class="g">
                        <ul class="pagination justify-content-center justify-content-md-start">
                            @if($products->previousPageUrl())
                                <li class="page-item"><a class="page-link" href="{{ $products->previousPageUrl() }}"><em class="icon ni ni-chevrons-left"></em></a></li>
                            @endif

                            @foreach(range(1, $products->lastPage()) as $page)
                                @if($page == $products->currentPage())
                                    <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                                @else
                                    <li class="page-item"><a class="page-link" href="{{ $products->url($page) }}">{{ $page }}</a></li>
                                @endif
                            @endforeach

                            @if($products->nextPageUrl())
                                <li class="page-item"><a class="page-link" href="{{ $products->nextPageUrl() }}"><em class="icon ni ni-chevrons-right"></em></a></li>
                            @endif
                        </ul><!-- .pagination -->
                    </div>
                </div><!-- .nk-block-between -->
            </div>
        </div>
    </div>
</div><!-- .nk-block -->

@endsection
