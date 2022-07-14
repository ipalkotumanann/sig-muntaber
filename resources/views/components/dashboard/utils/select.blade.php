<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ $label }}</label>

    <div class="col-sm-12 col-md-7">
        <select name="{{ $name }}" id="{{ $id ?? rand(1, 10) }}" class="{{ $classes }}">
            @foreach ($options as $option)
                <option
                    {{ ($selected !== null) ? ($selected === $option[$props['value']]) ? 'selected' : '' : '' }}
                    value="{{ $option[$props['value']] }}">
                    {{ $option[$props['label']] }}
                </option>
            @endforeach
        </select>
    </div>
</div>
