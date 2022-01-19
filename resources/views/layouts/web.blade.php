<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>

        @yield('style')

        @stack('styles')
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
        @include('layouts.icons')

        <x-web-nav></x-web-nav>
        {{-- carousel --}}
        @if (isset($carousel))
        {{ $carousel }}
        @endif
        {{--  --}}
        <div>
            @yield('aside')
            <main>
                {{ $slot }}
            </main>

        </div>
        @if (isset($divider))
        {{ $divider }}
        @endif
        <x-footer></x-footer>

        @stack('modals')
        @stack('scripts')
    </body>
</html>
