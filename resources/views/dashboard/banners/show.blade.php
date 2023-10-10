@extends("layouts.index")
@section("title", "Banner Details")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.banners.index") }}">Banners</a>
    </li>
    <li class="breadcrumb-item active">{{ $banner->title }}</li>
@endsection
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $banner->title }}</h3>
                <div class="col-12">
                    <img src="{{ $banner->image }}" class="product-image" alt="{{ $banner->title }}">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $banner->title }}</h3>
                <p>{{ $banner->description }}</p>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h4>Created at</h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $banner->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>Updated at</h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $banner->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>Deleted at</h4>
                        <div class="bg-gradient-danger py-2 px-3 mt-4">
                            {{ $banner->deleted_at ? $banner->deleted_at->diffForHumans() : "Null" }}
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-{{ $banner->active ? "success" : "danger" }} py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Status: {{ $banner->active ? "Active" : "Inactive" }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
