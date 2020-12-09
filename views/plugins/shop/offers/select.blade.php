@extends('layouts.app')

@section('title', trans('shop::messages.offers.title-select'))

@push('footer-scripts')
    <script>
        document.querySelectorAll('.payment-method').forEach(function (el) {
            el.addEventListener('click', function (ev) {
                ev.preventDefault();

                const form = document.getElementById('submitForm');
                form.action = el.href;
                form.submit();
            });
        });
    </script>
@endpush

@section('content')
    <div class="container content" id="plugin--shop">
        <h1>{{ trans('shop::messages.offers.title-select') }}</h1>

        <div class="row">
            <div class="col-md-12">
                @forelse($offers as $offer)
                    <div class="list-group">
                        <li class="list-group-item">
                            <a href="{{ route('shop.offers.pay', [$offer->id, $gateway->type]) }}"
                               class="payment-method">
                                <div class="card-body text-center d-flex flex-wrap justify-content-between">
                                    <div class="float-left logo">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1"
                                             x="0px" y="0px" viewBox="0 0 469.351 469.351"
                                             style="enable-background:new 0 0 469.351 469.351;" xml:space="preserve">
<path style="fill:#03A9F4;"
      d="M356.626,85.086c-10.332-9.837-25.314-13.036-38.763-8.277c-3.803,1.271-6.573,4.568-7.168,8.533  l-2.987,20.523c-4.529,30.998-31.052,54.019-62.379,54.144h-42.667c-4.896,0.001-9.162,3.335-10.347,8.085l-32,128  c-1.426,5.716,2.052,11.505,7.768,12.931c0.843,0.21,1.709,0.317,2.578,0.317h53.333c4.896-0.001,9.162-3.335,10.347-8.085  l19.307-77.248h41.6c31.934,0.106,59.792-21.66,67.413-52.672l7.872-31.552C376.075,120.377,370.763,99.49,356.626,85.086z"/>
                                            <g>
                                                <path style="fill:#283593;"
                                                      d="M10.664,437.342C4.773,437.341-0.002,432.564,0,426.673c0-0.869,0.107-1.735,0.317-2.578   l10.667-42.453v-0.448l10.667-42.432c1.185-4.75,5.451-8.084,10.347-8.085h27.136c14.728-0.003,26.669,11.933,26.673,26.661   c0,2.181-0.267,4.354-0.795,6.47l-2.667,10.667c-2.967,11.875-13.637,20.205-25.877,20.203H29.672l-8.64,34.581   C19.845,434.015,15.567,437.351,10.664,437.342z M35.005,373.342h21.461c2.447-0.007,4.575-1.678,5.163-4.053l2.667-10.667   c0.731-2.841-0.981-5.737-3.822-6.467c-0.438-0.113-0.888-0.169-1.341-0.167H40.338L35.005,373.342z"/>
                                                <path style="fill:#283593;"
                                                      d="M124.733,437.342h-15.189c-16.33,0.004-29.571-13.231-29.575-29.561   c-0.001-2.419,0.296-4.829,0.882-7.175l0,0l1.408-5.675c3.157-12.736,14.612-21.662,27.733-21.611h15.189   c16.33,0.028,29.545,13.289,29.517,29.619c-0.004,2.407-0.302,4.804-0.887,7.138l-1.408,5.675   C149.243,428.457,137.824,437.366,124.733,437.342z M101.565,405.79c-1.096,4.414,1.594,8.88,6.008,9.976   c0.645,0.16,1.306,0.241,1.971,0.243h15.189c3.289,0.009,6.159-2.227,6.955-5.419l1.408-5.675c1.096-4.414-1.594-8.88-6.008-9.976   c-0.645-0.16-1.306-0.241-1.971-0.243h-15.189c-3.289-0.009-6.159,2.227-6.955,5.419L101.565,405.79z"/>
                                                <path style="fill:#283593;"
                                                      d="M138.664,437.342c-5.891-0.002-10.665-4.779-10.664-10.67c0-0.869,0.107-1.735,0.317-2.578   l10.667-42.667c1.426-5.72,7.218-9.202,12.939-7.776c5.72,1.426,9.202,7.218,7.776,12.939l-10.667,42.667   C147.845,434.015,143.567,437.351,138.664,437.342z"/>
                                            </g>
                                            <g>
                                                <path style="fill:#03A9F4;"
                                                      d="M266.664,437.342c-5.891-0.002-10.665-4.779-10.664-10.67c0-0.869,0.107-1.735,0.317-2.578   l10.667-42.453v-0.448l10.667-42.432c1.185-4.75,5.451-8.084,10.347-8.085h27.136c14.728-0.003,26.669,11.933,26.673,26.661   c0,2.181-0.267,4.354-0.795,6.47l-2.667,10.667c-2.967,11.875-13.637,20.205-25.877,20.203h-26.795l-8.64,34.581   C275.845,434.015,271.567,437.351,266.664,437.342z M291.005,373.342h21.483c2.447-0.007,4.575-1.678,5.163-4.053l2.667-10.667   c0.73-2.841-0.981-5.737-3.822-6.467c-0.438-0.113-0.889-0.169-1.341-0.167h-18.816L291.005,373.342z"/>
                                                <path style="fill:#03A9F4;"
                                                      d="M380.733,437.342h-15.189c-16.33,0.004-29.571-13.231-29.575-29.561   c-0.001-2.419,0.296-4.829,0.882-7.175l0,0l1.408-5.675c3.157-12.736,14.612-21.662,27.733-21.611h15.189   c16.33-0.004,29.571,13.231,29.575,29.561c0.001,2.419-0.296,4.829-0.882,7.175l-1.408,5.675   C405.309,428.467,393.854,437.393,380.733,437.342z M357.565,405.79c-1.096,4.414,1.594,8.88,6.008,9.976   c0.645,0.16,1.306,0.241,1.971,0.243h15.189c3.289,0.009,6.159-2.227,6.955-5.419l1.408-5.675c1.096-4.414-1.594-8.88-6.008-9.976   c-0.645-0.16-1.306-0.241-1.971-0.243h-15.189c-3.289-0.009-6.159,2.227-6.955,5.419L357.565,405.79z"/>
                                                <path style="fill:#03A9F4;"
                                                      d="M394.664,437.342c-5.891-0.002-10.665-4.779-10.664-10.67c0-0.869,0.107-1.735,0.317-2.578   l10.667-42.667c1.426-5.72,7.218-9.202,12.939-7.776c5.72,1.426,9.202,7.218,7.776,12.939l0,0l-10.667,42.667   C403.845,434.015,399.567,437.351,394.664,437.342z"/>
                                            </g>
                                            <g>
                                                <path style="fill:#283593;"
                                                      d="M202.664,426.676c-3.568-0.002-6.898-1.787-8.875-4.757l-21.333-32   c-3.27-4.901-1.947-11.525,2.955-14.795s11.525-1.947,14.795,2.955l21.333,32c3.275,4.897,1.961,11.521-2.935,14.797   C206.846,426.051,204.778,426.677,202.664,426.676z"/>
                                                <path style="fill:#283593;"
                                                      d="M181.33,458.676c-5.891-0.002-10.665-4.78-10.663-10.671c0.001-2.493,0.875-4.907,2.471-6.823   l53.333-64c3.776-4.524,10.505-5.131,15.029-1.355c4.524,3.776,5.131,10.505,1.355,15.029l0,0l-53.333,64   C187.493,457.281,184.492,458.68,181.33,458.676z"/>
                                            </g>
                                            <path style="fill:#03A9F4;"
                                                  d="M437.33,437.342c-5.891-0.002-10.665-4.779-10.664-10.67c0-0.869,0.107-1.735,0.317-2.578  l21.333-85.333c1.426-5.72,7.218-9.202,12.939-7.776c5.72,1.426,9.202,7.218,7.776,12.939l0,0l-21.333,85.333  C446.512,434.015,442.234,437.351,437.33,437.342z"/>
                                            <path style="fill:#283593;"
                                                  d="M321.405,29.129c-10.249-11.739-25.077-18.468-40.661-18.453H159.997  c-5.159,0-9.578,3.692-10.496,8.768L106.834,254.11c-1.049,5.797,2.801,11.346,8.598,12.395c0.626,0.113,1.262,0.17,1.898,0.17h64  c4.896-0.001,9.162-3.335,10.347-8.085l19.328-77.248h34.325c41.958-0.165,77.478-31.012,83.52-72.533l5.333-36.459l0,0  C336.382,56.773,331.721,41.007,321.405,29.129z"/>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
</svg>
                                    </div>
                                    <h3 class="name">{{ $offer->name }}</h3>
                                    <h4 class="price">{{ $offer->price }} {{ currency_display() }}</h4>
                                </div>
                            </a>

                        </li>
                    </div>

                @empty
                    <div class="col">
                        <div class="alert alert-warning" role="alert">
                            {{ trans('shop::messages.offers.empty') }}
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <form method="POST" id="submitForm">
        @csrf
    </form>
@endsection