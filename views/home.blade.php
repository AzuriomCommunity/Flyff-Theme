@extends('layouts.app')

@section('title', trans('messages.home'))

@section('content')
    @if(!session()->has('azuriom_is_game'))
        <div id="preloader">
            <img src="{{ site_logo() }}" alt="{{ route('home') }}">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    @endif
    @if(!empty(config('theme.sliders')) and !session()->has('azuriom_is_game'))
        @if(!empty(config('theme.sliders')[0]['url']))
            <div class="home--glide glide" data-component="hero">
                <div data-glide-el="track" class="glide__track">
                    <ul class="glide__slides">
                        @foreach(config('theme.sliders') ?? [] as $slider )
                            <li class="glide__slide">
                                <div class="card">
                                    <img class="card-img"
                                         src="{{ !empty($slider['url']) ? image_url($slider['url']) :'https://via.placeholder.com/2000x500'}}"
                                         alt="Card image">
                                    @if(!empty($slider['title']) || !empty($slider['description']))
                                        <div class="card-img-overlay">

                                            <div class="glide__arrows" data-glide-el="controls">
                                                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i
                                                        class="fas fa-chevron-left"></i></button>
                                                <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i
                                                        class="fas fa-chevron-right"></i></button>
                                            </div>
                                            <h2 class="card-title">{{ !empty($slider['title']) ? $slider['title'] :''}}</h2>
                                            <p class="card-text">{{ !empty($slider['description']) ? $slider['description'] :''}}</p>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    @endif
    <div class="container home--page">
        <div class="row flex-wrap-reverse flex-md-wrap">
            <div class="col-md-8" data-aos="fade-up-right" data-aos-anchor=".home--glide">
                <div class="row">
                    @php
                        $posts = \Azuriom\Models\Post::published()
                                    ->with('author')
                                    ->orderByDesc('is_pinned')
                                    ->latest('published_at')
                                    ->paginate(2)
                    @endphp
                    @foreach($posts as $post)
                        <div class="col-md-12" data-aos="fade-up">
                            <div class="post-preview card mb-5 shadow-lg">
                                <div class="card-body">
                                    <h3 class="card-title">
                                        <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h3>
                                    @if($post->hasImage())
                                        <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}"
                                             class="card-img">
                                    @endif
                                    <p class="card-text">{{ Str::limit(strip_tags($post->content), 250) }}</p>
                                    <a class="btn btn-primary btn-grad "
                                       href="{{ route('posts.show', $post) }}">{{ trans('messages.posts.read') }}</a>
                                </div>
                                <div class="card-footer text-muted">
                                    {{ trans('messages.posts.posted', ['date' => format_date($post->published_at), 'user' => $post->author->name]) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{$posts->links()}}
                </div>

            </div>
            <div class="col-md-4 mb-5 mb-md-0" data-aos="fade-up-left">
                @guest
                    @include('auth.login.home')
                @endguest
                <div class="home--box">
                    <div class="home--box-title">DAILY EVENTS</div>
                    <div class="home--box-text ske ske--text"></div>
                    <div class="home--box-text ske ske--text"></div>
                    <div class="home--box-text ske ske--text"></div>
                    <div class="home--box-text ske ske--text"></div>
                </div>
                <div class="home--box">
                    <div class="home--box-title">DAILY EVENTS</div>
                    <div class="home--box-text ske ske--text"></div>
                    <div class="home--box-text ske ske--text"></div>
                    <div class="home--box-text ske ske--text"></div>
                    <div class="home--box-text ske ske--text"></div>
                </div>
                <div class="home--box">
                    <div class="home--box-title">Status serveur</div>
                    <div class="home--box-text ske ske--text"></div>
                    <div class="home--box-text ske ske--text"></div>
                    <div class="home--box-text ske ske--text"></div>
                    <div class="home--box-text ske ske--text"></div>
                </div>

                @if(config('theme.discord-id'))
                    <iframe class="mt-4"
                            src="https://discordapp.com/widget?id={{config('theme.discord-id')}}&theme=dark"
                            width="350"
                            height="500" allowtransparency="true" frameborder="0"
                            sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
                @endif

            </div>
        </div>
    </div>
@endsection
