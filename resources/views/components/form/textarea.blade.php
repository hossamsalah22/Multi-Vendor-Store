<!-- resources/views/components/textarea-input.blade.php -->

@props([
    'name' => '',
    'label' => '',
    'value' => '',
    'attributes' => [],
    'class' => '',
])

<div class="form-group {{ $class }}">
    <label for="{{ $name }}">{{ $label }}:</label>
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-control"
        placeholder="{{ $label }}"
        {!! $attributes !!}>{{ old($name, $value) }}</textarea>
</div>
