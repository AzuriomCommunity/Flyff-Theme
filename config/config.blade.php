@extends('admin.layouts.admin')

@section('title', 'Flyff Default config')
@include('admin.elements.editor')
@section('content')
    @push('styles')
        <style>
            #wrapper #content-wrapper {
                overflow-x: inherit;
            }
        </style>
    @endpush
    @push('footer-scripts')
        <script>
            document.querySelectorAll('[data-image-preview-select]').forEach(function (el) {
                imagePreviewSelect(el);
            });

            function imagePreviewSelect(el) {
                console.log(el)
                el.addEventListener('change', function () {
                    if (el.value) {
                        const reader = new FileReader();
                        const preview = document.getElementById(el.getAttribute('data-image-preview-select'));

                        preview.src = 'https://' + window.location.hostname + '/storage/img/' + el.value;
                        preview.classList.remove('d-none');
                        console.log(preview)

                        reader.onload = function (el) {
                            if (preview) {
                                preview.src = el.currentTarget.result;
                                preview.classList.remove('d-none');
                            }
                        };

                    }
                });
            }

            function addCommandListener(el) {
                let i = 1;
                el.addEventListener('click', function () {
                    const element = el.closest('.slider');
                    element.parentNode.removeChild(element);
                    document.getElementById('sliders').querySelectorAll('.slider').forEach(function (el) {
                        let count = i++
                        el.querySelector('.card-title').innerHTML = 'Slider ' + count;
                    })
                });
            }

            document.querySelectorAll('.command-remove').forEach(function (el) {
                addCommandListener(el);
            });

            document.getElementById('addCommandButton').addEventListener('click', function () {
                let i = 1;
                let input = `@include('admin.pattern.slider')`;

                const newElement = document.createElement('div');
                newElement.classList.add('slider', 'col-lg-4', 'col-md-6', 'my-3')
                newElement.innerHTML = input
                addCommandListener(newElement.querySelector('.command-remove'));

                document.getElementById('sliders').appendChild(newElement);
                document.getElementById('sliders').querySelectorAll('.slider').forEach(function (el) {
                    let count = i++
                    el.querySelector('.card-title').innerHTML = 'Slider ' + count;
                    el.querySelector('select').setAttribute('data-image-preview-select', 'filePreview-' + count)
                    el.querySelector('img').setAttribute('id', 'filePreview-' + count)
                    imagePreviewSelect(el.querySelector('select'))
                })

            });
            document.getElementById('configForm').addEventListener('submit', function () {
                let i = 0;

                document.getElementById('sliders').querySelectorAll('.form-row').forEach(function (el) {
                    el.querySelectorAll('input').forEach(function (input) {
                        input.name = input.name.replace('{index}', i.toString());
                    });
                    el.querySelectorAll('select').forEach(function (select) {
                        select.name = select.name.replace('{index}', i.toString());
                    });

                    i++;
                });

                document.getElementById('links').querySelectorAll('.form-row').forEach(function (el) {
                    el.querySelectorAll('input').forEach(function (input) {
                        input.name = input.name.replace('{index}', i.toString());
                    });

                    i++;
                });
            });
        </script>

        <script>
            function addLinkListener(el) {
                el.addEventListener('click', function () {
                    const element = el.parentNode.parentNode.parentNode.parentNode;

                    element.parentNode.removeChild(element);
                });
            }

            document.querySelectorAll('.link-remove').forEach(function (el) {
                addLinkListener(el);
            });

            document.getElementById('addLinkButton').addEventListener('click', function () {
                let input = '<div class="form-row"><div class="form-group col-md-4">';
                input += '<input type="text" class="form-control" name="footer_links[{index}][icon]" placeholder="{{ trans('theme::lang.config.icon') }}"></div>';
                input += '<div class="form-group col-md-3"><div class="input-group">';
                input += '<input type="text" class="form-control" name="footer_links[{index}][name]" placeholder="{{ trans('theme::lang.config.name') }}"></div></div>';
                input += '<div class="form-group col-md-4"><div class="input-group">';
                input += '<input type="url" class="form-control" name="footer_links[{index}][value]" placeholder="{{ trans('theme::lang.config.link') }}">';
                input += '<div class="input-group-append"><button class="btn btn-outline-danger link-remove" type="button">';
                input += '<i class="fas fa-times"></i></button></div></div></div></div></div>';

                const newElement = document.createElement('div');
                newElement.innerHTML = input;

                addLinkListener(newElement.querySelector('.link-remove'));

                document.getElementById('links').appendChild(newElement);
            });

        </script>
    @endpush
    <div class="row">
        <div class="col-2">
            <div class="list-group sticky-top" style="top: 75px">
                <a class="list-group-item list-group-item-action active"
                   title="{{ trans('theme::lang.config.global.name') }}"
                   href="#list-{{ trans('theme::lang.config.global.id') }}"
                   data-toggle="list"
                   role="tab"
                   aria-controls="{{ trans('theme::lang.config.global.id') }}">
                    {{ trans('theme::lang.config.global.name') }}
                </a>

                <a class="list-group-item list-group-item-action"
                   title="{{ trans('theme::lang.config.slider.name') }}"
                   href="#list-{{ trans('theme::lang.config.slider.id') }}"
                   data-toggle="list"
                   role="tab"
                   aria-controls="{{ trans('theme::lang.config.slider.id') }}">
                    {{ trans('theme::lang.config.slider.name') }}
                </a>
                <a class="list-group-item list-group-item-action"
                   title="{{ trans('theme::lang.config.footer.name') }}"
                   href="#list-{{ trans('theme::lang.config.footer.id') }}"
                   data-toggle="list"
                   role="tab"
                   aria-controls="{{ trans('theme::lang.config.footer.id') }}">
                    {{ trans('theme::lang.config.footer.name') }}
                </a>
                <a class="list-group-item list-group-item-action"
                   title="{{ trans('theme::lang.config.social.name') }}"
                   href="#list-{{ trans('theme::lang.config.social.id') }}"
                   data-toggle="list"
                   role="tab"
                   aria-controls="{{ trans('theme::lang.config.social.id') }}">
                    {{ trans('theme::lang.config.social.name') }}
                </a>
            </div>
        </div>
        <div class="col-10">
            <form action="{{ route('admin.themes.config', $theme) }}" method="POST" id="configForm">
                @csrf

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade active show card shadow mb-4"
                         id="list-{{ trans('theme::lang.config.global.id') }}"
                         role="tabpanel" aria-labelledby="list-{{ trans('theme::lang.config.global.id') }}-list">
                        @include('admin.config.global')
                    </div>

                    <div class="tab-pane fade card shadow mb-4" id="list-{{ trans('theme::lang.config.footer.id') }}"
                         role="tabpanel" aria-labelledby="list-{{ trans('theme::lang.config.footer.id') }}-list">
                        @include('admin.config.footer')

                    </div>

                    <div class="tab-pane fade card shadow mb-4" id="list-{{ trans('theme::lang.config.social.id') }}"
                         role="tabpanel" aria-labelledby="list-{{ trans('theme::lang.config.social.id') }}-list">
                        @include('admin.config.social')

                    </div>
                    <div class="tab-pane fade" id="list-{{ trans('theme::lang.config.slider.id') }}" role="tabpanel"
                         aria-labelledby="list-{{ trans('theme::lang.config.slider.id') }}-list">
                        @include('admin.config.slider')

                    </div>
                </div>
                <button type="submit" class="btn btn-primary"><i
                        class="fas fa-save"></i> {{ trans('messages.actions.save') }}</button>
            </form>
        </div>
    </div>
@endsection
