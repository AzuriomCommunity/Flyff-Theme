@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container content" id="shops">
        <div class="row">
            <div class="col-xl-3">
                @include('shop::categories.sidebar')
            </div>
            <div class="shops--items col-xl-9 mt-xl-0 mt-5">
                <div class="row">
                    @php
                        $packages = $category->packages()->paginate(6);
                        $i= 0
                    @endphp
                    @forelse($packages as $package)
                        @php($i++)
                        <div class="col-lg-4 col-sm-6 mb-5" data-aos="fade-up" data-aos-delay="{{ 100 *  $i }}">
                            <form action="{{ route('shop.packages.buy', $package) }}" method="POST">
                                @csrf
                                <div class="card">
                                    <h5 class="text-center mb-3 px-2 py-3">{{ $package->name }}</h5>
                                    @if($package->image !== null)
                                        <img class="card-img-top img-fluid w-100" src="{{ $package->imageUrl() }}"
                                             alt="{{ $package->name }}"
                                             data-package-url="{{ route('shop.packages.show', $package) }}">
                                    @endif
                                    <div class="card-body">
                                        <div class="mb-3">
                                        <span class="font-weight-bold w-100 d-block mb-2">
                                            <i class="fas fa-coins"></i>{{ shop_format_amount($package->getPrice()) }}
                                        </span>

                                            @if($package->isDiscounted())
                                                <span
                                                    class="font-weight-bold w-100 d-block mb-2">{{ $package->getOriginalPrice() }}</span>
                                            @endif
                                            <div class="shop--item-quantity mb-3">
                                                <span class="small">Quantité :</span>
                                                @if($package->has_quantity)
                                                    <div class="quantity input-group-sm mt-1">
                                                        <input class="form-control" type="number" min="1"
                                                               max="{{ $package->getMaxQuantity() }}" name="quantity"
                                                               step="1"
                                                               value="1">
                                                    </div>
                                            </div>
                                            @else
                                                1
                                            @endif
                                        </div>
                                        <div class="d-flex flex-nowrap justify-content-between">
                                            <button type="submit" class="btn btn-primary btn-grad">
                                                <i class="fas fa-shopping-cart pr-2"></i>Add to cart
                                            </button>

                                            <button type="button" class="btn btn-register" data-toggle="tooltip"
                                                    data-placement="top" title="{{ $package->short_description}}">
                                                <i class="fas fa-info pr-0"></i>
                                            </button>
                                        </div>

                                    </div>
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
    </div>
    <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel"
         aria-hidden="true"></div>
@endsection

@push('footer-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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

        function showItem(el) {
            $.get(el.dataset['packageUrl'], {
                headers: {
                    'X-PJAX': 'true'
                }
            }, function (response) {
                console.log(response)
                $('#object-detail').html(response);
            })
        }
    </script>
@endpush
