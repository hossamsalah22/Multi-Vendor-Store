@foreach($banners as $banner)
    <div class="col-lg-6 col-md-6 col-12">
        <div class="single-banner"
             style="background-image:url('{{ $banner->image }}')">
            <div class="content">
                <h2>{{ $banner->title }}</h2>
                <p>{{ $banner->description }}</p>
                <div class="button">
                    <a href="{{ route('website.products.index') }}" class="btn">{{ __('View Details') }}</a>
                </div>
            </div>
        </div>
    </div>
@endforeach
