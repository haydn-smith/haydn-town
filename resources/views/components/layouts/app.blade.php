<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Haydn Smith - Software Engineer</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <link rel="icon"
      href="data:image/svg+xml,&lt;svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22&gt;&lt;text y=%22.9em%22 font-size=%2290%22&gt;🏙️&lt;/text&gt;&lt;/svg&gt;" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet">
  </head>

  <body
    class="flex h-screen w-screen flex-col gap-6 overflow-auto bg-dracula-background p-8 font-body text-dracula-purple">

    <a class="plain-anchor" href="/">
      <span class="mr-2 text-5xl">🏙️</span>
    </a>

    <div class="max-w-lg">
      {{ $slot }}
    </div>

    @livewireScripts
  </body>
</html>
