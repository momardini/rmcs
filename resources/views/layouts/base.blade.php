<!DOCTYPE html>
<html  lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page_title', setting('admin.title') . " - " . setting('admin.description'))</title>
        <meta name="description" content="{{setting('admin.description','description')}}">
        <meta name="author" content="{{setting('admin.company','Midadtek')}}">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Tailwind UI -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2&display=swap" rel="stylesheet">


        @livewireStyles
        @stack('styles')

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body  class="antialiased font-sans bg-gray-200">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
{{--        <script src="https://unpkg.com/flowbite@latest/dist/flowbite.js"></script>--}}
        @stack('scripts')
    </body>
</html>
