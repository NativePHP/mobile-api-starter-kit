<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Native\Mobile\Facades\Browser;

class News extends Component
{
    public array $articles = [];
    public bool $loading = true;
    public string $error = '';

    public function mount(): void
    {
        $this->loadNews();
    }

    public function loadNews(): void
    {
        $this->loading = true;
        $this->error = '';

        try {
            $response = Http::timeout(10)->get('https://feed.laravel-news.com/');

            if ($response->successful()) {
                $xml = simplexml_load_string($response->body());

                if ($xml && isset($xml->channel->item)) {
                    foreach ($xml->channel->item as $item) {
                        $description = (string) $item->description;
                        $image = $this->extractImage($description);

                        $this->articles[] = [
                            'title' => (string) $item->title,
                            'link' => (string) $item->link,
                            'description' => strip_tags($description),
                            'pubDate' => (string) $item->pubDate,
                            'image' => $image,
                        ];
                    }
                }
            } else {
                $this->error = 'Failed to load news feed';
            }
        } catch (\Exception $e) {
            $this->error = 'Error loading news: ' . $e->getMessage();
        } finally {
            $this->loading = false;
        }
    }

    public function openArticle(string $url): void
    {
        Browser::inApp($url);
    }

    protected function extractImage(string $html): ?string
    {
        if (preg_match('/<img[^>]+src=["\']([^"\']+)["\'][^>]*>/i', $html, $matches)) {
            return $matches[1];
        }

        return null;
    }

    public function placeholder(): string
    {
        return <<<'HTML'
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
        HTML;
    }

    #[Layout('components.layouts.app', ['title' => 'Laravel News'])]
    public function render()
    {
        return view('livewire.news');
    }
}
