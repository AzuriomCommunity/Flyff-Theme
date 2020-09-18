{{ $package->name }}
<p style="overflow-y: scroll; height:250px">
    {{ $package->short_description }}
</p>

@if($package->isDiscounted())
    <del class="small">{{ $package->getOriginalPrice() }}</del>
@endif
{{ shop_format_amount($package->getPrice()) }}



@if($package->isInCart())
    <form action="{{ route('shop.cart.remove', $package) }}" method="POST" class="form-inline">
        @csrf
        <button type="submit" class="btn btn-primary btn-block">
            {{ trans('shop::messages.actions.remove') }}
        </button>
    </form>
@elseif($package->getMaxQuantity() < 1)
    {{ trans('shop::messages.packages.limit') }}
@elseif(! $package->hasBoughtRequirements())
    {{ trans('shop::messages.packages.requirements') }}
@else
    <form action="{{ route('shop.packages.buy', $package) }}" method="POST" class="form-inline">
        @csrf
        @if($package->has_quantity)
            <div class="form-group">
                <label for="quantity">{{ trans('shop::messages.fields.quantity') }}</label>
            </div>
            <div class="form-group mx-3">
                <input type="number" min="0" max="{{ $package->getMaxQuantity() }}" size="5" class="form-control" name="quantity" id="quantity" value="1">
            </div>
        @endif
        <button type="submit" class="btn btn-primary btn-block">
            {{ trans('shop::messages.buy') }}
        </button>
    </form>
@endif
