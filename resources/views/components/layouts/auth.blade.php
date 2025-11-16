<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="bg-white dark:bg-zinc-900 nativephp-safe-area">
        <main class="w-full px-6 py-8">
            <div class="mx-auto w-full max-w-md animate-[slideInFromRight_0.3s_ease-out]">
                {{ $slot }}
            </div>
        </main>

        @livewireScripts
    </body>
</html>
