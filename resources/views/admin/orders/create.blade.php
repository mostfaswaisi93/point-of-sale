@extends('layouts.admin.app')

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/">@lang('site.home')</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/orders">@lang('site.orders')</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-product-hunt"></i>@lang('site.show_products')</div>
            </div>
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-4 active-tab">
                        <ul class="nav nav-tabs tabs-left">
                            @foreach ($categories as $index=>$category)
                            <li class="{{ $index == 0 ? 'active' : '' }}">
                                <a href="#{{ str_replace(' ', '-', $category->name) }}"
                                    data-toggle="tab">{{ $category->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content">
                            @foreach ($categories as $index=>$category)
                            <div class="tab-pane fade {{ $index == 0 ? 'active in' : '' }}"
                                id="{{ str_replace(' ', '-', $category->name) }}">
                                @if ($category->products->count() > 0)
                                <table class="table table-bordered table-hover">
                                    <tr>
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.stock')</th>
                                        <th>@lang('site.price')</th>
                                        <th>@lang('site.add')</th>
                                    </tr>
                                    @foreach ($category->products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->stock }}</td>
                                        <td>{{ number_format($product->sale_price, 2) }}</td>
                                        <td>
                                            <a href="" id="product-{{ $product->id }}" data-name="{{ $product->name }}"
                                                data-id="{{ $product->id }}" data-price="{{ $product->sale_price }}"
                                                class="btn btn-success btn-sm add-product-btn">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                @else
                                <h5>@lang('site.no_products')</h5>
                                @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>@lang('site.orders')</div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                {{-- <form action="{{ route('admin.orders.store', $client->id) }}" method="post"> --}}
                    <form action="{{ route('admin.orders.store') }}"  method="post">
                        @csrf
                        @method('post')
                        @include('partials._errors')
                        <div class="form-group col-md-12">
                            <br>
                            <select name="client_id" id="client_id" class="form-control">
                                <option value="">@lang('site.choose_client')</option>
                                @foreach ($client as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <table class="table table-bordered table-hover" id="print-before-area">
                            <thead>
                                <tr>
                                    <th>@lang('site.product')</th>
                                    <th>@lang('site.quantity')</th>
                                    <th>@lang('site.price')</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="order-list">
                            </tbody>
                        </table>
                        <table class="table table-bordered table-hover">
                            <thead class="price-list">
                                <tr>
                                    <th>@lang('site.total')</th>
                                    <th><span id="items-price" data-discount="${discount}">0</span></th>
                                </tr>
                                <tr>
                                    <th>@lang('site.discount')</th>
                                    <th><input type="number" name="" class="form-control"
                                            id="discount" min="0" value="0"></th>
                                </tr>
                                <tr>
                                    <th>@lang('site.after_discount')</th>
                                    <th><span id="discountResult">0</span></th>
                                </tr>
                                <tr>
                                    <th>@lang('site.amount_paid')</th>
                                    <th><input type="number" name="" class="form-control"></th>
                                </tr>
                                <tr>
                                    <th>@lang('site.remaining_amount')</th>
                                    <th><span id="remainingAmount">0</span></th>
                                </tr>
                            </thead>
                        </table>
                        <div class="btn-style">
                            <div class="btn-group">
                                <button class="btn btn-success btn-sm print-btn">
                                    <i class="fa fa-save"></i>
                                    <i class="fa fa-print"></i> <br> @lang('site.save_print')
                                </button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-primary btn-sm btn-block disabled" id="add-order-form-btn">
                                    <i class="fa fa-save"></i> <br> @lang('site.add_order')
                                </button>
                            </div>
                            <div class="btn-group">
                                <button href="{{ route('admin.orders.create') }}"
                                    class="btn btn-warning btn-sm" target="_blank">
                                    <i class="fa fa-file-text"></i> <br> @lang('site.new_order')
                                </button>
                            </div>
                            <div class="btn-group">
                                <button class="btn btn-danger btn-sm print-before">
                                    <i class="fa fa-print"></i> <br>
                                    @lang('site.print')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection