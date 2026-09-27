<header class="header">
    <div class="title-control">
        <button class="btn side-toggle" type="button" aria-label="Toggle navigation menu" aria-controls="side-menu" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <a href="{{ route('admin.dashboard') }}" class="side-logo primary-color">
            <h3>{{ App_Name() }}</h3>
        </a>

        <h1 class="page-title">@yield('page_title')</h1>
    </div>

    <div class="head-control">

        <!-- Demo Mode  -->
        @if( env('DEMO_MODE') == 'ON')
            <div class="demo-mode-box">
                <span>{{__('label.demo_mode')}}</span>
            </div>
        @endif

        <!-- Language -->
        <div class="dropdown dropright">
            <a href="#" class="btn head-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                aria-label="Change language">
                <i class="fa-solid fa-language primary-color"></i>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item primary-color" href="{{ route('change.language', ['locale' => 'en']) }}">
                    <i class="fa-solid fa-globe"></i>
                    English
                </a>
                <a class="dropdown-item primary-color" href="{{ route('change.language', ['locale' => 'hi']) }}">
                    <i class="fa-solid fa-globe"></i>
                    Hindi
                </a>
                <a class="dropdown-item primary-color" href="{{ route('change.language', ['locale' => 'fr']) }}">
                    <i class="fa-solid fa-globe"></i>
                    French
                </a>
            </div>
        </div>

        <!-- Profile -->
        <div class="dropdown dropright">
            <a href="#" class="btn head-btn head-profile" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <span class="head-avatar"><i class="fa-solid fa-user"></i></span>
                <span class="head-profile-meta">
                    <span class="head-profile-name">{{ data_get(auth('admin')->user(), 'user_name', __('label.profile')) }}</span>
                </span>
                <i class="fa-solid fa-chevron-down head-profile-caret"></i>
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item primary-color" href="{{ route('admin.profile.index') }}">
                    <i class="fa-solid fa-user"></i>
                    {{__('label.profile')}}
                </a>
                <a class="dropdown-item primary-color" href="{{ route('admin.logout') }}">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    {{__('label.logout')}}
                </a>
            </div>
        </div>
    </div>
</header>
