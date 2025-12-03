<div class="flex flex-col gap-4">
    <div class="rounded-lg bg-white p-6 shadow dark:bg-zinc-800">
        <h2 class="text-xl font-semibold text-zinc-900 dark:text-white">Welcome back!</h2>
        <p class="mt-2 text-zinc-600 dark:text-zinc-400">{{ $userName }}</p>
        <p class="text-sm text-zinc-500 dark:text-zinc-500">{{ $userEmail }}</p>
    </div>
    <div class="rounded-lg bg-gradient-to-br from-blue-500 to-purple-600 p-6 text-white shadow-xl">
        <h3 class="text-lg font-semibold">Ready to build something amazing?</h3>
        <p class="mt-2 text-blue-100">
            Your mobile app is set up with Sanctum authentication, Biometric Security, SecureStorage, and EDGE components.
        </p>
    </div>
    <div class="rounded-lg bg-white p-6 shadow dark:bg-zinc-800">
        <h3 class="text-lg font-semibold text-zinc-900 dark:text-white">Quick Actions</h3>
        <div class="mt-4 flex flex-col gap-3">
            <button
                wire:click="logout"
                class="rounded-lg bg-red-600 px-4 py-2 text-white"
            >
                Log out
            </button>
        </div>
    </div>
</div>
