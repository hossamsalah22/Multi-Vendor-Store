<!-- Start Hero Slider -->
<div class="hero-slider">
    @foreach($sliders as $slider)
        <!-- Start Single Slider -->
        <div class="single-slider"
             style="background-image: url({{ $slider->image }});">
            <div class="content">
                <h2>{{ $slider->title }}</h2>
                <p>{{ $slider->description }}</p>
                <h3><span>Now Only </span> {{ Currency::format($slider->price) }}</h3>
                <div class="button">
                    <a href="{{ route('website.products.index') }}" class="btn">Shop Now</a>
                </div>
            </div>
        </div>
        <!-- End Single Slider -->
    @endforeach
</div>
<!-- End Hero Slider -->
