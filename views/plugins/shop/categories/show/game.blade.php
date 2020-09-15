<div class="content" style="max-width: 790px;max-height: 569px;">
	<div class="row">
		<div class="col-3">

			<div class="list-group ml-3 mt-3">
				@foreach($categories as $subCategory)
					<a href="{{ route('shop.categories.show', $subCategory) }}" class="list-group-item @if($category->is($subCategory)) active @endif">{{ $subCategory->name }}</a>
				@endforeach
			</div>
			
			@auth
				<div class="mb-4">
					@if(use_site_money())
						<p class="text-center">{{ trans('messages.fields.money') }}: {{ format_money(auth()->user()->money) }}</p>
                    @endif
                    <a href="{{ route('shop.cart.index') }}" class="btn btn-primary btn-block ml-2 mt-1">{{ trans('shop::messages.cart.title') }}</a>
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
		<div class="col-9" style="background-color: grey; height:520px">
				@forelse($category->packages as $package)

					<div class="media my-4">
						@if($package->image !== null)
							<a href="#" data-package-url="{{ route('shop.packages.show', $package) }}">
								<img height="64px" class="align-self-center mr-3" src="{{ $package->imageUrl() }}" alt="{{ $package->name }}">
							</a>
						@endif
						<div class="media-body text-break">
							<h5 class="mt-0 mb-1">{{ $package->name }} 
								
								<h6>
									@if($package->isDiscounted())
										<del class="small">{{ $package->getOriginalPrice() }}</del>
									@endif
                                    {{ shop_format_amount($package->getPrice()) }}
                                    
								</h6>
								
                            </h5>
                            <form action="{{ route('shop.packages.buy', $package) }}" method="POST" class="form-inline">
                                @csrf
                            
                                @if($package->has_quantity)
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">{{ trans('shop::messages.fields.quantity') }}</span>
                                        </div>
                                        <input type="number" min="0" max="{{ $package->getMaxQuantity() }}" size="5" class="form-control" name="quantity" id="quantity" value="1">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">
                                                {{ trans('shop::messages.buy') }}
                                            </button>
                                         </div>
                                    </div>
                                @else
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('shop::messages.buy') }}
                                    </button>
                                @endif

                            </form>
						</div>
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
</div>