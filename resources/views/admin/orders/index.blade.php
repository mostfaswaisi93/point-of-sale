@extends('layouts.admin.app')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title" style="margin-bottom: 10px">@lang('site.orders')</h3>
                        <form action="{{ route('admin.orders.index') }}" method="get">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="@lang('site.search')" value="{{ request()->search }}">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                                        @lang('site.search')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @if ($orders->count() > 0)
                    <div class="box-body table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>@lang('site.client_name')</th>
                                <th>@lang('site.price')</th>
                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->client->name }}</td>
                                <td>{{ number_format($order->total_price, 2) }}</td>
                                <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm order-products"
                                        data-url="{{ route('admin.orders.products', $order->id) }}"
                                        data-method="get">
                                        <i class="fa fa-list"></i>
                                        @lang('site.show')
                                    </button>
                                    @if (auth()->user()->hasPermission('update_orders'))
                                    <a href="{{ route('admin.clients.orders.edit', ['client' => $order->client->id, 'order' => $order->id]) }}"
                                        class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i>
                                        @lang('site.edit')</a>
                                    @else
                                    <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>
                                        @lang('site.edit')</a>
                                    @endif
                                    @if (auth()->user()->hasPermission('delete_orders'))
                                    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="post"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm delete"><i
                                                class="fa fa-trash"></i> @lang('site.delete')</button>
                                    </form>
                                    @else
                                    <a href="#" class="btn btn-danger btn-sm" disabled><i class="fa fa-trash"></i>
                                        @lang('site.delete')</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        {{ $orders->appends(request()->query())->links() }}
                    </div>
                    @else
                    <div class="box-body">
                        <h3>@lang('site.no_records')</h3>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title" style="margin-bottom: 10px">@lang('site.show_products')</h3>
                    </div>
                    <div class="box-body">
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
    </section>
</div>

@endsection