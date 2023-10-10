@extends('admin.layouts.main')

@section('title', 'Add Product')

@section('head_title', 'Add Product')

@section('content')


<div class="row g-gs">
    <div class="col-lg-8 mx-auto">
        <div class="card h-100">
            <div class="card-inner">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="product-title">Product Title</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="product-title">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="regular-price">Regular Price</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="regular-price">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="sale-price">Sale Price</label>
                            <div class="form-control-wrap">
                                <input type="number" class="form-control" id="sale-price">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="stock">Stock</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="stock">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="SKU">SKU</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="SKU">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Category</label>
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
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label" for="tags">Tags</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="tags">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="upload-zone small bg-lighter my-2">
                            <div class="dz-message">
                                <span class="dz-message-text">Drag and drop file</span>
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
</div>

@endsection