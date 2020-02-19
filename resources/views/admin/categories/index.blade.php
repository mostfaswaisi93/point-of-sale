@extends('layouts.admin.app')

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/">@lang('site.home')</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/categories">@lang('site.categories')</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<div class="table-toolbar">
    <div class="row">
        <form action="{{ route('admin.categories.index') }}" method="get">
            <div class="form-group col-md-4">
                <br>
                <input type="text" name="search" class="form-control" placeholder="@lang('site.search')"
                    value="{{ request()->search }}">
            </div>
            <div class="col-md-1">
                <br>
                <button style="width: 100%" class="btn btn-info" type="submit">@lang('site.search')</button>
            </div>
            <div class="col-md-1">
                <br>
                <button style="width: 100%" type="reset" class="btn btn-danger">@lang('site.reset')</button>
            </div>
        </form>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group">
                @if (auth()->user()->hasPermission('create_categories'))
                <a href="{{ route('admin.categories.create') }}" class="btn sbold green"><i class="fa fa-plus"></i>
                    @lang('site.add') @lang('site.category')</a>
                @else
                <a href="#" class="btn sbold green disabled"><i class="fa fa-plus"></i>
                    @lang('site.add') @lang('site.category')</a>
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
                    <i class="fa fa-tags"></i>@lang('site.categories')</div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    @if ($categories->count() > 0)
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('site.name')</th>
                                <th>@lang('site.products_count')</th>
                                <th>@lang('site.related_products')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $index=>$category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->products->count() }}</td>
                                <td><a href="{{ route('dashboard.products.index', ['category_id' => $category->id]) }}"
                                        class="btn btn-info btn-sm">@lang('site.related_products')</a></td>
                                <td>
                                    @if (auth()->user()->hasPermission('update_categories'))
                                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                                        class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                    @else
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>
                                    </a>
                                    @endif
                                    @if (auth()->user()->hasPermission('delete_categories'))
                                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post"
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
                    {{ $categories->appends(request()->query())->links() }}
                    @else
                    <h4>@lang('site.no_data_found')</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection