<div>
    <div class="space-y-4">
        @for($i = 0; $i < 5; $i++)
            <div class="rounded-lg border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-800 overflow-hidden animate-pulse">
                <div class="w-full h-48 bg-zinc-200 dark:bg-zinc-700"></div>
                <div class="p-4 space-y-3">
                    <div class="h-5 bg-zinc-200 dark:bg-zinc-700 rounded w-3/4"></div>
                    <div class="space-y-2">
                        <div class="h-4 bg-zinc-200 dark:bg-zinc-700 rounded"></div>
                        <div class="h-4 bg-zinc-200 dark:bg-zinc-700 rounded w-5/6"></div>
                    </div>
                    <div class="h-3 bg-zinc-200 dark:bg-zinc-700 rounded w-24"></div>
                </div>
            </div>
        @endfor
    </div>
</div>
