<div class="navbar-header">
    <div class="main-navbar">
        <div class="row align-items-center justify-content-between">
            <div class="col-auto">
                <div class="d-flex flex-wrap align-items-center gap-4">
                    {{-- Show the sidebar button in the dashboard routes only --}}
                    @if (request()->routeIs('dashboard.*'))
                        <button type="button" class="sidebar-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon text-2xl non-active"></iconify-icon>
                            <iconify-icon icon="iconoir:arrow-right" class="icon text-2xl active"></iconify-icon>
                        </button>

                        <button type="button" class="sidebar-mobile-toggle">
                            <iconify-icon icon="heroicons:bars-3-solid" class="icon"></iconify-icon>
                        </button>
                    @endif

                    {{-- <form class="navbar-search">
                        <input type="text" name="search" placeholder="Search">
                        <iconify-icon icon="ion:search-outline" class="icon"></iconify-icon>
                    </form> --}}

                    <div class="d-flex flex-wrap align-items-center gap-3">
                        {{-- <button type="button" data-theme-toggle
                            class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
                        --}}


                        @if (!request()->routeIs('dashboard.*'))
                            <a class="header-logo" href="{{ route('agent.index') }}">
                                <img src="{{ asset('assets/common/logos/full-logow.png') }}" alt="site logo"
                                    class="light-logo">
                            </a>
                        @endif

                        <x-nav-link href="{{ route('agent.index') }}" :active="request()->routeIs('agent.index')">
                            {{ __('agent.general.home') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('agent.articles-notes.index') }}"
                            :active="request()->routeIs('agent.articles-notes.index')">
                            {{ __('agent.general.article_notes') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('agent.index') }}"
                            :active="request()->routeIs('agent.quizzes.index')">
                            {{ __('agent.general.quizzes') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('agent.index') }}"
                            :active="request()->routeIs('agent.my_library.index')">
                            {{ __('agent.general.my_library') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('agent.index') }}"
                            :active="request()->routeIs('agent.my_courses.index')">
                            {{ __('agent.general.my_courses') }}
                        </x-nav-link>


                    </div>
                </div>
            </div>

            <div class="col-auto">
                <div class="d-flex flex-wrap align-items-center gap-3">
                    {{-- <button type="button" data-theme-toggle
                        class="w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"></button>
                    --}}

                    <x-bank-dropdown />

                    <div class="dropdown d-none d-sm-inline-block">
                        <button
                            class="has-indicator w-40-px h-40-px bg-neutral-200 rounded-circle d-flex justify-content-center align-items-center"
                            type="button" data-bs-toggle="dropdown">

                            @if (app()->getLocale() == 'en')
                                <img src="{{ asset('assets/common/images/flags/usa.png') }}" alt="image"
                                    class="w-24 h-24 object-fit-cover rounded-circle">
                            @else
                                <img src="{{ asset('assets/common/images/flags/saudi.png') }}" alt="image"
                                    class="w-24 h-24 object-fit-cover rounded-circle">
                            @endif
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-sm">
                            <div
                                class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div>
                                    <h6 class="text-lg text-primary-light fw-semibold mb-0">
                                        {{ __('dashboard.general.choose_your_language') }}
                                    </h6>
                                </div>
                            </div>

                            <div class="max-h-400-px overflow-y-auto scroll-sm pe-8">

                                <div
                                    class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}"
                                        class="form-check-label line-height-1 fw-medium text-secondary-light"
                                        for="english">
                                        <span
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <img src="{{ asset('assets/common/images/flags/usa.png') }}" alt=""
                                                class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                            <span class="text-md fw-semibold mb-0">
                                                {{ __('dashboard.general.english') }}
                                            </span>
                                        </span>
                                    </a>
                                </div>

                                <div
                                    class="form-check style-check d-flex align-items-center justify-content-between mb-16">
                                    <a href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}"
                                        class="form-check-label line-height-1 fw-medium text-secondary-light"
                                        for="arabic">
                                        <span
                                            class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-3">
                                            <img src="{{ asset('assets/common/images/flags/saudi.png') }}" alt=""
                                                class="w-36-px h-36-px bg-success-subtle text-success-main rounded-circle flex-shrink-0">
                                            <span class="text-md fw-semibold mb-0">
                                                {{ __('dashboard.general.arabic') }}
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- Language dropdown end -->

                    <!-- Chats dropdown start -->
                    <x-chats.dropdown />
                    <!-- Chats dropdown end -->

                    <!-- Notification dropdown start -->
                    <x-notifications.dropdown />
                    <!-- Notification dropdown end -->

                    <div class="dropdown">
                        <button class="d-flex justify-content-center align-items-center rounded-circle" type="button"
                            data-bs-toggle="dropdown">
                            <img src="{{ asset('assets/common/images/users/man.png') }}" alt="image"
                                class="w-40-px h-40-px object-fit-cover rounded-circle">
                        </button>
                        <div class="dropdown-menu to-top dropdown-menu-sm">
                            <div
                                class="py-12 px-16 radius-8 bg-primary-50 mb-16 d-flex align-items-center justify-content-between gap-2">
                                <div class="d-flex flex-column align-items-start">
                                    <h6 class="text-lg text-primary-light fw-semibold mb-2">

                                        {{ auth()->user()->name ?? 'User Name' }}
                                    </h6>

                                    <span class="text-secondary-light fw-medium text-sm">
                                        {{ auth()->user()?->role?->title ?? 'User' }}
                                    </span>
                                </div>
                                <button type="button" class="hover-text-danger">
                                    <iconify-icon icon="radix-icons:cross-1" class="icon text-xl"></iconify-icon>
                                </button>
                            </div>
                            <ul class="to-top-list">
                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                        href="view-profile.html">
                                        <iconify-icon icon="solar:user-linear" class="icon text-xl"></iconify-icon>

                                        {{ __('dashboard.general.my_profile') }}

                                    </a>
                                </li>



                                @if (auth()->user()->can('access-dashboard-platform') && !request()->routeIs('dashboard.*'))
                                    <li>
                                        <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                            href="{{ route('dashboard.index') }}">
                                            <iconify-icon icon="solar:home-smile-angle-outline"
                                                class="icon text-xl"></iconify-icon>

                                            {{ __('dashboard.general.dashboard') }}
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-primary d-flex align-items-center gap-3"
                                        href="company.html">
                                        <iconify-icon icon="icon-park-outline:setting-two"
                                            class="icon text-xl"></iconify-icon>
                                        {{ __('dashboard.general.settings') }}</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf

                                        <button
                                            class="dropdown-item text-black px-0 py-8 hover-bg-transparent hover-text-danger d-flex align-items-center gap-3">

                                            <iconify-icon icon="lucide:power" class="icon text-xl"></iconify-icon>

                                            {{ __('dashboard.general.logout') }}

                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Profile dropdown end -->
                </div>
            </div>
        </div>
    </div>

    @if (!request()->routeIs('dashboard.*'))
        <div>
            @include('partials.hero-section')
        </div>
    @endif
</div>