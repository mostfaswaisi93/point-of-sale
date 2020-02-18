<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@lang('site.login')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="author" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-ltr/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}"
        rel="stylesheet" />

    @if (app()->getLocale() == 'ar')
    <link href="{{ asset('admin_files/metronic-rtl/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') }}"
        rel="stylesheet" />
    <link
        href="{{ asset('admin_files/metronic-rtl/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-rtl/assets/global/css/components-md-rtl.min.css') }}" rel="stylesheet"
        id="style_components" />
    <link href="{{ asset('admin_files/metronic-rtl/assets/global/css/plugins-md-rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin_files/metronic-rtl/assets/pages/css/login-rtl.min.css') }}" rel="stylesheet" />
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
    <link href="{{ asset('admin_files/metronic-ltr/assets/pages/css/login.min.css') }}" rel="stylesheet" />
    @endif

    <link
        href="{{ asset('admin_files/metronic-ltr/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('/css/styles.css')}}">

</head>

<body class=" login">
    <div class="logo">
    </div>
    <div class="content">
        <form class="login-form" action="{{route('login')}}" method="POST">
            @csrf
            @method('post')
            <h3 class="form-title font-green">@lang('site.login')</h3>
            @include('partials._errors')
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> Enter your username and password. </span>
            </div>
            <div class="form-group">
                <input id="email" type="email" class="form-control" name="email" required
                    placeholder="@lang('site.email')">
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control" name="password" required
                    placeholder="@lang('site.password')">
            </div>
            <div class="form-actions">
                <button type="submit" class="btn green uppercase">@lang('site.login')</button>
                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="rememberme">@lang('site.remember_me')
                    <span></span>
                </label>
            </div>
        </form>
    </div>

    <script src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/jquery.min.js') }}">
    </script>
    <script src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
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
    <script
        src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}">
    </script>
    <script
        src="{{ asset('/admin_files/metronic-ltr/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}">
    </script>
    <script src="{{ asset('/admin_files/metronic-ltr/assets/global/scripts/app.min.js') }}">
    </script>
    <script src="{{ asset('/admin_files/metronic-ltr/assets/pages/scripts/login.min.js') }}">
    </script>

</body>

</html>