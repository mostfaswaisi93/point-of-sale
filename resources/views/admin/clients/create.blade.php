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
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/clients/create">@lang('site.add') @lang('site.client')</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-circle"></i>
                    @lang('site.add') @lang('site.client')
                </div>
            </div>
            <div class="portlet-body form">
                @include('partials._errors')
                <form action="{{ route('admin.clients.store') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="form-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">@lang('site.name')</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                            </div>
                            @for ($i = 0; $i < 2; $i++)
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">@lang('site.phone')</label>
                                <div class="col-md-6">
                                    <input type="text" name="phone[]" class="form-control">
                                </div>
                            </div>
                            @endfor
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">@lang('site.address')</label>
                                <div class="col-md-6">
                                    <textarea name="address" class="form-control">{{ old('address') }}</textarea>
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