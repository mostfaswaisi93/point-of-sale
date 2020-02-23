@extends('layouts.admin.app')

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/">@lang('site.home')</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/clients">@lang('site.clients')</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-7">
        <div class="portlet box blue">
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
    <div class="col-md-5">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>@lang('site.orders')</div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <form action="{{ route('admin.clients.orders.store', $client->id) }}" method="post">
                        @csrf
                        @method('post')
                        @include('partials._errors')
                        <table class="table table-bordered table-hover">
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
                            <tfoot>
                                <tr>
                                    <th colspan="4">
                                        <h4>@lang('site.total') : <span class="total-price">0</span></h4>
                                    </th>
                                </tr>
                            </tfoot>
                        </table>
                        <button class="btn btn-primary btn-block disabled" id="add-order-form-btn"><i
                                class="fa fa-plus"></i> @lang('site.add_order')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-7"></div>
    <div class="col-md-5">
        @if ($client->orders->count() > 0)
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-reorder"></i>@lang('site.previous_orders')
                    <small>({{ $orders->total() }})</small>
                </div>
            </div>
            <div class="portlet-body">
                @foreach ($orders as $order)
                <div class="panel-group">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse"
                                    href="#{{ $order->created_at->format('d-m-Y-s') }}">{{ $order->created_at->toDayDateTimeString() }}</a>
                            </h4>
                        </div>
                        <div id="{{ $order->created_at->format('d-m-Y-s') }}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul class="list-group">
                                    @foreach ($order->products as $product)
                                    <li class="list-group-item">{{ $product->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $orders->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

@endsection