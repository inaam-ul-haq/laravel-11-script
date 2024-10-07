<div class="mt-3">
    @if ($label != null)
        <label for="{{ $id }}" class="form-label fs  fw-semibold">{{ $label }}</label>
    @endif

    <div class="form-check form-switch">
        <input class="form-check-input {{ $extraclasses }} @error($name) is-invalid @enderror" type="checkbox"
            value="{{ $value == '' ? old($name) : $value }}" name="{{ $name }}" id="{{ $id }}"
            {{ $required == null ? '' : 'required' }}>

        @if ($errors->has($name))
            <span for="{{ $id }}" class="text-danger">{{ $errors->first($name) }}</span>
        @endif
    </div>
</div>