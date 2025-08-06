<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
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
                    <span>{{__('dashboard.general.dashboard')}}</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:lock-broken" class="menu-icon"></iconify-icon>
                    <span>{{__('dashboard.permissions_management.sidebar_title')}}</span>
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
                    <span>{{__('dashboard.bank_management.sidebar_title')}}</span>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('dashboard.banks.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            {{ __('dashboard.bank_management.index_title') }}
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </div>
</aside>