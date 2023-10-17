@props([
    'value',
    'name',
    'checked' => false,
])
<div class="col-4">
    <label class="form-check form-check-lg form-check-custom form-check-solid fs-7 text-muted">
        <input name="permissions[{{ $value }}]" value="{{ $value }}" {{ $checked ? 'checked' : '' }}
        id="{{ $value }}" class="form-check-input h-15px w-15px" type="checkbox">
        <span for="{{ $value }}" class="form-check-label">{{ __($name) }}</span>
    </label>
</div>

