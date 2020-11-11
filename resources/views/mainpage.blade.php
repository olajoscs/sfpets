<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ __('pets.app_title') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="shortcut Icon"
              href="/images/pets/fire-egg.png" type="image/x-icon"/>
        <link rel="apple-touch-icon" sizes="57x57"
              href="/images/pets/fire-egg.png">
        <link rel="apple-touch-icon" sizes="60x60"
              href="/images/pets/fire-egg.png">
        <link rel="apple-touch-icon" sizes="72x72"
              href="/images/pets/fire-egg.png">
        <link rel="apple-touch-icon" sizes="76x76"
              href="/images/pets/fire-egg.png">
        <link rel="apple-touch-icon" sizes="114x114"
              href="/images/pets/fire-egg.png">
        <link rel="apple-touch-icon" sizes="120x120"
              href="/images/pets/fire-egg.png">
        <link rel="apple-touch-icon" sizes="144x144"
              href="/images/pets/fire-egg.png">
        <link rel="apple-touch-icon" sizes="152x152"
              href="/images/pets/fire-egg.png">
        <link rel="apple-touch-icon" sizes="180x180"
              href="/images/pets/fire-egg.png">
        <link rel="icon" type="image/png" sizes="192x192"
              href="/images/pets/fire-egg.png">
        <link rel="icon" type="image/png" sizes="32x32"
              href="/images/pets/fire-egg.png">
        <link rel="icon" type="image/png" sizes="96x96"
              href="/images/pets/fire-egg.png">
        <link rel="icon" type="image/png" sizes="16x16"
              href="/images/pets/fire-egg.png">
        <meta name="msapplication-TileImage"
              content="/images/pets/fire-egg.png">
        <meta name="msapplication-TileColor"
              content="#ffffff">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body>
        <div id="app"></div>

        <script type="text/javascript">
            const LOCALE = '{{ $locale }}';
        </script>

        {{-- Load the application scripts --}}
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
