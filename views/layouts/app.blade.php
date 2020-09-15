@if (request()->is_game || session()->has('azuriom_is_game'))
@php
    session()->put('azuriom_is_game','1');
@endphp
    
    @include('layouts.game')
@else
    @include('layouts.website')
@endif