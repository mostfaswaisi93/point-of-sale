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
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/categories/create">@lang('site.add') @lang('site.category')</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-folder-open"></i>
                    @lang('site.add') @lang('site.category')
                </div>
            </div>
            <div class="portlet-body form">
                @include('partials._errors')
                <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.name')</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="btn-set pull-left">
                            <button type="submit" class="btn blue"><i class="fa fa-plus"></i>
                                @lang('site.add')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection