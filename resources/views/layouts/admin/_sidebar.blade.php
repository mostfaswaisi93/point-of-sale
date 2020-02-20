<div class="page-container">
    <div class="page-sidebar-wrapper">
        <div class="page-sidebar navbar-collapse collapse">
            <ul class="page-sidebar-menu page-header-fixed" data-keep-expanded="false" data-auto-scroll="true"
                data-slide-speed="200" style="padding-top: 20px">
                <li {{ request()->route()->getName() === 'admin.welcome' ? ' class=active' : '' }}>
                    <a href="{{ route('admin.welcome') }}" class="nav-link">
                        <i class="fa fa-home font-green"></i>
                        <span class="title">@lang('site.home')</span>
                    </a>
                </li>
                @if (auth()->user()->hasPermission('read_categories'))
                <li {{ request()->route()->getName() === 'admin.categories.index' ? ' class=active' : '' }}>
                    <a href="/admin/categories" class="nav-link">
                        <i class="fa fa-list font-green"></i>
                        <span class="title">@lang('site.categories')</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_products'))
                <li {{ request()->route()->getName() === 'admin.products.index' ? ' class=active' : '' }}>
                    <a href="/admin/products" class="nav-link">
                        <i class="fa fa-product-hunt font-green"></i>
                        <span class="title">@lang('site.products')</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_clients'))
                <li {{ request()->route()->getName() === 'admin.clients.index' ? ' class=active' : '' }}>
                    <a href="/admin/clients" class="nav-link">
                        <i class="fa fa-users font-green"></i>
                        <span class="title">@lang('site.clients')</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_orders'))
                <li {{ request()->route()->getName() === 'admin.orders.index' ? ' class=active' : '' }}>
                    <a href="/admin/orders" class="nav-link">
                        <i class="fa fa-money font-green"></i>
                        <span class="title">@lang('site.orders')</span>
                    </a>
                </li>
                @endif
                @if (auth()->user()->hasPermission('read_users'))
                <li {{ request()->route()->getName() === 'admin.users.index' ? ' class=active' : '' }}>
                    <a href="{{ route('admin.users.index') }}" class="nav-link">
                        <i class="fa fa-users font-green"></i>
                        <span class="title">@lang('site.users')</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
</div>