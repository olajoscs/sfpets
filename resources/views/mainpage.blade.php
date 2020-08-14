<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ __('pets.app_title') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
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
