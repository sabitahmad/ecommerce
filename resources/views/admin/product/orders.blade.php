@extends('admin.layouts.main')

@section('title', 'Orders')

@section('head_title', 'Orders')

@section('content')
<div class="nk-block">
    <div class="card card-stretch">
        <div class="card-inner-group">
            <div class="card-inner">
                <div class="card-title-group">
                    <div class="card-title">
                        <h5 class="title">All Orders</h5>
                    </div>
                    <div class="card-tools me-n1">
                        <ul class="btn-toolbar gx-1">
                            <li>
                                <a href="#" class="search-toggle toggle-search btn btn-icon" data-target="search"><em class="icon ni ni-search"></em></a>
                            </li><!-- li -->
                            <li class="btn-toolbar-sep"></li><!-- li -->
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                        <div class="badge badge-circle bg-primary">4</div>
                                        <em class="icon ni ni-filter-alt"></em>
                                    </a>
                                    <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                        <div class="dropdown-head">
                                            <span class="sub-title dropdown-title">Advance Filter</span>
                                            <div class="dropdown">
                                                <a href="#" class="link link-light">
                                                    <em class="icon ni ni-more-h"></em>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="dropdown-body dropdown-body-rg">
                                            <div class="row gx-6 gy-4">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="overline-title overline-title-alt">Type</label>
                                                        <select class="form-select js-select2">
                                                            <option value="any">Any Type</option>
                                                            <option value="deposit">Deposit</option>
                                                            <option value="buy">Buy Coin</option>
                                                            <option value="sell">Sell Coin</option>
                                                            <option value="transfer">Transfer</option>
                                                            <option value="withdraw">Withdraw</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="overline-title overline-title-alt">Status</label>
                                                        <select class="form-select js-select2">
                                                            <option value="any">Any Status</option>
                                                            <option value="pending">Pending</option>
                                                            <option value="cancel">Cancel</option>
                                                            <option value="process">Process</option>
                                                            <option value="completed">Completed</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="overline-title overline-title-alt">Pay Currency</label>
                                                        <select class="form-select js-select2">
                                                            <option value="any">Any Coin</option>
                                                            <option value="bitcoin">Bitcoin</option>
                                                            <option value="ethereum">Ethereum</option>
                                                            <option value="litecoin">Litecoin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label class="overline-title overline-title-alt">Method</label>
                                                        <select class="form-select js-select2">
                                                            <option value="any">Any Method</option>
                                                            <option value="paypal">PayPal</option>
                                                            <option value="bank">Bank</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <div class="custom-control custom-control-sm custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="includeDel">
                                                            <label class="custom-control-label" for="includeDel"> Including Deleted</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <button type="button" class="btn btn-secondary">Filter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-foot between">
                                            <a class="clickable" href="#">Reset Filter</a>
                                            <a href="#savedFilter" data-bs-toggle="modal">Save Filter</a>
                                        </div>
                                    </div><!-- .filter-wg -->
                                </div><!-- .dropdown -->
                            </li><!-- li -->
                            <li>
                                <div class="dropdown">
                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-setting"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                        <ul class="link-check">
                                            <li><span>Show</span></li>
                                            <li class="active"><a href="#">10</a></li>
                                            <li><a href="#">20</a></li>
                                            <li><a href="#">50</a></li>
                                        </ul>
                                        <ul class="link-check">
                                            <li><span>Order</span></li>
                                            <li class="active"><a href="#">DESC</a></li>
                                            <li><a href="#">ASC</a></li>
                                        </ul>
                                    </div>
                                </div><!-- .dropdown -->
                            </li><!-- li -->
                        </ul><!-- .btn-toolbar -->
                    </div><!-- .card-tools -->
                    <div class="card-search search-wrap" data-search="search">
                        <div class="search-content">
                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                            <input type="text" class="form-control border-transparent form-focus-none" placeholder="Quick search by transaction">
                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                        </div>
                    </div><!-- .card-search -->
                </div><!-- .card-title-group -->
            </div><!-- .card-inner -->
            <div class="card-inner p-0">
                <div class="nk-tb-list nk-tb-tnx">
                    <div class="nk-tb-item nk-tb-head">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid">
                                <label class="custom-control-label" for="oid"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col"><span>Order</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                        <div class="nk-tb-col"><span class="d-none d-sm-block">Status</span></div>
                        <div class="nk-tb-col tb-col-sm"><span>Customer</span></div>
                        <div class="nk-tb-col tb-col-md"><span>Purchased</span></div>
                        <div class="nk-tb-col"><span>Total</span></div>
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
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid01">
                                <label class="custom-control-label" for="oid01"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95954</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">Jun 4, 2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="dot bg-warning d-sm-none"></span>
                            <span class="badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex">On Hold</span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <span class="tb-sub">Arnold Armstrong</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub text-primary">3 Items</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead">$ 249.75</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-truck"></em></a></li>
                                <li class="nk-tb-action-hidden"><a href="{{ route('orders.show', 1) }}" class="btn btn-icon btn-tooltip" title="View Order">
                                        <em class="icon ni ni-eye"></em></a></li>
                                <li>
                                    <div class="drodown me-n1">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="{{ route('orders.show', 1) }}"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid02">
                                <label class="custom-control-label" for="oid02"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95961</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">Jun 3, 2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="dot bg-success d-sm-none"></span>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex">Delivered</span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <span class="tb-sub">Jean Douglas</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub text-primary">Pink Fitness Tracker</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead">$ 99.49</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-truck"></em></a></li>
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-eye"></em></a></li>
                                <li>
                                <li>
                                    <div class="drodown me-n1">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid03">
                                <label class="custom-control-label" for="oid03"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95963</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">May 29, 2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="dot bg-success d-sm-none"></span>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex">Delivered</span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <span class="tb-sub">Ashley Lawson</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub text-primary">Black Headphones</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead">$ 149.75</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-truck"></em></a></li>
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-eye"></em></a></li>
                                <li>
                                <li>
                                    <div class="drodown me-n1">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid04">
                                <label class="custom-control-label" for="oid04"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95933</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">May 29, 2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="dot bg-success d-sm-none"></span>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex">Delivered</span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <span class="tb-sub">Joe Larson</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub text-primary">2 Items</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead">$ 199.49</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-truck"></em></a></li>
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-eye"></em></a></li>
                                <li>
                                <li>
                                    <div class="drodown me-n1">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid05">
                                <label class="custom-control-label" for="oid05"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95947</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">May 28, 2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="dot bg-warning d-sm-none"></span>
                            <span class="badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex">On Hold</span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <span class="tb-sub">Frances Burns</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub text-primary">6 Items</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead">$ 469.75</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-truck"></em></a></li>
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-eye"></em></a></li>
                                <li>
                                <li>
                                    <div class="drodown me-n1">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid06">
                                <label class="custom-control-label" for="oid06"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95909</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">May 26, 2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="dot bg-success d-sm-none"></span>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex">Delivered</span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <span class="tb-sub">Victoria Lynch</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub text-primary">Waterproof Speaker</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead">$ 99.49</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-truck"></em></a></li>
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-eye"></em></a></li>
                                <li>
                                <li>
                                    <div class="drodown me-n1">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid07">
                                <label class="custom-control-label" for="oid07"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95902</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">May 25, 2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="dot bg-warning d-sm-none"></span>
                            <span class="badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex">On Hold</span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <span class="tb-sub">Patrick Newman</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub text-primary">4 Items</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead">$ 349.75</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-truck"></em></a></li>
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-eye"></em></a></li>
                                <li>
                                <li>
                                    <div class="drodown me-n1">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid08">
                                <label class="custom-control-label" for="oid08"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95996</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">May 24, 2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="dot bg-warning d-sm-none"></span>
                            <span class="badge badge-sm badge-dot has-bg bg-warning d-none d-sm-inline-flex">On Hold</span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <span class="tb-sub">Emma Walker</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub text-primary">Smartwatch</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead">$ 129.49</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-truck"></em></a></li>
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-eye"></em></a></li>
                                <li>
                                <li>
                                    <div class="drodown me-n1">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid09">
                                <label class="custom-control-label" for="oid09"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95982</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">May 23, 2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="dot bg-success d-sm-none"></span>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex">Delivered</span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <span class="tb-sub">Jane Montgomery</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub text-primary">Smartwatch</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead">$ 249.75</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-truck"></em></a></li>
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-eye"></em></a></li>
                                <li>
                                <li>
                                    <div class="drodown me-n1">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                    <div class="nk-tb-item">
                        <div class="nk-tb-col nk-tb-col-check">
                            <div class="custom-control custom-control-sm custom-checkbox notext">
                                <input type="checkbox" class="custom-control-input" id="oid10">
                                <label class="custom-control-label" for="oid10"></label>
                            </div>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead"><a href="#">#95959</a></span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub">May 23, 2020</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="dot bg-success d-sm-none"></span>
                            <span class="badge badge-sm badge-dot has-bg bg-success d-none d-sm-inline-flex">Delivered</span>
                        </div>
                        <div class="nk-tb-col tb-col-sm">
                            <span class="tb-sub">Jane Harris</span>
                        </div>
                        <div class="nk-tb-col tb-col-md">
                            <span class="tb-sub text-primary">Waterproof Speaker</span>
                        </div>
                        <div class="nk-tb-col">
                            <span class="tb-lead">$ 99.49</span>
                        </div>
                        <div class="nk-tb-col nk-tb-col-tools">
                            <ul class="nk-tb-actions gx-1">
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="Mark as Delivered" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-truck"></em></a></li>
                                <li class="nk-tb-action-hidden"><a href="#" class="btn btn-icon btn-trigger btn-tooltip" title="View Order" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-eye"></em></a></li>
                                <li>
                                <li>
                                    <div class="drodown me-n1">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <ul class="link-list-opt no-bdr">
                                                <li><a href="#"><em class="icon ni ni-eye"></em><span>Order Details</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-truck"></em><span>Mark as Delivered</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-money"></em><span>Mark as Paid</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-report-profit"></em><span>Send Invoice</span></a></li>
                                                <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Order</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-tb-item -->
                </div><!-- .nk-tb-list -->
            </div><!-- .card-inner -->
            <div class="card-inner">
                <ul class="pagination justify-content-center justify-content-md-start">
                    <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </div><!-- .card-inner -->
        </div><!-- .card-inner-group -->
    </div><!-- .card -->
</div><!-- .nk-block -->

@endsection