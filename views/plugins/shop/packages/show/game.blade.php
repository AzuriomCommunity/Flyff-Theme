
        <div class="itemDetail">
            <ul>
                <li class="first">
                    <dd>
                        <div style="width: 58px; height: 48px; display:table-cell; vertical-align: middle; text-align: center;">
                            <img style="width: 58px; height: 48px" onclick="showItem(this)" src="{{ $package->imageUrl() }}" alt="{{ $package->name }}" data-package-url="{{ route('shop.packages.show', $package) }}">
                        </div>
                    </dd>
                    <dd class="itemInfo">
                        <span>@if($package->isDiscounted())
                            <del class="small">{{ $package->getOriginalPrice() }}</del>
                        @endif
                        {{ shop_format_amount($package->getPrice()) }}<br>
                    </dd>
                    <dl></dl>
                </li>
                <li>
                    <div class="detailText">
                        <p class="text-wrap" style="overflow-y: scroll; height:265px;color: #c1bd8e;">
                            {!! $package->short_description !!}
                        </p>
                    </div>
                    <dl></dl>
                </li>
                <li>
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
        <button type="submit" class="btn btn-primary btn-block">
            {{ trans('shop::messages.buy') }}
        </button>
    </form>
@endif
                </li>
            </ul>
        </div>
