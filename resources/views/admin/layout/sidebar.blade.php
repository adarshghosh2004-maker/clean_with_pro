<div class="sidebar">
    <div class="side-head">
        <a href="{{ route('admin.dashboard') }}" class="primary-color side-logo">
            <h3>{{ App_Name() }}</h3>
        </a>
        <button class="btn side-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <ul class="side-menu mt-4">
        <p class="partition"><span>{{__('label.dashboard_and_report')}}</span></p>
        <li
            class="side_line {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}{{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class="fa-solid fa-house fa-2xl menu-icon"></i>
                <span>{{__('label.dashboard')}}</span>
            </a>
        </li>
        <p class="partition"><span>{{__('label.basic_data')}}</span></p>
        <li class="side_line {{ request()->routeIs('admin.question*') ? 'active' : '' }}">
            <a href="{{ route('admin.question.index') }}">
                <i class="fa-solid fa-question fa-2xl menu-icon"></i>
                <span>{{__('label.question')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.service*') ? 'active' : '' }}">
            <a href="{{ route('admin.service.index') }}">
                <i class="fa-brands fa-servicestack fa-2xl menu-icon"></i>
                <span>{{__('label.service')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.video*') ? 'active' : '' }}">
            <a href="{{ route('admin.video.index') }}">
                <i class="fa-solid fa-video fa-2xl menu-icon"></i>
                <span>{{__('label.video')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.gallery*') ? 'active' : '' }}">
            <a href="{{ route('admin.gallery.index') }}">
                <i class="fa-solid fa-images fa-2xl menu-icon"></i>
                <span>{{__('label.gallery')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.user*') ? 'active' : '' }}">
            <a href="{{ route('admin.user.index') }}">
                <i class="fa-solid fa-users fa-2xl menu-icon"></i>
                <span>{{__('label.quotes')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.appsetting*') ? 'active' : '' }}">
            <a href="{{ route('admin.appsetting.index') }}">
                <i class="fa-solid fa-gear fa-2xl menu-icon"></i>
                <span>{{__('label.app_settings')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.notification.*') ? 'active' : '' }}">
            <a href="{{ route('admin.notification.index') }}">
                <i class="fa-solid fa-bell fa-2xl menu-icon"></i>
                <span>{{__('label.notification')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.panelsetting*') ? 'active' : '' }}">
            <a href="{{ route('admin.panelsetting.index') }}">
                <i class="fa-solid fa-palette fa-2xl menu-icon"></i>
                <span>{{__('label.panel_settings')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.notificationconfigurations*') ? 'active' : '' }}">
            <a href="{{ route('admin.notificationconfigurations.index') }}">
                <i class="fa-solid fa-bell fa-2xl menu-icon"></i>
                <span>{{__('label.notification_configurations')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.system.setting*') ? 'active' : '' }}">
            <a href="{{ route('admin.system.setting.index') }}">
                <i class="fa-solid fa-screwdriver-wrench fa-2xl menu-icon"></i>
                <span>{{__('label.system_settings')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.feedback*') ? 'active' : '' }}">
            <a href="{{ route('admin.feedback.index') }}">
                <i class="fa-regular fa-comment fa-2xl menu-icon"></i>
                <span>{{__('label.feedback')}}</span>
            </a>
        </li>
        <li class="side_line {{ request()->routeIs('admin.page*') ? 'active' : '' }}">
            <a href="{{ route('admin.pages.index') }}">
                <i class="fa-solid fa-book-open fa-2xl menu-icon"></i>
                <span>{{__('label.pages')}}</span>
            </a>
        </li>
        <p class="partition"><span>{{__('label.account')}}</span></p>
        <li>
            <a href="{{ route('admin.logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket fa-2xl menu-icon"></i>
                <span>{{__('label.logout')}}</span>
            </a>

            <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>