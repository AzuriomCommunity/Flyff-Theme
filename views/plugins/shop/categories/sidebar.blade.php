<div class="row">
    <div class="col-xl-12 col-md-6 mb-5" data-aos="fade-right">
        @auth

            <h4>Compte</h4>
            <div class="mb-4">
                @if(use_site_money())
                    <div class="shops--cash text-white font-weight-bold py-2 mb-3"><i class="fas fa-coins"></i>
                        {{ format_money(auth()->user()->money) }}</div>
                @endif

                <div class="shops--account">
                    @if( use_site_money() )
                        <a href="{{ route('shop.offers.select') }}"
                           class="btn btn-primary btn-grad mb-3"><i
                                class="far fa-credit-card"></i>{{ trans('shop::messages.cart.credit') }}</a>
                    @endif
                    <a href="{{ route('shop.cart.index') }}"
                       class="btn btn-primary btn-grad"><i
                            class="fas fa-shopping-basket"></i>{{ trans('shop::messages.cart.title') }}</a>
                </div>
            </div>
        @else
            <a class="btn btn-primary btn-grad" href="{{ route('home') }}">Vous devez être connecté !</a>
        @endauth
    </div>

    <div class="col-xl-12 col-md-6 mt-xl-5 mt-0" data-aos="fade-right" data-aos-delay="100">
        <h4>Catégorie</h4>
        <div class="shops--list-group list-group">
            @foreach($categories as $subCategory)
                <li class="list-group-item @if($category->is($subCategory)) active @endif">
                    <a href="{{ route('shop.categories.show', $subCategory) }}">{{ $subCategory->name }}</a>
                </li>
            @endforeach
        </div>
    </div>
    @if(!session()->has('azuriom_is_game'))
        @if($goal !== false)
            <div class="col-xl-12 col-md-6 my-4">
                <h4>{{ trans('shop::messages.month-goal') }}</h4>

                <div class="progress mb-1">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                         aria-valuenow="{{ $goal }}" aria-valuemin="0" aria-valuemax="100"
                         style="width: {{ $goal }}%"></div>
                </div>

                <p class="text-center">{{ trans_choice('shop::messages.month-goal-current', $goal) }}</p>
            </div>

        @endif
    @endif
</div>
