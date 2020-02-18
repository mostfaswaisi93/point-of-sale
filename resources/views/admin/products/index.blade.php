@extends('layouts.admin.app')

@section('content')

<div class="page-content-wrapper">
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="/">@lang('site.home')</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <a href="/admin/products">@lang('site.products')</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-product-hunt font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">@lang('site.products')</span>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="btn-group">
                                    <button name="create_tag" id="create_tag"
                                        class="btn green">@lang('site.add_new')
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> @lang('site.name') </th>
                                <th width="15%"> @lang('site.action') </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection