<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <li class="{{ (request()->is('/*')) ? 'active' : '' }}">
                    <a href="/" class="nav-link">
                        <i class="fa fa-home font-green"></i>
                        <span class="title">{{ trans('admin.home') }}</span>
                    </a>
                </li>
                <li class="{{ (request()->is('admin/comments*')) ? 'active' : '' }}">
                    <a href="/admin/comments" class="nav-link">
                        <i class="fa fa-comments font-green"></i>
                        <span class="title">{{ trans('admin.comments') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
</div>