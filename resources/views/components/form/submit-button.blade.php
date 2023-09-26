@props([
    'value' => '',
    'class' => '',
])
<div class="form-group {{ $class }}">
    <button type="submit" class="btn btn-primary btn-block">{{ $value }}</button>
</div>
