<div>
    @if($error)
        <div class="rounded-lg bg-red-50 dark:bg-red-900/20 p-4">
            <p class="text-sm text-red-600 dark:text-red-400">{{ $error }}</p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($articles as $article)
                <div wire:click="openArticle('{{ $article['link'] }}')" class="block rounded-lg border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-800 overflow-hidden transition hover:border-zinc-300 dark:hover:border-zinc-700 cursor-pointer">
                    @if($article['image'])
                        <img src="{{ $article['image'] }}" alt="{{ $article['title'] }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="font-semibold text-zinc-900 dark:text-white mb-2">{{ $article['title'] }}</h3>
                        <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-3 line-clamp-2">{{ $article['description'] }}</p>
                        <time class="text-xs text-zinc-500 dark:text-zinc-500">{{ \Carbon\Carbon::parse($article['pubDate'])->diffForHumans() }}</time>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
