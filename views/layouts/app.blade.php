<!DOCTYPE html>
@include('elements.base')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description', setting('description', ''))">
    <meta name="theme-color" content="#3490DC">
    <meta name="author" content="Azuriom">

    <meta property="og:title" content="@yield('title')">
    <meta property="og:type" content="@yield('type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ favicon() }}">
    <meta property="og:description" content="@yield('description', setting('description', ''))">
    <meta property="og:site_name" content="{{ site_name() }}">
    @stack('meta')

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ site_name() }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ favicon() }}">

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/axios/axios.min.js') }}" defer></script>
    
   

    <!-- Page level scripts -->
    @stack('scripts')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @if (session()->has('azuriom_is_game'))
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

            $('[data-toggle="tooltip"]').tooltip();

            $('[data-confirm="delete"]').on('click', function (e) {
                e.preventDefault();

                $('#confirmDeleteForm').attr('action', $(this).attr('href'));
                $('#confirmDeleteModal').modal('show');
            });
        });
    </script>
    <style>
        body {
            cursor: url("{{ theme_asset('flyff.cur') }}"), default;
        }
        a,button,.btn:not(:disabled):not(.disabled){
            cursor: url("{{ theme_asset('flyff_link.cur') }}"), auto;
        }
    </style>
    @else
        <script src="{{ asset('js/script.js') }}" defer></script>
    @endif

    
    @stack('styles')
    <link href="{{ theme_asset('css/style.css') }}" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        #app {
            flex-shrink: 0;
        }

        .content {
            margin-top: 3rem;
            margin-bottom: 3rem;
        }

        .user-html-content img {
            max-width: 100%;
            height: auto;
        }

        footer {
            background: #232323;
        }
    </style>
</head>

<body>
<div id="app">
    @if(!session()->has('azuriom_is_game'))
        <header>
            @include('elements.navbar')
        </header>
    @endif
    <main>
        <div class="container">
            @include('elements.session-alerts')
        </div>

        @yield('content')
    </main>
</div>

<footer class="text-white mt-auto py-4 text-center">
    <div class="copyright">
        <div class="container">
            {{ setting('copyright') }} | @lang('messages.copyright')
        </div>
    </div>
</footer>

@stack('footer-scripts')

</body>
</html>
