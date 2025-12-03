<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="bg-white dark:bg-zinc-950 min-h-screen animate-[slideInFromRight_0.3s_ease-out] nativephp-safe-area">

    @if(!blank(\Native\Mobile\Facades\SecureStorage::get('api_token')))
        <native:top-bar title="{{ $title ?? config('app.name') }}" :show-navigation-icon="true">
            <native:top-bar-action id="profile-action" label="Home" icon="user" url="{{ route('profile') }}"/>
        </native:top-bar>
        <native:side-nav gestures_enabled="{{request()->routeIs('home')}}">
            <native:side-nav-header
                title="Welcome"
                subtitle="{{\Native\Mobile\Facades\SecureStorage::get('user_name')}}"
                icon="info"
                :show-close-button="true"
                :pinned="true"
            />
            <native:side-nav-item id="nav-home" label="Home" icon="home" url="{{ route('home') }}" active="{{ request()->routeIs('home') }}"/>
            <native:side-nav-item id="nav-news" label="News" icon="newspaper" url="{{ route('news') }}" active="{{ request()->routeIs('news') }}"/>
            <native:horizontal-divider/>
            <native:side-nav-item id="nav-profile" label="Profile" icon="user" url="{{ route('profile') }}" active="{{ request()->routeIs('profile') }}"/>
        </native:side-nav>
        <native:bottom-nav>
            <native:bottom-nav-item
                id="home"
                icon="home"
                label="Home"
                url="/home"
                active="{{request()->routeIs('home')}}"
            />
            <native:bottom-nav-item
                id="news"
                icon="newspaper"
                label="News"
                url="/news"
                badge="10"
                active="{{request()->routeIs('news')}}"
            />
            <native:bottom-nav-item
                id="profile"
                icon="person"
                label="Profile"
                url="/profile"
                active="{{request()->routeIs('profile')}}"
            />
        </native:bottom-nav>
    @endif

    <main class="px-4 {{\Native\Mobile\Facades\System::isAndroid() ? 'py-4' : 'py-15'}}">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
