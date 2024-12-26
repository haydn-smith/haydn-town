<?php

namespace App\Livewire;

use App\Models;
use Illuminate\Auth\Access\AuthorizationException;
use Livewire\Component;
use Spatie\LaravelMarkdown\MarkdownRenderer;

class Article extends Component
{
    public Models\Article $article;

    public string $content;

    public function mount(Models\Article $article)
    {
        $this->article = $article;

        throw_unless(
            $this->article->is_published,
            new AuthorizationException(),
        );

        throw_unless(
            $this->article->published_at->lessThan(now()),
            new AuthorizationException(),
        );

        // Prevent XSS attacks by sanitizing converted markdown.
        $this->content = str(app(MarkdownRenderer::class)
            ->toHtml($article->content))
            ->sanitizeHtml();
    }

    public function render()
    {
        return view('livewire.article');
    }
}
