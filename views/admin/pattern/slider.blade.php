<div class="form-row card mx-3">
    <div class="card-header d-flex justify-content-between">
        <h2 class="card-title">{{ trans('theme::lang.config.slider.name') }} @if(isset($slider)) {{ $loop->iteration }} @else 1 @endif </h2>
        <div class="input-group-append">
            <button class="btn btn-outline-danger command-remove" type="button"><i
                    class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="mb-0">
            <label for="imageSelect">{{ trans('theme::lang.config.image') }}</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <a class="btn btn-outline-success"
                       href="{{ route('admin.images.create') }}"
                       target="_blank" rel="noopener noreferrer"><i
                            class="fas fa-upload"></i></a>
                </div>
                <select class="custom-select"
                        id="imageSelect-@if(isset($slider)) {{ $loop->iteration }} @else 1 @endif"
                        name="sliders[{index}][url]"
                        data-image-preview-select="filePreview-@if(isset($slider)) {{ $loop->iteration }} @else 1 @endif">
                    <option value="">none</option>
                    @foreach(\Azuriom\Models\Image::all() as $image)
                        <option value="{{ $image->file }}"
                                @if(isset($slider['url']) && $slider['url'] === $image->file) selected @endif>{{ $image->name }}</option>
                    @endforeach
                </select>
                <div class="mt-3 w-100">
                    <img src="@if(isset($slider['url'])) {{ image_url($slider['url']) }} @endif"
                         alt="@if(isset($slider['title'])) {{ $slider['title'] }} @endif"
                         class="card-img rounded img-preview-sm @if(!isset($slider['url']))d-none @endif"
                         id="filePreview-@if(isset($slider)) {{ $loop->iteration }} @else 1 @endif"
                         style="object-fit: contain">
                </div>
            </div>
        </div>
        <div class="mb-0">
            <label>{{ trans('theme::lang.config.title') }}</label>
            <input type="text" class="form-control"
                   name="sliders[{index}][title]"
                   value="@if(isset($slider['title'])) {{ $slider['title'] }} @endif">
        </div>
        <div class="mb-0">
            <label>{{ trans('theme::lang.config.description') }}</label>
            <input type="text" class="form-control"
                   name="sliders[{index}][description]"
                   value="@if(isset($slider['description'])) {{ $slider['description'] }} @endif">
        </div>
    </div>
</div>
