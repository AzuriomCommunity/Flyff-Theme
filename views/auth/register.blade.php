@extends('layouts.app')

@section('title', trans('auth.register'))

@section('content')
    <div class="container content" id="auth">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('auth.register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" id="captcha-form">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('auth.name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('auth.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('auth.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('auth.confirm-password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            @if($conditions !== null)
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="custom-control custom-checkbox">
                                            <input
                                                class="custom-control-input @error('conditions') is-invalid @enderror"
                                                type="checkbox" name="conditions"
                                                id="conditions" {{ old('conditions') ? 'checked' : '' }}>

                                            <label class="custom-control-label" for="conditions">
                                                J'accepte les
                                                <a href="/{{config('theme.cgu_link')}}"
                                                   title="{{ trans('theme::lang.config.cgu.name')}}" target="_blank">
                                                    {{ trans('theme::lang.config.cgu.abbreviation')}}
                                                </a>
                                                @error(config('theme.cgu_link'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                @if(config('theme.cgv_link'))
                                                    ,
                                                    <a href="/{{config('theme.cgv_link')}}" target="_blank"
                                                       title="{{ trans('theme::lang.config.cgv.name')}}">
                                                        {{ trans('theme::lang.config.cgv.abbreviation')}}
                                                    </a>
                                                @endif
                                            </label>

                                        </div>
                                    </div>
                                </div>
                            @endif

                            @include('elements.captcha', ['center' => true])

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('auth.register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
