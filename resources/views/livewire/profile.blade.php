<div class="flex flex-col gap-6">
    <!-- Profile Information Section -->
    <div class="rounded-lg bg-white p-6 shadow dark:bg-zinc-800">
        <h2 class="text-xl font-semibold text-zinc-900 dark:text-white">Profile Information</h2>
        <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Update your account's profile information and email address.</p>

        <form wire:submit="updateProfile" class="mt-6 flex flex-col gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-zinc-900 dark:text-white">Name</label>
                <input
                    type="text"
                    id="name"
                    wire:model="name"
                    class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 placeholder-zinc-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-500"
                    required
                />
                @error('name')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-zinc-900 dark:text-white">Email</label>
                <input
                    type="email"
                    id="email"
                    wire:model="email"
                    class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 placeholder-zinc-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-500"
                    required
                />
                @error('email')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-2 text-white "
                wire:loading.attr="disabled"
                wire:target="updateProfile"
            >
                <span wire:loading.class="hidden" wire:target="updateProfile">Update Profile</span>
                <span class="hidden" wire:loading.class.remove="hidden" wire:target="updateProfile">Updating...</span>
            </button>
        </form>
    </div>

    <!-- Update Password Section -->
    <div class="rounded-lg bg-white p-6 shadow dark:bg-zinc-800">
        <h2 class="text-xl font-semibold text-zinc-900 dark:text-white">Update Password</h2>
        <p class="mt-1 text-sm text-zinc-600 dark:text-zinc-400">Ensure your account is using a long, random password to stay secure.</p>

        <form wire:submit="updatePassword" class="mt-6 flex flex-col gap-6">
            <div>
                <label for="current_password" class="block text-sm font-medium text-zinc-900 dark:text-white">Current Password</label>
                <input
                    type="password"
                    id="current_password"
                    wire:model="current_password"
                    class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 placeholder-zinc-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-500"
                    required
                />
                @error('current_password')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-zinc-900 dark:text-white">New Password</label>
                <input
                    type="password"
                    id="password"
                    wire:model="password"
                    class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 placeholder-zinc-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-500"
                    required
                />
                @error('password')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-zinc-900 dark:text-white">Confirm Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    wire:model="password_confirmation"
                    class="mt-1 block w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-zinc-900 placeholder-zinc-400 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-zinc-600 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-500"
                    required
                />
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-4 py-2 text-white"
                wire:loading.attr="disabled"
                wire:target="updatePassword"
            >
                <span wire:loading.class="hidden" wire:target="updatePassword">Update Password</span>
                <span class="hidden" wire:loading.class.remove="hidden" wire:target="updatePassword">Updating...</span>
            </button>
        </form>
    </div>

    <div class="rounded-lg bg-white p-6 shadow dark:bg-zinc-800">
        <button
            class="w-full rounded-lg bg-red-600 px-4 py-2 text-white"
            wire:loading.attr="disabled"
        >
            <span wire:click="logout">Logout</span>
        </button>
    </div>
</div>
