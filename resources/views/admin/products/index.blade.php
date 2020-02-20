@extends('layouts.admin.app')

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/">@lang('site.home')</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/products">@lang('site.products')</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<div class="table-toolbar">
    <div class="row">
        <form action="{{ route('admin.products.index') }}" method="get">
            <div class="form-group col-md-4">
                <br>
                <select name="category_id" class="form-control">
                    <option value="">@lang('site.all_categories')</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request()->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-4">
                <br>
                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')"
                    value="{{ request()->search }}">
            </div>
            <div class="form-group col-md-1">
                <br>
                <button class="btn btn-info" type="submit">@lang('site.search')</button>
            </div>
            <div class="form-group col-md-1">
                <br>
                <button type="reset" class="btn btn-danger">@lang('site.reset')</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group">
                @if (auth()->user()->hasPermission('create_products'))
                <a href="{{ route('admin.products.create') }}" class="btn sbold green"><i class="fa fa-plus"></i>
                    @lang('site.add') @lang('site.product')</a>
                @else
                <a href="#" class="btn sbold green disabled"><i class="fa fa-plus"></i>
                    @lang('site.add') @lang('site.product')</a>
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
                    <i class="fa fa-products"></i>@lang('site.products')</div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    @if ($products->count() > 0)
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.description')</th>
                                <th>@lang('site.category')</th>
                                <th>@lang('site.image')</th>
                                <th>@lang('site.purchase_price')</th>
                                <th>@lang('site.sale_price')</th>
                                <th>@lang('site.profit_percent') %</th>
                                <th>@lang('site.stock')</th>
                                <th>@lang('site.created_at')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $index=>$product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{!! $product->description !!}</td>
                                <td>{{ $product->category->name }}</td>
                                <td><img src="{{ $product->image_path }}" style="width: 50px" class="img-thumbnail"
                                        alt="">
                                </td>
                                <td>{{ $product->purchase_price }}</td>
                                <td>{{ $product->sale_price }}</td>
                                <td>{{ $product->profit_percent }} %</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->created_at->format('m-d-Y') }}</td>
                                <td>
                                    @if (auth()->user()->hasPermission('update_products'))
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>
                                    </a>
                                    @endif
                                    @if (auth()->user()->hasPermission('delete_products'))
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="post"
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
                    {{ $products->appends(request()->query())->links() }}
                    @else
                    <h5>@lang('site.no_data_found')</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection