<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('frontend.index') }}" class="sidebar-logo">
            <img src="{{ asset('assets/common//logos/ulogo.png') }}" alt="site logo" class="light-logo">
            {{-- <img src="{{ asset('assets/common//logos/ulogo.png') }}" alt="site logo" class="dark-logo"> --}}
            <img src="{{ asset('assets/common//logos/sys-logo.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            @can('show-dashboard')
                <li>
                    <a href="{{ route('dashboard.dashboard') }}">
                        <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                        <span>{{ __('dashboard.sidebar.dashboard') }}</span>
                    </a>
                </li>
            @endcan


            @canany(['list-user', 'list-role'])
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="solar:lock-broken" class="menu-icon"></iconify-icon>
                        <span>{{ __('dashboard.sidebar.permissions_management') }}</span>
                    </a>

                    <ul class="sidebar-submenu">
                        @can('list-user')
                            <li>
                                <a href="{{ route('dashboard.users.index') }}">
                                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                    {{ __('dashboard.users_management.index_title') }}
                                </a>
                            </li>
                        @endcan

                        @can('list-role')
                            <li>
                                <a href="{{ route('dashboard.roles.index') }}">
                                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                    {{ __('dashboard.roles_management.index_title') }}
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany

            @canany(['list-bank'])
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="solar:cloud-broken" class="menu-icon"></iconify-icon>
                        <span>{{ __('dashboard.sidebar.bank_management') }}</span>
                    </a>

                    <ul class="sidebar-submenu">
                        @can('list-bank')
                            <li>
                                <a href="{{ route('dashboard.banks.index') }}">
                                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                    {{ __('dashboard.sidebar.bank_management') }}
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany

            @canany(['list-product', 'list-section', 'list-article'])
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="solar:pen-new-square-linear" class="menu-icon"></iconify-icon>
                        <span>{{ __('dashboard.sidebar.content_management') }}</span>
                    </a>

                    <ul class="sidebar-submenu">
                        @can('list-product')
                            <li>
                                <a href="{{ route('dashboard.products.index') }}">
                                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                    {{ __('dashboard.products_management.index_title') }}
                                </a>
                            </li>
                        @endcan

                        @can('list-section')
                            <li>
                                <a href="{{ route('dashboard.sections.index') }}">
                                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                    {{ __('dashboard.sections_management.index_title') }}
                                </a>
                            </li>
                        @endcan

                        @can('list-article')
                            <li>
                                <a href="{{ route('dashboard.articles.index') }}">
                                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                    {{ __('dashboard.articles_management.index_title') }}
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany

            @canany(['list-notification'])
                <li class="dropdown">
                    <a href="javascript:void(0)">
                        <iconify-icon icon="bi:bell" class="menu-icon"></iconify-icon>
                        <span>{{ __('dashboard.sidebar.notifications_management') }}</span>
                    </a>

                    <ul class="sidebar-submenu">
                        @can('list-notification')
                            <li>
                                <a href="{{ route('dashboard.notifications.index') }}">
                                    <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                                    {{ __('dashboard.sidebar.notifications_management') }}
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcanany


        </ul>
    </div>
</aside>
