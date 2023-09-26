@props([
    'name' => '',
    'label' => '',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'attributes' => [],
    'class' => '',
])

<div class="form-group {{ $class }}">
    <label for="{{ $name }}">{{ $label }}:</label>
    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        class="form-control"
        placeholder="{{ $placeholder }}"
        {!! $attributes !!}
    >
</div>
