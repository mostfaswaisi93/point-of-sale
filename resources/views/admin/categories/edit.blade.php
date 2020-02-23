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
            <a href="/admin/categories/create">@lang('site.edit') @lang('site.category')</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>
                    @lang('site.edit') @lang('site.category')
                </div>
            </div>
            <div class="portlet-body form">
                @include('partials._errors')
                <form action="{{ route('admin.categories.update', $category->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <div class="row">
                            @foreach (config('translatable.locales') as $locale)
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.' . $locale .
                                    '.name')</label>
                                <div class="col-md-6">
                                    <input type="text" name="{{ $locale }}[name]" class="form-control"
                                        value="{{ $category->translate($locale)->name }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="btn-set pull-left">
                            <button type="submit" class="btn blue"><i class="fa fa-edit"></i>
                                @lang('site.edit')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection