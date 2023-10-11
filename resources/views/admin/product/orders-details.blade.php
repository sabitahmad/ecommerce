@extends('admin.layouts.main')

@section('title', 'Orders Details')

@section('head_title', 'Orders Details')

@section('content')
<div class="nk-block">
    <div class="nk-tb-list nk-tb-ulist is-compact card">
        <div class="nk-block m-3"> 
            <div class="overline-title-alt mb-2 mt-2">In Account</div>
            <div class="profile-balance">
                <div class="profile-balance-group gx-4">
                    <div class="profile-balance-sub">
                        <div class="profile-balance-amount">
                            <div class="number">3</div>
                        </div>
                        <div class="profile-balance-subtitle">Total Order</div>
                    </div>
                    <div class="profile-balance-sub">
                        <div class="profile-balance-amount">
                            <div class="number">237.89 <small class="currency currency-usd">USD</small></div>
                        </div>
                        <div class="profile-balance-subtitle">Total Amount</div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="nk-tb-item nk-tb-head">
            <div class="nk-tb-col">
                <span class="sub-text">Order ID</span>
            </div>
            <div class="nk-tb-col tb-col-sm">
                <span class="sub-text">Product Name</span>
            </div>
            <div class="nk-tb-col tb-col-xxl">
                <span class="sub-text">Total Price</span>
            </div>
            <div class="nk-tb-col">
                <span class="sub-text">Status</span>
            </div>
            <div class="nk-tb-col">
                <span class="sub-text">Order Date</span>
            </div>
        </div>
        <div class="nk-tb-item">
            <div class="nk-tb-col">
                <a href="#"><span class="fw-bold">#4947</span></a>
            </div>
            <div class="nk-tb-col tb-col-sm">
                <span class="tb-product">
                    <img src="{{ asset('admin/assets/images/product/c.png') }}" alt="" class="thumb">
                    <span class="title">Black Mi Band Smartwatch</span>
                </span>
            </div>
            <div class="nk-tb-col tb-col-xxl">
                <span class="amount">$ 89.49</span>
            </div>
            <div class="nk-tb-col">
                <span class="lead-text text-warning">Padding</span>
            </div>
            <div class="nk-tb-col">
                <span class="sub-text">12 Dec, 2020</span>
            </div>
        </div>
        <div class="nk-tb-item">
            <div class="nk-tb-col">
                <a href="#"><span class="fw-bold">#4948</span></a>
            </div>
            <div class="nk-tb-col tb-col-sm">
                <span class="tb-product">
                    <img src="{{ asset('admin/assets/images/product/b.png') }}" alt="" class="thumb">
                    <span class="title">Purple Smartwatch</span>
                </span>
            </div>
            <div class="nk-tb-col tb-col-xxl">
                <span class="amount">$299.49</span>
            </div>
            <div class="nk-tb-col">
                <span class="lead-text text-success">Delivered</span>
            </div>
            <div class="nk-tb-col">
                <span class="sub-text">12 Dec, 2020</span>
            </div>
        </div>
        <div class="nk-tb-item">
            <div class="nk-tb-col">
                <a href="#"><span class="fw-bold">#4949</span></a>
            </div>
            <div class="nk-tb-col tb-col-sm">
                <span class="tb-product">
                    <img src="{{ asset('admin/assets/images/product/a.png') }}" alt="" class="thumb">
                    <span class="title">Pink Fitness Tracker</span>
                </span>
            </div>
            <div class="nk-tb-col tb-col-xxl">
                <span class="amount">$99.49</span>
            </div>
            <div class="nk-tb-col">
                <span class="lead-text text-danger">Canceled</span>
            </div>
            <div class="nk-tb-col">
                <span class="sub-text">12 Dec, 2020</span>
            </div>
        </div>
        
    </div><!-- .nk-tb-list -->
    
</div>
@endsection