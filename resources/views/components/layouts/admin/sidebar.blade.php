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
                <a href="{{ route('admin.dashboard') }}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>{{__('admin.general.dashboard')}}</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:cloud-broken" class="menu-icon"></iconify-icon>
                    <span>{{__('admin.permissions_management.sidebar_title')}}</span>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.admins.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            {{ __('admin.admins_management.index_title') }}
                        </a>
                    </li>

                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="solar:cloud-broken" class="menu-icon"></iconify-icon>
                    <span>{{__('admin.bank_management.sidebar_title')}}</span>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.banks.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            {{ __('admin.bank_management.index_title') }}
                        </a>
                    </li>

                </ul>
            </li>


        </ul>
    </div>
</aside>