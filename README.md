# Flyff-Theme

This theme is an example on how to handle some basic functions for the interface

Feel free to use it as a starting point

# Where the user select his characters to send items to?

## Shop plugin
If you were to create your own theme, or modifying one that you bought, look for the file : **`ressources/themes/MY_SUPER_THEME/views/plugins/shop/cart/index.blade.php`** 

(if it doesn't exists you can copy the original file from `plugins/shop/cart/index.blade.php` and place it here **`ressources/themes/MY_SUPER_THEME/views/plugins/shop/cart/index.blade.php`** 

Then within the file, look for `<form action="{{ route('shop.cart.update') }}" method="POST">` and paste under the `</form>`

```blade
<div class="row mb-4">
    @php
        $characters = flyff_user(auth()->user())->characters;
    @endphp

    <form action="{{ route('flyff.cart.update_character') }}" method="POST" class="form-inline">
        @csrf
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Choose character : </label>
        <select name="character" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
            @foreach ($characters as $character)
                <option @if((int)$character->m_idPlayer === session('m_idPlayer') ) selected
                        @endif value="{{$character->m_idPlayer}}_{{$character->serverindex}}">{{$character->m_szName}}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-warning btn-sm">
            {{ trans('messages.actions.update') }}
        </button>
    </form>
</div>
```

## Vote plugin
If you were to create your own theme, or modifying one that you bought, look for the file : **`ressources/themes/MY_SUPER_THEME/views/plugins/vote/index.blade.php`** 

(if it doesn't exists you can copy the original file from `plugins/vote/index.blade.php` and place it here **`ressources/themes/MY_SUPER_THEME/views/plugins/vote/index.blade.php`**

Then within the file, look for **`<div id="vote-alert"></div>`** and replace everything under until you see :

**`<h2 class="mt-5 mb-2" data-aos="fade-up" data-aos-delay="500">{{ trans('vote::messages.sections.top') }}</h2>`**

with the snippet below

```blade
@guest
    <a href="/user/login">
        <div class="alert alert-warning">You need to login before you vote (click here)</div>
    </a>
@else
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let form = document.querySelector('#vote-choose-characater')
            form.addEventListener('submit', function (ev) {
                ev.preventDefault();

                const loaderIcon = form.querySelector('.load-spinner');

                if (loaderIcon) {
                    loaderIcon.classList.remove('d-none');
                }

                clearVoteAlert();

                axios.post("{{ route('flyff.cart.update_character') }}", {
                        'character': document.querySelector('#inlineFormCustomSelectPref').value
                    })
                    .then(function () {
                        toggleStep(2);
                    })
                    .catch(function (error) {
                        displayVoteAlert(error.response.data.message, 'danger');
                    })
                    .finally(function () {
                        if (loaderIcon) {
                            loaderIcon.classList.add('d-none');
                        }
                    });
            });
        })
    </script>
    <div class="vote vote-now text-center position-relative mb-4 px-3 py-5 border rounded" data-aos="fade-up">

        <div class="h-100" data-vote-step="1">
            @php
            $characters = flyff_user(auth()->user())->characters;
            @endphp

            <form id="vote-choose-characater" method="POST" class="form-inline">
                @csrf
                <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Choose character : </label>
                <select name="character" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                    @foreach ($characters as $character)
                    <option @if((int)$character->m_idPlayer === session('m_idPlayer') ) selected
                        @endif value="{{$character->m_idPlayer}}_{{$character->serverindex}}">{{$character->m_szName}}
                    </option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-warning btn-sm">
                    {{ trans('messages.actions.update') }}
                    <span class="d-none spinner-border spinner-border-sm load-spinner" role="status"></span>
                </button>
            </form>
        </div>

        <div class="h-100 d-none" data-vote-step="2">
            <div id="vote-spinner" class="d-none h-100">
                <div class="spinner-border text-white" role="status"></div>
            </div>

            @forelse($sites as $site)
            <a class="btn btn-primary btn-grad d-inline m-3" href="{{ $site->url }}" target="_blank"
                rel="noopener noreferrer" data-site-url="{{ route('vote.vote', $site) }}">{{ $site->name }}</a>
            @empty
            <div class="alert alert-warning" role="alert">{{ trans('vote::messages.no-site') }}</div>
            @endforelse
        </div>
        <div class="d-none" data-vote-step="3">
            <p id="vote-result"></p>
        </div>
    </div>
@endguest

```


