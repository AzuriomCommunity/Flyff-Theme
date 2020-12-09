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

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}" defer></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('vendor/axios/axios.min.js') }}" defer></script>
    <script src="{{ theme_asset('js/css-vars-ponyfill.min.js') }}" defer></script>


    <!-- Page level scripts -->
@stack('scripts')

<!-- Scripts -->
    @if (session()->has('azuriom_is_game'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
                $('[data-toggle="tooltip"]').tooltip();
                $('[data-confirm="delete"]').on('click', function (e) {
                    e.preventDefault();
                    $('#confirmDeleteForm').attr('action', $(this).attr('href'));
                    $('#confirmDeleteModal').modal('show');
                });
                cssVars({});
            });

        </script>

        <style>
            body {
                cursor: url("{{ theme_asset('image/flyff.cur') }}"), default;
            }

            a, button, .btn:not(:disabled):not(.disabled) {
                cursor: url("{{ theme_asset('image/flyff_link.cur') }}"), auto;
            }
        </style>
    @else
        <script src="{{ asset('js/script.js') }}" defer></script>
        <script src="{{ theme_asset('js/glide.min.js') }}" defer></script>
        <script src="{{ theme_asset('js/aos.js') }}"></script>
        <script src="{{ theme_asset('js/app.js') }}" defer></script>

        <link href="{{ theme_asset('css/glide.core.min.css') }}" rel="stylesheet">
        <link href="{{ theme_asset('css/aos.css') }}" rel="stylesheet">

        @push('footer-scripts')
            <script>
                AOS.refresh();
            </script>
        @endpush
    @endif

<!-- Styles -->
    <link href="{{ theme_asset('css/styles.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body class="{{session()->has('azuriom_is_game')? 'azuriom_is_game': ''}}">
<div id="app">
    @if(!session()->has('azuriom_is_game'))
        <header class="header">
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

<footer class=" footer">
    <div class="footer--top">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <div class="col-md-3 mt-3">
                    <img class="footer--logo" src="{{ site_logo() }}" alt="{{ route('home') }}">
                </div>
                <div class="col-md-4 mt-3">
                    <div class="footer--propos">
                        <h3>À propos de nous</h3>
                        <p>{{ config('theme.footer_description') }}</p>
                    </div>
                </div>
                <div class="col-md-3 mt-3">
                    <div class="footer--liens">
                        <h3>Liens</h3>
                        <ul class="navbar-nav">
                            @php
                                $navbars = \Azuriom\Models\NavbarElement::all()
                            @endphp
                            @foreach($navbars as $element)
                                @if($element->name != 'logo')
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ $element->value }}"
                                           id="navbarDropdown{{ $element->id }}">
                                            {{ $element->name }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @if(config('theme.footer_links'))
                <div class="container footer--links mt-3">
                    <div class="row">
                        <div class="col-md-12 justify-content-center align-items-center d-flex">
                            @foreach(config('theme.footer_links') ?? [] as $link )
                                <div class="footer--links-item">
                                    <a target="_blank" href="{{$link['value']}}" title="{{ $link['name'] }}">
                                        {!! $link['icon'] !!}
                                    </a>

                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="container-fluid px-0 footer--bottom">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="footer--copyright">
                                <div class="container">
                                    {{ setting('copyright') }} | @lang('messages.copyright') | Thème réalisé par
                                    <a href="https://linedev.fr/" target="_blank"
                                       rel="noopener noreferrer">Linedev</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 mt-md-0 mt-3 text-md-right text-center footer--legal">
                            @if(config('theme.cgv_link'))
                                <a href="/{{config('theme.cgu_link')}}"
                                   title="{{ trans('theme::lang.config.cgu.name')}}" target="_blank">
                                    {{ trans('theme::lang.config.cgu.abbreviation')}}
                                </a>
                            @endif
                            @if(config('theme.cgv_link'))
                                -
                                <a href="/{{config('theme.cgv_link')}}" target="_blank"
                                   title="{{ trans('theme::lang.config.cgv.name')}}">
                                    {{ trans('theme::lang.config.cgv.abbreviation')}}
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@stack('footer-scripts')

</body>
</html>
