<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="bg-zinc-100 dark:bg-zinc-900 nativephp-safe-area">
    <native:top-bar title="{{ $title ?? config('app.name') }}" :show-navigation-icon="true">
        <native:top-bar-action id="profile-action" label="Home" icon="user" url="{{ route('profile') }}"/>
    </native:top-bar>

    <native:side-nav :gestures_enabled="!request()->routeIs('news')">
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

    <main class="min-h-screen px-4 py-6 animate-[slideInFromRight_0.3s_ease-out]">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
