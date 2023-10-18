@extends('admin.layouts.main')

@section('title', 'Add Product')

@section('head_title', 'Add Product')

@section('content')


<div class="row g-gs">
    <div class="col-lg-8">
        <div class="card h-100">
            <div class="card-inner">
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label class="form-label" for="product-title">Product Name</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="product-title" placeholder="Product Name">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label class="form-label" for="product-title">Product Description</label>
                            <div class="form-control-wrap">
                                <!-- Create the editor container -->
                                <div class="quill-basic">
                                    <p>Product Description</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label class="form-label" for="regular-price">Regular Price</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="regular-price">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label class="form-label" for="sale-price">Sale Price</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="sale-price">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label class="form-label" for="stock">Stock</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="stock">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-group">
                            <label class="form-label" for="SKU">SKU</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="SKU">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mb-4">
                        <div class="form-group">
                            <label class="form-label">Profuct Image</label>
                            <div class="form-control-wrap">
                                <div class="upload-zone small bg-lighter my-2">
                                    <div class="dz-message">
                                        <span class="dz-message-text">Drag and drop file</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-inner">
                        <div class="form-group">
                            <label class="form-label">Profuct Thambnel</label>
                            <div class="form-control-wrap">
                                <div class="upload-zone small bg-lighter my-2">
                                    <div class="dz-message">
                                        <span class="dz-message-text">Drag and drop file</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-inner">
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="form-control-wrap">
                                <select class="form-select js-select2" data-placeholder="Select Status">
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                    <option value="draft">Draft</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-inner row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Main Category</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                        <option value="default_option">Default Option</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-label">Sub Category</label>
                                <div class="form-control-wrap">
                                    <select class="form-select js-select2" multiple="multiple" data-placeholder="Select Multiple options">
                                        <option value="default_option">Default Option</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                        <option value="option_select_name">Option select name</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-inner">
                        <div class="form-group">
                            <label class="form-label">Tag</label>
                            <div class="form-control-wrap">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Product Tag">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-primary btn-dim">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-3">
                                <span class="badge badge-dim bg-primary fs-5">
                                    product tag 
                                    <button class="close"><em class="icon ni ni-cross-circle ms-1"></em></button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection

@push('bottom_js')
    <link rel="stylesheet" href="{{ asset('admin/assets/css/editors/quill.css?ver=3.2.3') }}">
    <script src="{{ asset('admin/assets/js/libs/editors/quill.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('admin/assets/js/editors.js?ver=3.2.3') }}"></script>
@endpush