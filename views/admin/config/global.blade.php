<div class="card-header">
    <h6 class="m-0 font-weight-bold text-primary">{{ trans('theme::lang.config.global.name') }}</h6>
</div>
<div class="card-body">
    <div class="form-group">
        <label for="discordInput">{{ trans('theme::lang.config.discord') }}</label>
        <input type="text" class="form-control @error('discord-id') is-invalid @enderror"
               id="discordInput"
               name="discord-id" value="{{ old('discord-id', config('theme.discord-id')) }}">

        @error('discord-id')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="articleComment"
                   name="articleComment"
                   @if(config('theme.articleComment')) checked @endif>
            <label class="custom-control-label" for="articleComment">
                {{ trans('theme::lang.config.global.article.comment') }}
            </label>
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="articleLike"
                   name="articleLike"
                   @if(config('theme.articleLike')) checked @endif>
            <label class="custom-control-label" for="articleLike">
                {{ trans('theme::lang.config.global.article.like') }}
            </label>
        </div>
    </div>



    <div class="card shadow mb-4" id="accordion-cgu">
        <div class="card-header" id="headingOneCgu">
            <h6 class="m-0 font-weight-bold text-primary" style="cursor: pointer"
                data-toggle="collapse"
                data-target="#collapseOneCgu" aria-expanded="true"
                aria-controls="collapseOneCgu">
                {{ trans('theme::lang.config.cgu.name') }}<i
                    class="fas fa-chevron-down pl-1"></i></h6>
        </div>

        <div id="collapseOneCgu" class="collapse" aria-labelledby="headingOneCgu"
             data-parent="#accordion-cgu">
            <div class="card-body">
                <div class="form-group">
                                            <span class="d-block mb-1 font-weight-bold mb-2"> <span class="text-danger">
                                                 {!! trans('theme::lang.config.cgu.warning') !!}
                                            </span>
                                            <label for="download_link">{{ trans('theme::lang.config.cgu.input_link') }}</label>
                                            <input type="text"
                                                   class="form-control @error('cgu_link') is-invalid @enderror"
                                                   id="cgu_link"
                                                   name="cgu_link"
                                                   value="{{ old('cgu_link', config('theme.cgu_link')) }}" placeholder="exemple: cgu">

                                            @error('cgu_link')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="textArea">{{ trans('theme::lang.config.description') }}</label>
                    <textarea
                        class="form-control html-editor @error('cgu') is-invalid @enderror"
                        id="textArea" name="cgu"
                        rows="5">{{ old('cgu', config('theme.cgu')) }}</textarea>

                    @error('cgu')
                    <span class="invalid-feedback"
                          role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4" id="accordion-cgv">
        <div class="card-header" id="headingOneCgv">
            <h6 class="m-0 font-weight-bold text-primary" style="cursor: pointer"
                data-toggle="collapse"
                data-target="#collapseOneCgv" aria-expanded="true"
                aria-controls="collapseOneCgv">
                {{ trans('theme::lang.config.cgv.name') }}<i
                    class="fas fa-chevron-down pl-1"></i></h6>
        </div>

        <div id="collapseOneCgv" class="collapse" aria-labelledby="headingOneCgv"
             data-parent="#accordion-cgv">
            <div class="card-body">
                <div class="form-group">
                                            <span class="d-block mb-1 font-weight-bold mb-2"> <span class="text-danger">
                                                    {!! trans('theme::lang.config.cgv.warning') !!}
                                            </span>
                                            <label for="cgv_link">{{ trans('theme::lang.config.cgv.input_link') }}</label>
                                            <input type="text"
                                                   class="form-control @error('cgv_link') is-invalid @enderror"
                                                   id="cgv_link"
                                                   name="cgv_link"
                                                   value="{{ old('cgv_link', config('theme.cgv_link')) }}" placeholder="exemple: cgv">

                                            @error('cgv_link')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="textArea">{{ trans('theme::lang.config.description') }}</label>
                    <textarea
                        class="form-control html-editor @error('content') is-invalid @enderror"
                        id="textArea" name="cgv"
                        rows="5">{{ old('cgv', config('theme.cgv')) }}</textarea>

                    @error('content')
                    <span class="invalid-feedback"
                          role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4" id="accordion-download">
        <div class="card-header" id="headingOneDownload">
            <h6 class="m-0 font-weight-bold text-primary" style="cursor: pointer"
                data-toggle="collapse"
                data-target="#collapseOneDownload" aria-expanded="true"
                aria-controls="collapseOneDownload">
                {{ trans('theme::lang.config.download.name') }}<i
                    class="fas fa-chevron-down pl-1"></i></h6>
        </div>

        <div id="collapseOneDownload" class="collapse" aria-labelledby="headingOneDownload"
             data-parent="#accordion-download">
            <div class="card-body">
                <div class="form-group">
                                            <span class="d-block mb-1 font-weight-bold mb-2"> <span class="text-danger">
                                                 {!! trans('theme::lang.config.download.warning') !!}
                                            </span>
                                            <label for="download_link">{{ trans('theme::lang.config.download.input_link') }}</label>
                                            <input type="text"
                                                   class="form-control @error('download_link') is-invalid @enderror"
                                                   id="download_link"
                                                   name="download_link"
                                                   value="{{ old('doawnlod_link', config('theme.download_link')) }}" placeholder="exemple: download">

                                            @error('download_link')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="textArea">{{ trans('theme::lang.config.description') }}</label>
                    <textarea
                        class="form-control html-editor @error('download') is-invalid @enderror"
                        id="textArea" name="download"
                        rows="5">{{ old('download', config('theme.download')) }}</textarea>

                    @error('download')
                    <span class="invalid-feedback"
                          role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
