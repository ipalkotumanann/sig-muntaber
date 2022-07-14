<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">{{ $label }}</label>

    <div class="col-sm-12 col-md-7">
        @switch($type)
            @case('radio')
                @foreach ($options as $key => $option)
                    <div class="form-check mt-1">
                        <input
                            class="{{ $classes }}"
                            type="{{ $type }}"
                            name="{{ $name }}"
                            id="{{ $name.'-'.$key }}"
                            {{ isset($option['checked']) ? 'checked' : ($value ? ($value === $option['value']) ? 'checked' : '' : '') }}
                            {{ $required ? 'required' : '' }}
                            value="{{ $option['value'] }}">

                        <label class="form-check-label" for="{{ $name.'-'.$key }}">
                            {{ $option['label'] }}
                        </label>
                    </div>
                @endforeach
                @break
            @case('textarea')
                <textarea
                    class="{{ $classes }}"
                    name="{{ $name }}">{{ $value }}</textarea>
                @break
            @default
                <input
                    type="{{ $type }}"
                    id="{{ $id ?? Str::random(4) }}"
                    name="{{ $name }}"
                    value="{{ $value }}"
                    {{ $readonly ? 'readonly' : '' }}
                    {{ $required ? 'required' : '' }}
                    class="{{ $classes }}">
        @endswitch


        @if ($helpText)
            <small id="passwordHelpBlock" class="form-text text-muted">
                {{ $helpText }}
            </small>
        @endif
    </div>
</div>
