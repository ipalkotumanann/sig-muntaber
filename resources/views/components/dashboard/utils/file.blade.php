<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ $label }}</label>

    <div class="col-sm-12 col-md-7">
        <div class="custom-file">
            <input
                type="file"
                accept="{{ $accept }}"
                name="{{ $name }}"
                {{ $required ? 'required' : '' }}
                class="custom-file-input"
                id="{{ $id }}">

            <label class="custom-file-label" id="label-{{$id}}" for="{{ $id }}">
                {{ $value ?? 'Pilih Gambar' }}
            </label>
        </div>

        @if ($helpText)
            <small id="passwordHelpBlock" class="form-text text-muted">
                {{ $helpText }}
            </small>
        @endif
    </div>
</div>
