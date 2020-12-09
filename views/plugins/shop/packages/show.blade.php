@if(session()->has('azuriom_is_game'))
    @include('shop::packages.show.game')
@else
    @include('shop::packages.show.website')
@endif