@extends('layouts.admin.app')

@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="/">@lang('site.home')</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/users">@lang('site.users')</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="/admin/users/create">@lang('site.add') @lang('site.user')</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-circle"></i>
                    @lang('site.add') @lang('site.user')
                </div>
            </div>
            <div class="portlet-body form">
                @include('partials._errors')
                <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.first_name')</label>
                                <div class="col-md-6">
                                    <input type="text" name="first_name" class="form-control"
                                        value="{{ old('first_name') }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.last_name')</label>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" class="form-control"
                                        value="{{ old('last_name') }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.email')</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.image')</label>
                                <div class="col-md-6">
                                    <input type="file" name="image" class="form-control image">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                    <img src="{{ asset('uploads/user_images/default.png') }}" style="width: 100px"
                                        class="img-thumbnail image-preview" alt="">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.password')</label>
                                <div class="col-md-6">
                                    <input type="password" name="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name"
                                    class="control-label col-md-2">@lang('site.password_confirmation')</label>
                                <div class="col-md-6">
                                    <input type="password" name="password_confirmation" class="form-control">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2">@lang('site.permissions')</label>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="nav nav-tabs">
                                    @php
                                    $models = ['users', 'categories', 'products', 'clients', 'orders'];
                                    $maps = ['create', 'read', 'update', 'delete'];
                                    @endphp
                                    <ul class="nav nav-tabs">
                                        @foreach ($models as $index=>$model)
                                        <li class="{{ $index == 0 ? 'active' : '' }}"><a href="#{{ $model }}"
                                                data-toggle="tab">@lang('site.' . $model)</a></li>
                                        @endforeach
                                    </ul>
                                    <div class="tab-content">
                                        @foreach ($models as $index=>$model)
                                        <div class="tab-pane fade {{ $index == 0 ? 'active in' : '' }}"
                                            id="{{ $model }}">
                                            @foreach ($maps as $map)
                                            <label><input type="checkbox" name="permissions[]" class="icheck"
                                                    value="{{ $map . '_' . $model }}"> @lang('site.' . $map)</label>
                                            @endforeach
                                        </div>
                                        @endforeach
                                    </div>
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