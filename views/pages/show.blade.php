@extends('layouts.app')

@section('title', $page->title)
@section('description', $page->description)

@section('content')
    <div class="container content pages">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <h1>{{ $page->title }}</h1>
            </div>
            <div class="col-12">
                <div class="card shadow-sm" data-aos="fade-up">
                    <div class="card-body">

                        @if($page->slug === config('theme.cgv_link'))
                            <div class="card-text user-html-content">
                                @if(config('theme.cgv'))
                                    {!! config('theme.cgv') !!}
                                @endif
                            </div>
                        @elseif($page->slug === config('theme.cgu_link'))
                            <div class="card-text user-html-content">
                                @if(config('theme.cgu'))
                                    {!! config('theme.cgu') !!}
                                @endif
                            </div>
                        @elseif($page->slug === config('theme.download_link'))

                            <div class="card-text user-html-content">
                                @if(config('theme.download'))
                                    {!! config('theme.download') !!}
                                @endif
                            </div>
                        @else
                            <div class="card-text user-html-content">
                                {!! $page->content !!}
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
