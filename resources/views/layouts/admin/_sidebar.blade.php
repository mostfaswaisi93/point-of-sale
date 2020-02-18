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
                <li {{ request()->route()->getName() === 'admin.welcome' ? ' class=active' : '' }}>
                    <a href="{{ route('admin.welcome') }}" class="nav-link">
                        <i class="fa fa-home font-green"></i>
                        <span class="title">@lang('site.home')</span>
                    </a>
                </li>
                <li {{ request()->route()->getName() === 'admin.categories.index' ? ' class=active' : '' }}>
                    <a href="/admin/categories" class="nav-link">
                        <i class="fa fa-tags font-green"></i>
                        <span class="title">@lang('site.categories')</span>
                    </a>
                </li>
                <li {{ request()->route()->getName() === 'admin.products.index' ? ' class=active' : '' }}>
                    <a href="/admin/products" class="nav-link">
                        <i class="fa fa-product-hunt font-green"></i>
                        <span class="title">@lang('site.products')</span>
                    </a>
                </li>
                <li {{ request()->route()->getName() === 'admin.clients.index' ? ' class=active' : '' }}>
                    <a href="/admin/clients" class="nav-link">
                        <i class="fa fa-users font-green"></i>
                        <span class="title">@lang('site.clients')</span>
                    </a>
                </li>
                <li {{ request()->route()->getName() === 'admin.orders.index' ? ' class=active' : '' }}>
                    <a href="/admin/orders" class="nav-link">
                        <i class="fa fa-shopping-cart font-green"></i>
                        <span class="title">@lang('site.orders')</span>
                    </a>
                </li>
                {{-- @if (auth()->user()->hasPermission('read_users')) --}}
                <li {{ request()->route()->getName() === 'admin.users.index' ? ' class=active' : '' }}>
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="fa fa-user-circle-o font-green"></i>
                        <span class="title">@lang('site.users')</span>
                    </a>
                </li>
                {{-- @endif --}}
            </ul>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
</div>