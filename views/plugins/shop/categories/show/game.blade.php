@push('styles')
<style>
	.sc5::-webkit-scrollbar {
	width: 15px;
	height: 15px;
	}
	.sc5::-webkit-scrollbar-track {
	border-radius: 10px;
	background-color: rgba(255, 255, 255, 0.1);
	}
	.sc5::-webkit-scrollbar-thumb {
	background-image: linear-gradient(45deg, #00aeff, #a68eff);
	border-radius: 10px;
		-webkit-box-shadow: rgba(0,0,0,.12) 0 3px 13px 1px;
	}

	.quantity {
	position: relative;
	display: inline-flex;
	}

	input[type=number]::-webkit-inner-spin-button,
	input[type=number]::-webkit-outer-spin-button {
	-webkit-appearance: none;
	margin: 0;
	}

	input[type=number] {
	-moz-appearance: textfield;
	}

	.quantity input {
	height: 30px;
	line-height: 1.65;
	float: left;
	display: block;
	padding: 0;
	margin: 0;
	padding-left: 20px;
	border: none;
	box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.08);
	font-size: 1rem;
	border-radius: 4px;
	}

	.quantity input:focus {
	outline: 0;
	}

	.quantity-nav {
	float: left;
	position: relative;
	height: 30px;
	}

	.quantity-button {
	position: relative;
	cursor: pointer;
	border: none;
	border-left: 1px solid rgba(0, 0, 0, 0.08);
	width: 20px;
	text-align: center;
	color: #333;
	font-size: 13px;
	font-family: "FontAwesome" !important;
	line-height: 1.5;
	padding: 0;
	background: #FAFAFA;
	-webkit-transform: translateX(-100%);
	transform: translateX(-100%);
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	-o-user-select: none;
	user-select: none;
	}

	.quantity-button:active {
	background: #EAEAEA;
	}

	.quantity-button.quantity-up {
	position: absolute;
	height: 50%;
	top: 0;
	border-bottom: 1px solid rgba(0, 0, 0, 0.08);
	cursor: url('/assets/flyff_link.cur'), pointer;
	border-radius: 0 4px 0 0;
	line-height: 1.6
	}

	.quantity-button.quantity-down {
	position: absolute;
	bottom: 0;
	height: 50%;
	border-radius: 0 0 4px 0;
	cursor: url('/assets/flyff_link.cur'), pointer;
	}

	.parent-quantity {
		height: 30px;
	}

	#left-side-bar {
		padding-left: 0;
		padding-right: 0;
	}
	.bg-dark-flyff {
		background-color: #3d3c3c;
		color: #b1ae7a
		
	}

	#left-side-bar {
		width: 15%;
		border: 2pt double #b1ae7a;
		border-radius: 5px
	}
	#main {
		width: 55%;
		border: 2pt double #b1ae7a;
		border-radius: 5px;
		overflow-y: scroll;
		overflow-x: hidden;
	}
	#right-side-bar {
		width: 23%;
		border: 2pt double #b1ae7a;
		border-radius: 5px
	}
	.article-flyff {
		background-color: #694623;
		
	}
	.buy-btn {
		background-color: #842d0a;
	}
</style>
@endpush
<div style="height: 565px;" class="content bg-dark-flyff">
	<div class="row" style="height: 15%">
		<div id="header" class="col-12 text-center">
			<img class="mt-1" height="64px" src="{{site_logo()}}" alt="">
		</div>
	</div>
	
	<div class="row" style="height: 80%">
		<div id="left-side-bar" class="ml-3 mt-2">
			<div class="list-group categories" style="font-size: smaller;">
				@foreach($categories as $subCategory)
					<a href="{{ route('shop.categories.show', $subCategory) }}" class="list-group-item list-group-item-action py-1 @if($category->is($subCategory)) active @endif">{{ $subCategory->name }}</a>
				@endforeach
			</div>
			@auth
				<div class="mb-4">
					@if(use_site_money())
						<p class="text-center bg-warning mt-3 text-dark">{{ format_money(auth()->user()->money) }}</p>
                    @endif
                    <a href="{{ route('shop.cart.index') }}" class="btn btn-primary btn-block mt-1">{{ trans('shop::messages.cart.title') }}</a>
				</div>
			@endauth
			
			@if($goal)
				<div class="mb-4">
					<h4>{{ trans('shop::messages.month-goal') }}</h4>
			
					<div class="progress mb-1">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $goal }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $goal }}%"></div>
					</div>
			
					<p class="text-center">{{ trans_choice('shop::messages.month-goal-current', $goal) }}</p>
				</div>
			@endif
		</div>
		<div id="main" class="sc5 w-55 mt-2 ml-1">
			<h3 class="text-truncate">{{$category->name}}</h3>
			<div class="row">
				@forelse($category->packages as $package)
					<div class="col-6 border border-dark article-flyff">
						<h6 class="text-truncate">{{$package->name}}</h6>
						<form action="{{ route('shop.packages.buy', $package) }}" method="POST" class="form-inline">
							@csrf
							
							<div class="media w-100">
								@if($package->image !== null)
									<img onclick="showItem(this)" height="64" class="align-self-center mr-1 custom-cursor" src="{{ $package->imageUrl() }}" alt="{{ $package->name }}" data-package-url="{{ route('shop.packages.show', $package) }}">
								@endif
								<div class="media-body" style="font-size: small">
									
									<ul class="list-unstyled">
										<li class="w-100">
											@if($package->isDiscounted())
												<del class="small">{{ $package->getOriginalPrice() }}</del>
											@endif
											{{ shop_format_amount($package->getPrice()) }}
										</li>
										<li class="parent-quantity w-100">
											Quantité :
											@if($package->has_quantity)
											<div class="quantity">
												<input type="number" style="width: 50px" min="1" max="{{ $package->getMaxQuantity() }}" name="quantity" step="1" value="1">
											</div>
											@else
											1
											@endif
											
										</li>
									</ul>
								</div>
								
							</div>
							<button type="submit" class="btn btn-warning btn-block btn-sm mb-2">
								{{ trans('shop::messages.buy') }}
							</button>
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
		</div>
		<div id="right-side-bar" class="mt-2 mr-1">
			<h2>Détails</h2>
			<div class="dropdown-divider"></div>
			<div id="object-detail" class="bg-dark" style="height: 400px">

			</div>
		</div>
	</div>
	<div class="row mt-1">
		<button class="col-4">INFO</button>
		<button class="col-4">ACHATS</button>
		<button class="col-4">RECHARGER</button>
	</div>
</div>
@push('scripts')
<script>
	document.addEventListener('DOMContentLoaded', function(){
		jQuery('<div class="quantity-nav"><a class="quantity-button quantity-up">⇧</a><a class="quantity-button quantity-down">⇩</a></div>').insertAfter('.quantity input');
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
	});
	function showItem(el){
		$.get(el.dataset['packageUrl'], {
                    headers: {
                        'X-PJAX': 'true'
                    }
            }, function(response){
				console.log(response)
				$('#object-detail').html(response);
			})
		}
 </script>
@endpush
