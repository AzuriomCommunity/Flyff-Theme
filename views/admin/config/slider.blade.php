<div class=" card shadow mb-4">
    <div class="card-header">
        <h6 type="button" class="btn btn-link m-0 font-weight-bold text-primary">
            {{ trans('theme::lang.config.slider.name') }}
        </h6>


        <button type="button" id="addCommandButton" class="btn btn-sm btn-success">
            <i class="fas fa-plus"></i> {{ trans('messages.actions.add') }}
        </button>
    </div>
    <div class="card-body">
        <div id="sliders" class="row">
            @forelse( config('theme.sliders') ?? [] as $slider )

                <div class="slider col-lg-4 col-md-6 my-3">
                    @include('admin.pattern.slider')
                </div>
            @empty
                <div class="slider col-lg-4 col-md-6 my-3">
                    @include('admin.pattern.slider')
                </div>
            @endforelse
        </div>
    </div>
</div>
