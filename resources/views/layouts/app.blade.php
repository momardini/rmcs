<!DOCTYPE html>
{{--<html lang="{{ config('app.locale') }}" dir="{{ __('voyager::generic.is_rtl') == 'true' ? 'rtl' : 'ltr' }}">--}}
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title', setting('admin.title') . " - " . setting('admin.description'))</title>
    <meta name="description" content="{{setting('admin.description','description')}}">
    <meta name="author" content="{{setting('admin.company','Midadtek')}}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Tailwind UI -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/ui@latest/dist/tailwind-ui.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles
    @stack('styles')
    <!-- Scripts -->
<style>
    .filepond--credits{
        display: none;
    }
</style>
    <wireui:scripts />
    <script src="{{ mix('js/app.js') }}" defer></script>

{{--    <script src="//unpkg.com/alpinejs" defer></script>--}}
</head>
<body class="font-sans antialiased">
<x-notifications z-index="z-50" />
<x-jet-banner />

<div class="min-h-screen bg-gray-100">
    @livewire('navigation-menu')

    <!-- Page Heading -->
{{--        <header class="bg-white shadow">--}}
{{--            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                @yield('header')--}}
{{--            </div>--}}
{{--        </header>--}}


    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
</div>

@stack('modals')

@livewireScripts

@stack('scripts')
<script  type="text/javascript">
{{--        @if(session()->has('notify'))--}}
{{--        window.$wireui.notify({--}}
{{--            title:  '{{session()->get('title')}}',--}}
{{--            icon: '{{session()->get('notify')}}'--}}
{{--        });--}}
{{--        @endif--}}
        @if (session()->has('notify'))
        Wireui.hook('notifications:load', () => {
            window.$wireui.notify({
                title:  '{{session()->get('title')}}',
                icon: '{{session()->get('notify')}}'
            })
        })
    @endif
    document.addEventListener('FilePond:addfilestart', (e) => {
        window.livewire.emit('UploadingFileProcess');
    });
    document.addEventListener('FilePond:processfile', (e) => {
        window.livewire.emit('UploadingFileProcess');
    });
</script>

{{--<script src="https://unpkg.com/flowbite@latest/dist/flowbite.js"></script>--}}

</body>
</html>
