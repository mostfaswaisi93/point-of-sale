<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">

<head>
    <meta charset="utf-8" />
    <title>Point of Sale (POS)</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-ltr/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}"
        rel="stylesheet" />
    <link
        href="{{ asset('admin_files/metronic-ltr/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-ltr/assets/global/plugins/datatables/datatables.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-ltr/assets/global/plugins/icheck/skins/all.css') }}" rel="stylesheet" />

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('admin_files/metronic-ltr/assets/global/plugins/noty/noty.css') }}">
    <script src="{{ asset('admin_files/metronic-ltr/assets/global/plugins/noty/noty.min.js') }}"></script>
    @if (app()->getLocale() == 'ar')
    <link href="{{ asset('admin_files/metronic-rtl/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') }}"
        rel="stylesheet" />
    <link
        href="{{ asset('admin_files/metronic-rtl/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-rtl/assets/global/css/components-md-rtl.min.css') }}" rel="stylesheet"
        id="style_components" />
    <link href="{{ asset('admin_files/metronic-rtl/assets/global/css/plugins-md-rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-rtl/assets/layouts/layout/css/layout-rtl.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-rtl/assets/layouts/layout/css/themes/darkblue-rtl.min.css') }}"
        rel="stylesheet" id="style_color" />
    <link href="{{ asset('admin_files/metronic-rtl/assets/layouts/layout/css/custom-rtl.min.css') }}"
        rel="stylesheet" />
    <link
        href="{{ asset('admin_files/metronic-rtl/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css') }}"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/css/styles-rtl.css')}}">

    @else
    <link href="{{ asset('admin_files/metronic-ltr/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet" />
    <link
        href="{{ asset('admin_files/metronic-ltr/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-ltr/assets/global/css/components-md.min.css') }}" rel="stylesheet"
        id="style_components" />
    <link href="{{ asset('admin_files/metronic-ltr/assets/global/css/plugins-md.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-ltr/assets/layouts/layout/css/layout.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-ltr/assets/layouts/layout/css/themes/darkblue.min.css') }}"
        rel="stylesheet" id="style_color" />
    <link href="{{ asset('admin_files/metronic-ltr/assets/layouts/layout/css/custom.min.css') }}" rel="stylesheet" />
    <link
        href="{{ asset('admin_files/metronic-ltr/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/css/styles.css')}}">
    @endif

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-md">
    <div class="page-wrapper">

        <div class="page-header navbar navbar-fixed-top">
            <div class="page-header-inner">
                <div class="page-logo">
                    <a href="/">
                        <b class="uppercase logo-default">POS</b>
                    </a>
                </div>
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                data-close-others="true">
                                <span class="username username-hide-on-mobile">
                                    {{ auth()->user()->first_name }}
                                    {{ auth()->user()->last_name }}
                                </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i> <span>
                                            @lang('site.logout')
                                        </span>
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
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode =>
                                $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        <i class="fa fa-globe"></i>
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="clearfix"> </div>

        @include('layouts.admin._sidebar')
        @include('partials._session')

        <div class="page-footer">
            <div class="page-footer-inner">
                @lang('site.all_rights')
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>

        <script src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/jquery.min.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/js.cookie.min.js') }}">
        </script>
        <script
            src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/jquery.blockui.min.js') }}">
        </script>
        <script
            src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/global/scripts/datatable.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/datatables/datatables.min.js') }}">
        </script>
        <script
            src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/global/scripts/app.min.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/pages/scripts/table-datatables-editable.min.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/layouts/layout/scripts/layout.min.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/layouts/layout/scripts/demo.min.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/layouts/global/scripts/quick-sidebar.min.js') }}">
        </script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/layouts/global/scripts/quick-nav.min.js') }}">
        </script>

        <script src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/icheck/icheck.min.js') }}"></script>
        <script src="{{ asset('/admin_files/metronic-ltr/assets/pages/scripts/form-icheck.min.js') }}"></script>

        {{-- jQuery Number --}}
        <script src="{{ asset('admin_files/js/jquery.number.min.js') }}"></script>

        {{-- Print This --}}
        <script src="{{ asset('admin_files/js/printThis.js') }}"></script>

        {{-- Morris --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        {{-- <script src="{{ asset('admin_files/plugins/morris/morris.min.js') }}"></script> --}}

        {{-- Custom js --}}
        <script src="{{ asset('admin_files/js/custom/image_preview.js') }}"></script>
        <script src="{{ asset('admin_files/js/custom/order.js') }}"></script>

        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.13.0/basic/ckeditor.js"></script>

        <script>
            $(document).ready(function () {
            //Delete
            $('.delete').click(function (e) {
                var that = $(this)
                e.preventDefault();
                var n = new Noty({
                    text: "@lang('site.confirm_delete')",
                    type: "alert",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('site.yes')", 'btn btn-danger mr-2', function () {
                            that.closest('form').submit();
                        }),
                        Noty.button("@lang('site.no')", 'btn btn-light mr-2', function () {
                            n.close();
                        })
                    ]
                });
                n.show();
            });

        CKEDITOR.config.language =  "{{ app()->getLocale() }}";
        
        });
        </script>
        @stack('scripts')

</body>

</html>