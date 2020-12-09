<div class="card-header">
    <h6 class="m-0 font-weight-bold text-primary">{{ trans('theme::lang.config.footer.name') }}</h6>
</div>
<div class="card-body">
    <div class="form-group">
        <label for="footer_description">{{ trans('theme::lang.config.description') }}</label>
        <textarea type="text"
                  class="form-control @error('footer_description') is-invalid @enderror"
                  id="footer_description"
                  name="footer_description"
                  rows="6">{{ old('footer_description', config('theme.footer_description')) }}</textarea>

        @error('footer_description')
        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
    </div>
</div>
