<nav class="navbar navbar-expand-lg navbar-dark justify-center" data-aos="fade-down" data-aos-duration="700">
    <a class="navbar-brand d-block d-lg-none" href="{{ route('home') }}">
        <img src="{{ site_logo() }}" alt="{{ route('home') }}" class="d-lg-block d-none">
        <img src="{{ favicon() }}" alt="{{ route('home') }}" class="d-lg-none d-block">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
            aria-expanded="false" aria-label="{{ trans('messages.nav.toggle') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-center px-3" id="navbar">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav align-items-center">
            @foreach($navbar as $element)
                @if(!$element->isDropdown())
                    @if($element->name != 'logo')
                        <li class="nav-item @if($element->isCurrent()) active @endif">
                            <a class="nav-link" href="{{ $element->getLink() }}" @if($element->new_tab) target="_blank"
                               rel="noopener noreferrer" @endif>{{ $element->name }}</a>
                        </li>
                    @else
                        <a class="navbar-brand d-lg-block d-none mx-3" href="{{ route('home') }}">
                            <img src="{{ site_logo() }}" alt="{{ route('home') }}" class="d-lg-block d-none">
                        </a>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown{{ $element->id }}" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $element->name }}<i class=" pl-1 fas fa-chevron-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown{{ $element->id }}">
                            @foreach($element->elements as $childElement)
                                <a class="dropdown-item @if($childElement->isCurrent()) active @endif"
                                   href="{{ $childElement->getLink() }}" @if($childElement->new_tab) target="_blank"
                                   rel="noopener noreferrer" @endif>{{ $childElement->name }}</a>
                            @endforeach
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav align-items-center navbar--login">

            <!-- Authentication Links -->
            @guest
                <li class="nav-item d-none">
                    <a class="nav-link" href="{{ route('home') }}">{{ trans('auth.login') }}</a>
                </li>

                @if(Route::has('register'))
                    <li class="nav-item  d-none">
                        <a class="nav-link" href="{{ route('register') }}">{{ trans('auth.register') }}</a>
                    </li>
                @endif
            @else
                @include('elements.notifications')

                <li class="nav-item dropdown">
                    <a id="userDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                            {{ trans('messages.nav.profile') }}
                        </a>

                        @foreach(plugins()->getUserNavItems() ?? [] as $navId => $navItem)
                            <a class="dropdown-item" href="{{ route($navItem['route']) }}">
                                {{ trans($navItem['name']) }}
                            </a>
                        @endforeach

                        @if(Auth::user()->hasAdminAccess())
                            <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                {{ trans('messages.nav.admin') }}
                            </a>
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ trans('auth.logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
