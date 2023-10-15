<!-- resources/views/components/file-input.blade.php -->

@props([
    'name' => '',
    'label' => '',
    'value' => null,
    'class' => '',
])

<div class="form-group {{ $class }}">
    <label for="{{ $name }}">{{ __($label) }}:</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" name="{{ $name }}" id="{{ $name }}" class="custom-file-input" accept="image/*">
            <label class="custom-file-label" for="{{ $name }}">{{ __('Choose file') }}</label>
        </div>
    </div>
    @if($value)
        <div class="mt-2">
            <img src="{{ $value }}" alt="{{ $label }}" style="max-width: 100%; max-height: 200px;">
        </div>
    @endif
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init();
        });
    </script>
@endpush
