<!-- resources/views/components/select-input.blade.php -->

@props([
    'name' => '',
    'label' => '',
    'options' => [],
    'selected' => null,
    'placeholder' => 'Select Country',
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
        <option value="" {{ is_null($selected) ? 'selected' : '' }} disabled>
            {{ $placeholder }}
        </option>
        @foreach($options as $key => $option)
            <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>
</div>
