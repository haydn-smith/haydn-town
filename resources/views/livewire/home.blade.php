<div>
  <div class="mb-4">
    <div>
      Haydn Smith
    </div>

    <div>
      Software Engineer
    </div>
  </div>

  <div class="mb-4">
    Adelaide, AU
  </div>

  <div class="mb-4">
    <div>
      <a class="plain-anchor" href="https://github.com/haydn-smith" target="_blank" rel="noreferrer">
        <span class="mr-2">👾</span>github.com/haydn-smith
      </a>
    </div>
  </div>

  @if ($articles->isNotEmpty())
    <div class="mb-4">
      Hi! I'm a software engineer who occasionaly builds interesting things. When I do, I post them here!
    </div>

    <div class="text-dracula-purple">Articles:</div>

    @foreach ($articles as $article)
      <div>
        <a class="plain-anchor" href="/articles/{{ $article->slug }}">
          <span class="mr-2">📝</span> {{ $article->published_at->format('Y-m-d') }} - {{ $article->title }}
        </a>
      </div>
    @endforeach
  @endif
</div>
