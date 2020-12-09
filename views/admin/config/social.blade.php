<div class="card-header">
    <h6 class="m-0 font-weight-bold text-primary">{{ trans('theme::lang.config.social.name') }}</h6>
</div>
<div class="card-body">
    <div class="card-text mb-2">
        {{ trans('theme::lang.config.fontawesome') }}
        <a href="https://fontawesome.com/icons?d=gallery" title="fontawesome" target="_blank">fontawesome</a>
    </div>
    <div id="links">
        @foreach(theme_config('footer_links') ?? [] as $link)
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="footer_links[{index}][icon]"
                           placeholder="{{ trans('theme::lang.config.icon') }}"
                           value="{{ $link['icon'] }}">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="footer_links[{index}][name]"
                           placeholder="{{ trans('theme::lang.config.name') }}"
                           value="{{ $link['name'] }}">
                </div>

                <div class="form-group col-md-4">
                    <div class="input-group">
                        <input type="url" class="form-control"
                               name="footer_links[{index}][value]"
                               placeholder="{{ trans('theme::lang.config.link') }}"
                               value="{{ $link['value'] }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-danger link-remove" type="button">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mb-2">
        <button type="button" id="addLinkButton" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
        </button>
    </div>
</div>
