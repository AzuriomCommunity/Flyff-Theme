@if (request()->is_game || session()->has('azuriom_is_game'))
@php
    session('azuriom_is_game','1');
    if(!session()->has('m_idPlayer')) {
        session(['m_idPlayer' => request()->m_idPlayer]);
        session(['m_nServer'=> request()->m_nServer]);
    }
@endphp
    
    @include('layouts.game')
@else
    @include('layouts.website')
@endif