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
            <a href="/admin/users/create">@lang('site.edit') @lang('site.user')</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-edit"></i>
                    @lang('site.edit') @lang('site.user')
                </div>
            </div>
            <div class="portlet-body form">
                @include('partials._errors')
                <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.first_name')</label>
                                <div class="col-md-6">
                                    <input type="text" name="first_name" class="form-control"
                                        value="{{ $user->first_name }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.last_name')</label>
                                <div class="col-md-6">
                                    <input type="text" name="last_name" class="form-control"
                                        value="{{ $user->last_name }}">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="name" class="control-label col-md-2">@lang('site.email')</label>
                                <div class="col-md-6">
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
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
                                    <img src="{{ $user->image_path }}" style="width: 100px"
                                        class="img-thumbnail image-preview" alt="">
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
                                                    {{ $user->hasPermission($map . '_' . $model) ? 'checked' : '' }}
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