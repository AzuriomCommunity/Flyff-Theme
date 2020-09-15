
@section('title', trans('auth.login'))

@if (session()->has('azuriom_is_game'))
    @include('auth.login.game')
@else
    @include('auth.login.website')
@endif


