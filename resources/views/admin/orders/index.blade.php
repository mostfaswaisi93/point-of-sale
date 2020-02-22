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
<div class="table-toolbar">
    <div class="row">
        <form action="{{ route('admin.orders.index') }}" method="get">
            <div class="form-group col-md-4">
                <br>
                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')"
                    value="{{ request()->search }}" id="selectform">
            </div>
            <div class="col-md-1">
                <br>
                <button class="btn btn-info" type="submit">@lang('site.search')</button>
            </div>
            <div class="col-md-1">
                <br>
                <button type="reset" class="btn btn-danger">@lang('site.reset')</button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-money"></i>@lang('site.orders')</div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    @if ($orders->count() > 0)
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>@lang('site.client_name')</th>
                                <th>@lang('site.price')</th>
                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->client->name }}</td>
                                <td>{{ number_format($order->total_price, 2) }}</td>
                                <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm order-products"
                                        data-url="{{ route('admin.orders.products', $order->id) }}" data-method="get">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    @if (auth()->user()->hasPermission('update_orders'))
                                    <a href="{{ route('admin.clients.orders.edit', ['client' => $order->client->id, 'order' => $order->id]) }}"
                                        class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                    </a>
                                    @else
                                    <a href="#" disabled class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
                                    </a>
                                    @endif
                                    @if (auth()->user()->hasPermission('delete_orders'))
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm delete"><i
                                                class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @else
                                    <a href="#" class="btn btn-danger btn-sm" disabled><i class="fa fa-trash"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $orders->appends(request()->query())->links() }}
                    @else
                    <h5>@lang('site.no_data_found')</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-product-hunt"></i>@lang('site.show_products')</div>
            </div>
            <div class="portlet-body">
                <div style="display: none; flex-direction: column; align-items: center;" id="loading">
                    <div class="loader"></div>
                    <p style="margin-top: 10px">@lang('site.loading')</p>
                </div>
                <div id="order-product-list">
                </div>
            </div>
        </div>
    </div>
</div>

@endsection