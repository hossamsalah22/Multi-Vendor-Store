@props([
    'value' => '',
    'class' => '',
])
<div class="form-group {{ $class }}">
    <button type="submit" class="btn btn-primary btn-block">{{ __($value) }}</button>
</div>
