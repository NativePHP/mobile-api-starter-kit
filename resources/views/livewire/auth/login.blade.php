<div class="flex flex-col gap-6">
    <div class="text-center">
        <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Log in to your account</h1>
        <p class="mt-2  text-zinc-600 dark:text-zinc-400">Enter your email and password below to log in</p>
        <p class="text-blue-800 dark:text-blue-200 mt-6 bg-blue-50 dark:bg-blue-900 rounded-lg shadow p-4">
            This is the NativePHP Mobile API Starter Kit. To get started you must connect your app to an API. The API endpoints for this app is included in the same codebase. You can simply run `herd share` or use something like `ngrock` to start up the server. Then update your `.env` with the API endpoint, then continue to register/login.
        </p>
    </div>
    @if($errorMessage)
        <div class="rounded-lg bg-red-50 p-4 dark:bg-red-900/20">
            <p class=" text-red-800 dark:text-red-200">{{ $errorMessage }}</p>
        </div>
    @endif

    <form wire:submit="login" class="flex flex-col gap-6">
        <div>
            <label for="email" class="block  font-medium text-zinc-900 dark:text-white">Email address</label>
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
                <p class="mt-1  text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block  font-medium text-zinc-900 dark:text-white">Password</label>
            <input
                type="password"
                id="password"
                wire:model="password"
                class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 placeholder-zinc-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-500"
                placeholder="Password"
                required
            />
            @error('password')
                <p class="mt-1  text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="w-full rounded-lg bg-blue-600 px-4 py-2 text-white "
            wire:loading.attr="disabled"
            wire:target="login"
        >
            <span wire:loading.class="hidden" wire:target="login">Log In</span>
            <span class="hidden" wire:loading.class.remove="hidden" wire:target="login">Logging In...</span>
        </button>

        <button
            wire:click="skipLogin"
            class="w-full rounded-lg bg-purple-600 px-4 py-2 text-white "
        >
            Skip Login
        </button>
    </form>

    <div class="text-center  text-zinc-600 dark:text-zinc-400">
        <span>Don't have an account?</span>
        <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400" wire:navigate>Sign up</a>
    </div>
</div>
