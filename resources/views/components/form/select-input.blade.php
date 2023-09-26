<!-- resources/views/components/select-input.blade.php -->

@props([
    'name' => '',
    'label' => '',
    'options' => [],
    'selected' => null,
    'placeholder' => 'Select an option',
    'attributes' => [],
    'class' => '',
])

<div class="form-group {{ $class }}">
    <label for="{{ $name }}">{{ $label }}:</label>
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-control select2"
        style="width: 100%;"
        {!! $attributes !!}
    >
        <option value="" disabled {{ is_null($selected) ? 'selected' : '' }}>
            {{ $placeholder }}
        </option>
        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ $selected == $option->id ? 'selected' : '' }}>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
</div>
