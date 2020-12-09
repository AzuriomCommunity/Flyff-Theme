<div class="card mb-5">
    <div class="card-header">{{ trans('auth.login') }}</div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ trans('auth.email') }}</label>

                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ trans('auth.password') }}</label>

                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror" name="password"
                       required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="remember"
                           id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="custom-control-label" for="remember">
                        {{ trans('auth.remember-me') }}
                    </label>
                </div>
            </div>

            <div class="form-group row justify-content-around">
                <button type="submit" class="btn btn-accent btn-grad col-5 mb-2">
                    {{ trans('auth.login') }}
                </button>
                <a class="btn btn-register btn-grad col-5  mb-2"
                   href="{{ route('register') }}">{{ trans('auth.register') }}</a>

                @if (Route::has('password.request'))
                    <a class="btn btn-link  col-12  mb-2" href="{{ route('password.request') }}">
                        {{ trans('auth.forgot-password') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
