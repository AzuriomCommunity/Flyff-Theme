@extends('layouts.app')

@section('title', $category->name)

@push('styles')

<style>
.quantity {position: relative;display: inline-flex;}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none;margin: 0;}

input[type=number] {-moz-appearance: textfield;}

.quantity input {height: 20px;float: left;display: block;padding: 0;margin: 0;border: none;box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.08);font-size: 1rem;border-radius: 4px;}

.quantity input:focus {outline: 0;}

.quantity-nav {float: left;position: relative;height: 20px;}

.quantity-button {position: relative;border: none;border-left: 1px solid rgba(0, 0, 0, 0.08);width: 20px;text-align: center;color: #333;font-size: 10px;font-weight: bold;font-family: "FontAwesome" !important;padding: 0;background: #FAFAFA;-webkit-transform: translateX(-100%);transform: translateX(-100%);-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;-o-user-select: none;user-select: none;color: #000}

a:not([href]):not([tabindex]) { color: #000}

.quantity-button:active {background: #EAEAEA;}

.quantity-button.quantity-up {position: absolute;height: 50%;top: 0;border-bottom: 1px solid rgba(0, 0, 0, 0.08);border-radius: 0 4px 0 0;}

.quantity-button.quantity-down {position: absolute;bottom: 0;height: 50%;border-radius: 0 0 4px 0;}

</style>

@endpush

@section('content')
    <div class="row bg-secondary" style="min-height: 500px">
        <div style="min-height: 500px;padding-right: 0px" class="col-4 bg-success">
            @include('shop::categories.sidebar')
        </div>
        <div style="min-height: 500px" class="col-8 bg-warning">
            <div class="row">
                @php
                    $packages = $category->packages()->paginate(6);
                @endphp
                @forelse($packages as $package)
                    <div style="padding:0;" class="col-6 @if($loop->even) bg-info @endif">
                        <h6>{{ $package->name }}</h6>
                        <form action="{{ route('shop.packages.buy', $package) }}" method="POST">
                            @csrf
                            @if($package->image !== null)
                                <img style="width: 58px; height: 48px" src="{{ $package->imageUrl() }}" alt="{{ $package->name }}" data-package-url="{{ route('shop.packages.show', $package) }}">
                            @endif
                            <div style="font-size: 12px; display: inline-block;">
                                <span>
                                    @if($package->isDiscounted())
                                        <del class="small">{{ $package->getOriginalPrice() }}</del>
                                    @endif
                                    {{ shop_format_amount($package->getPrice()) }}<br>
                                    Quantité : @if($package->has_quantity)
                                    <div class="quantity input-group-sm">
                                        <input type="number" style="width: 50px" min="1" max="{{ $package->getMaxQuantity() }}" name="quantity" step="1" value="1">
                                    </div>
                                    @else
                                    1
                                    @endif
                                </span>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-danger" type="submit">Buy</button>
                            </div>
                            
                        </form>
                    </div>
                @empty
                    <div class="col">
                        <div class="alert alert-warning" role="alert">
                            {{ trans('shop::messages.categories.empty') }}
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="d-flex justify-content-center">
                {{$packages->links()}} 
            </div>
            
        </div>
    </div>
    <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel" aria-hidden="true"></div>
@endsection

@push('footer-scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
		jQuery('<div class="quantity-nav"><a class="quantity-button quantity-up">+</a><a class="quantity-button quantity-down">-</a></div>').insertAfter('.quantity input');
		jQuery('.quantity').each(function () {
			var spinner = jQuery(this),
				input = spinner.find('input[type="number"]'),
				btnUp = spinner.find('.quantity-up'),
				btnDown = spinner.find('.quantity-down'),
				min = input.attr('min'),
				max = input.attr('max');
			
			btnUp.click(function () {
				var oldValue = parseFloat(input.val());
				if (oldValue >= max) {
					var newVal = oldValue;
				} else {
					var newVal = oldValue + 1;
				}
				spinner.find("input").val(newVal);
				spinner.find("input").trigger("change");
			});
			
			btnDown.click(function () {
				var oldValue = parseFloat(input.val());
				if (oldValue <= min) {
					var newVal = oldValue;
				} else {
					var newVal = oldValue - 1;
				}
				spinner.find("input").val(newVal);
				spinner.find("input").trigger("change");
			});
		});
        // $.each(document.querySelectorAll('[data-package-url]'), function (el) {
        //     $(el).on('click', function (ev) {
        //         ev.preventDefault();
        //         axios.get(el.dataset['packageUrl'], {
        //             headers: {
        //                 'X-PJAX': 'true'
        //             }
        //         }).then(function (response) {
        //             $('#itemModal').html(response.data).modal('show');
        //         }).catch(function (error) {
        //             createAlert('danger', error, true);
        //         });
        //     });
        // });
    });
    
</script>
@endpush