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
    <label for="{{ $name }}">{{ __($label) }}:</label>
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        class="form-control select2"
        style="width: 100%;"
        {!! $attributes !!}
    >
        <option value="" {{ is_null($selected) ? 'selected' : '' }}>
            {{ __($placeholder) }}
        </option>
        @foreach($options as $option)
            <option value="{{ $option->id }}" {{ $selected == $option->id ? 'selected' : '' }}>
                {{ $option->name }}
            </option>
        @endforeach
    </select>
</div>
