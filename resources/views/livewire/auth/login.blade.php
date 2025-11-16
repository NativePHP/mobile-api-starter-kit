<div class="flex flex-col gap-6">
    <div class="text-center">
        <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Log in to your account</h1>
        <p class="mt-2 text-sm text-zinc-600 dark:text-zinc-400">Enter your email and password below to log in</p>
    </div>

    @if($errorMessage)
        <div class="rounded-lg bg-red-50 p-4 dark:bg-red-900/20">
            <p class="text-sm text-red-800 dark:text-red-200">{{ $errorMessage }}</p>
        </div>
    @endif

    <form wire:submit="login" class="flex flex-col gap-6">
        <div>
            <label for="email" class="block text-sm font-medium text-zinc-900 dark:text-white">Email address</label>
            <input
                type="email"
                id="email"
                wire:model="email"
                class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 placeholder-zinc-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-500"
                placeholder="email@example.com"
                required
                autofocus
            />
            @error('email')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-zinc-900 dark:text-white">Password</label>
            <input
                type="password"
                id="password"
                wire:model="password"
                class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 placeholder-zinc-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-500"
                placeholder="Password"
                required
            />
            @error('password')
                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="w-full rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-900"
            wire:loading.attr="disabled"
            wire:target="login"
        >
            <span wire:loading.class="hidden" wire:target="login">Log In</span>
            <span class="hidden" wire:loading.class.remove="hidden" wire:target="login">Logging In...</span>
        </button>
    </form>

    <div class="text-center text-sm text-zinc-600 dark:text-zinc-400">
        <span>Don't have an account?</span>
        <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-700 dark:text-blue-400" wire:navigate>Sign up</a>
    </div>
</div>
