<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\Support\Collection;
use Livewire\Component;

class Home extends Component
{
    public Collection $articles;

    public function mount()
    {
        $this->articles = Article::query()
            ->where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at')
            ->get();
    }

    public function render()
    {
        return view('livewire.home');
    }
}
