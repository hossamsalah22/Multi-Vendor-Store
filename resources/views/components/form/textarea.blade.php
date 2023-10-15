<!-- resources/views/components/textarea-input.blade.php -->

@props([
    'name' => '',
    'label' => '',
    'value' => '',
    'attributes' => [],
    'class' => '',
])

<div class="form-group {{ $class }}">
    <label for="{{ $name }}">{{ __($label) }}:</label>
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-control"
        placeholder="{{ __($label) }}"
        {!! $attributes !!}>{{ old($name, $value) }}</textarea>
</div>
