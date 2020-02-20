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
<div class="table-toolbar">
    <div class="row">
        <form action="{{ route('admin.clients.index') }}" method="get" id="formID">
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
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group">
                @if (auth()->user()->hasPermission('create_clients'))
                <a href="{{ route('admin.clients.create') }}" class="btn sbold green"><i class="fa fa-plus"></i>
                    @lang('site.add') @lang('site.client')</a>
                @else
                <a href="#" class="btn sbold green disabled"><i class="fa fa-plus"></i>
                    @lang('site.add') @lang('site.client')</a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>@lang('site.clients')</div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    @if ($clients->count() > 0)
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.phone')</th>
                                <th>@lang('site.address')</th>
                                <th>@lang('site.add_order')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $index=>$client)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ is_array($client->phone) ? implode('-', $client->phone) : $client->phone }}</td>
                                <td>{{ $client->address }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('create_orders'))
                                    <a href="{{ route('admin.clients.orders.create', $client->id) }}"
                                        class="btn btn-primary btn-sm">@lang('site.add_order')</a>
                                    @else
                                    <a href="#" class="btn btn-primary btn-sm disabled">@lang('site.add_order')</a>
                                    @endif
                                </td>
                                <td>
                                    @if (auth()->user()->hasPermission('update_clients'))
                                    <a href="{{ route('admin.clients.edit', $client->id) }}"
                                        class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>
                                    </a>
                                    @endif
                                    @if (auth()->user()->hasPermission('delete_clients'))
                                    <form action="{{ route('admin.clients.destroy', $client->id) }}" method="post"
                                        style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                    @else
                                    <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i>
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clients->appends(request()->query())->links() }}
                    @else
                    <h5>@lang('site.no_data_found')</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection