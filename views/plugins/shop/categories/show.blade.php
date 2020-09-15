@extends('layouts.app')

@section('content')
	@if (session()->has('azuriom_is_game'))
		@include('shop::categories.show.game')
	@else
		@include('shop::categories.show.website')
	@endif
@endsection