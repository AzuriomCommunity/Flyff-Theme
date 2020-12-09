@extends('layouts.app')

@section('title', trans('faq::messages.title'))

@section('content')
    <div class="container content">
        <h1>{{ trans('faq::messages.title') }}</h1>

        @empty($questions)
            <div class="alert alert-info" role="alert">
                {{ trans('faq::messages.empty') }}
            </div>
        @else
            <div class="accordion" id="faq">
                @php($i = 0)
                @foreach($questions as $question)
                    @php($i++)
                    <div class="card" data-aos="fade-up" data-aos-delay="{{150 * $i}}">
                        <div class="card-header px-3 py-4" id="heading{{ $question->id }}">
                            <a class="collapsed" data-toggle="collapse" href="#collapse{{ $question->id }}"
                               data-target="#collapse{{ $question->id }}" aria-expanded="false"
                               aria-controls="collapse{{ $question->id }}">
                                {{ $question->name }}
                            </a>
                        </div>

                        <div id="collapse{{ $question->id }}" class="collapse"
                             aria-labelledby="heading{{ $question->id }}" data-parent="#faq">
                            <div class="card-body">
                                {{ $question->parseAnswer() }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endempty
    </div>
@endsection
