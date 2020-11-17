@auth
    <div class="mb-1">
        <img class="mx-auto d-block" style="width:100px" src="{{ site_logo() }}" alt="logo">
        @if(use_site_money())
            <div class="text-center">{{ trans('messages.fields.money') }}: {{ format_money(auth()->user()->money) }}</div>
        @endif

        <div class="text-center">
            @if(use_site_money())
                <a href="{{ route('shop.offers.select') }}" class="btn btn-primary">{{ trans('shop::messages.cart.credit') }}</a>
            @endif
            <a href="{{ route('shop.cart.index') }}" class="btn btn-primary">{{ trans('shop::messages.cart.title') }}</a>
        </div>
    </div>
@endauth


<div class="list-group list-group-vertical-sm">
    @foreach($categories as $subCategory)
        <a href="{{ route('shop.categories.show', $subCategory) }}" class="list-group-item @if($category->is($subCategory)) active @endif">{{ $subCategory->name }}</a>
    @endforeach
</div>
@if(!session()->has('azuriom_is_game'))
    @if($goal !== false)
        <div class="mb-4">
            <h4>{{ trans('shop::messages.month-goal') }}</h4>

            <div class="progress mb-1">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $goal }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $goal }}%"></div>
            </div>

            <p class="text-center">{{ trans_choice('shop::messages.month-goal-current', $goal) }}</p>
        </div>
    @endif
@endif