<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('frontend.index') }}" class="sidebar-logo">
            <img src="{{ asset('assets/common/media/logos/ulogo.png') }}" alt="site logo" class="light-logo">
            {{-- <img src="{{ asset('assets/common/media/logos/ulogo.png') }}" alt="site logo" class="dark-logo"> --}}
            <img src="{{ asset('assets/common/media/logos/sys-logo.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('dashboard.dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>{{__('dashboard.sidebar.dashboard')}}</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:lock-broken" class="menu-icon"></iconify-icon>
                    <span>{{__('dashboard.sidebar.permissions_management')}}</span>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('dashboard.users.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            {{ __('dashboard.users_management.index_title') }}
                        </a>
                    </li>

                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:cloud-broken" class="menu-icon"></iconify-icon>
                    <span>{{__('dashboard.sidebar.bank_management')}}</span>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('dashboard.banks.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            {{ __('dashboard.sidebar.bank_management') }}
                        </a>
                    </li>

                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:pen-new-square-linear" class="menu-icon"></iconify-icon>
                    <span>{{__('dashboard.sidebar.content_management')}}</span>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('dashboard.products.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            {{ __('dashboard.products_management.index_title') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard.sections.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            {{ __('dashboard.sections_management.index_title') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('dashboard.articles.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            {{ __('dashboard.articles_management.index_title') }}
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </div>
</aside>