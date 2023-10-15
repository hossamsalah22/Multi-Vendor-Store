@props([
    'variable' => '',
    'label' => '',
    'route' => '',
    'icon' => '',
    'color' => 'bg-success'
])

<div class="col-lg-3 col-6">
    <div class="small-box {{ $color }}">
        <div class="inner">
            <h3>{{ $variable }}</h3>
            <p>{{ __("$label") }}</p>
        </div>
        <div class="icon">
            <i class="{{ $icon }}"></i>
        </div>
        <a href={{ $route }} class="small-box-footer">{{ __("More info") }} <i
                class="fas fa-arrow-circle-right"></i></a>
    </div>
</div>
