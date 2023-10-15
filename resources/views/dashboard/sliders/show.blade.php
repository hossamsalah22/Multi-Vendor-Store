@extends("layouts.index")
@section("title")
    {{ __("Slider Details") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.sliders.index") }}">
            {{ __("Sliders") }}
        </a>
    </li>
    <li class="breadcrumb-item active">{{ $slider->title }}</li>
@endsection
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $slider->title }}</h3>
                <div class="col-12">
                    <img src="{{ $slider->image }}" class="product-image" alt="{{ $slider->name }}">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $slider->title }}</h3>
                <p>{{ $slider->description }}</p>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h4>
                            {{ __("Created At") }}
                        </h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $slider->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>
                            {{ __("Updated At") }}
                        </h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $slider->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>
                            {{ __("Deleted At") }}
                        </h4>
                        <div class="bg-gradient-danger py-2 px-3 mt-4">
                            {{ $slider->deleted_at ? $slider->deleted_at->diffForHumans() : __("Null") }}
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-{{ $slider->active ? "success" : "danger" }} py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        {{ __("Status") }}: {{ $slider->active ? __("Active") : __("Inactive") }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
