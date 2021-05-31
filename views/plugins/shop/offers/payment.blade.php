@extends('layouts.app')

@section('title', trans('shop::messages.offers.title-payment'))

@section('content')
    <div class="container content" id="plugin--shop">
        <h1>{{ trans('shop::messages.offers.title-payment') }}</h1>

        <div class="row mt-3">
            @forelse($gateways as $gateway)
                <div class="col-md-3">
                    <a href="{{ route('shop.offers.buy', $gateway) }}" class="payment-method">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ $gateway->paymentMethod()->image() }}" style="max-height: 45px"
                                     class="img-fluid" alt="{{ $gateway->name }}">
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col">
                    <div class="alert alert-warning" role="alert">
                        {{ trans('shop::messages.payment.empty') }}
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
