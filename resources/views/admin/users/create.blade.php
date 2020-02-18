@extends('layouts.admin.app')

@section('content')

<div class="page-content-wrapper">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/">@lang('site.home')</a>
                <i class="fa fa-angle-left"></i>
            </li>
            <li>
                <a href="/admin/users">@lang('site.users')</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-file-text"></i>
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
                                <div class="form-group  col-md-12">
                                    <label for="name" class="control-label col-md-2">@lang('site.first_name')</label>
                                    <div class="col-md-6">
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ old('first_name') }}">
                                    </div>
                                </div>
                                <div class="form-group  col-md-12">
                                    <label for="name" class="control-label col-md-2">@lang('site.last_name')</label>
                                    <div class="col-md-6">
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name') }}">
                                    </div>
                                </div>
                                <div class="form-group  col-md-12">
                                    <label for="name" class="control-label col-md-2">@lang('site.email')</label>
                                    <div class="col-md-6">
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="form-group  col-md-12">
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
                                <div class="form-group  col-md-12">
                                    <label for="name" class="control-label col-md-2">@lang('site.password')</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group  col-md-12">
                                    <label for="name" class="control-label col-md-2">@lang('site.password_confirmation')</label>
                                    <div class="col-md-6">
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="btn-set pull-left">
                                <button type="submit" class="btn green"><i class="fa fa-plus"></i> @lang('site.add')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection