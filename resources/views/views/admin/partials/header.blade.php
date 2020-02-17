<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ trans('admin.h_title') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('/') }}/design/metronic-ltr/assets/global/plugins/font-awesome/css/font-awesome.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/design/metronic-ltr/assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/design/metronic-ltr/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet"
        type="text/css" />
    @if (direction() == 'ltr')
    <link href="{{ url('/') }}/design/metronic-ltr/assets/global/plugins/bootstrap/css/bootstrap.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/design/metronic-ltr/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/design/metronic-ltr/assets/global/css/components-md.min.css" rel="stylesheet"
        id="style_components" type="text/css" />
    <link href="{{ url('/') }}/design/metronic-ltr/assets/global/css/plugins-md.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('/') }}/design/metronic-ltr/assets/layouts/layout/css/layout.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('/') }}/design/metronic-ltr/assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet"
        type="text/css" id="style_color" />
    <link href="{{ url('/') }}/design/metronic-ltr/assets/layouts/layout/css/custom.min.css" rel="stylesheet"
        type="text/css" />
    <link
        href="{{ url('/') }}/design/metronic-ltr/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css"
        rel="stylesheet" type="text/css" />
    @else
    <link href="{{ url('/') }}/design/metronic-rtl/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css"
        rel="stylesheet" type="text/css" />
    <link
        href="{{ url('/') }}/design/metronic-rtl/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/design/metronic-rtl/assets/global/css/components-md-rtl.min.css" rel="stylesheet"
        id="style_components" type="text/css" />
    <link href="{{ url('/') }}/design/metronic-rtl/assets/global/css/plugins-md-rtl.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('/') }}/design/metronic-rtl/assets/layouts/layout/css/layout-rtl.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ url('/') }}/design/metronic-rtl/assets/layouts/layout/css/themes/darkblue-rtl.min.css"
        rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ url('/') }}/design/metronic-rtl/assets/layouts/layout/css/custom-rtl.min.css" rel="stylesheet"
        type="text/css" />
    <link
        href="{{ url('/') }}/design/metronic-rtl/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{url('/css/styles-rtl.css')}}" type="text/css">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <link rel="stylesheet" href="{{url('/css/styles.css')}}" type="text/css">

</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
    <div class="page-wrapper">

        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner">
                <div class="page-logo">
                    <a href="/">
                        <b class="uppercase logo-default">Mudaw<span class="font-red">ana</span></b>
                    </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
                    data-target=".navbar-collapse">
                    <span></span>
                </a>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <span class="username username-hide-on-mobile"> {{ Auth()->user()->name }} </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i> <span>
                                            {{ trans('admin.log_out') }}</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <i class="fa fa-language" aria-hidden="true"></i>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                @if (direction() == 'ltr')
                                <li>
                                    <a href="/admin/lang/ar"> <i class="fa fa-globe" aria-hidden="true"></i>
                                        {{ trans('admin.arabic') }}</a>
                                </li>
                                @else
                                <li>
                                    <a href="/admin/lang/en"> <i class="fa fa-globe" aria-hidden="true"></i>
                                        {{ trans('admin.english') }} </a>
                                </li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix"> </div>