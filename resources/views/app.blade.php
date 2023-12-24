<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script type="text/javascript">
            window.Laravel = {
                csrfToken: "{{ csrf_token() }}",
                jsPermissions: {!! auth()->check()?auth()->user()->jsPermissions():0 !!}
            }
        </script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Themes/{$page['component']}.vue"])
        @inertiaHead
        <script type="text/plain" async data-category="analytics" data-service="Google Analytics" src="https://www.googletagmanager.com/gtag/js?id=G-YQZWDXPYY5"></script>
        <script type="text/plain" data-category="analytics" data-service="Google Analytics">
             window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'G-YQZWDXPYY5');
        </script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
