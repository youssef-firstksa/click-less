<aside class="sidebar">
    <button type="button" class="sidebar-close-btn">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="index.html" class="sidebar-logo">
            <img src="{{ asset('assets/admin/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/admin/images/logo-light.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/admin/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="email.html">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>Email</span>
                </a>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="users-list.html"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Users List</a>
                    </li>
                    <li>
                        <a href="users-grid.html"><i class="ri-circle-fill circle-icon text-warning-main w-auto"></i>
                            Users Grid</a>
                    </li>
                    <li>
                        <a href="add-user.html"><i class="ri-circle-fill circle-icon text-info-main w-auto"></i> Add
                            User</a>
                    </li>
                    <li>
                        <a href="view-profile.html"><i class="ri-circle-fill circle-icon text-danger-main w-auto"></i>
                            View Profile</a>
                    </li>
                </ul>
            </li>

            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Manage Bank Content</span>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.banks.index') }}">
                            <i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i>
                            Banks List
                        </a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
</aside>