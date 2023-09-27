@extends("layouts.index")
@section("title", "Store Details")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.stores.index") }}">Stores</a>
    </li>
    <li class="breadcrumb-item active">{{ $store->name }}</li>
@endsection
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $store->name }}</h3>
                <div class="col-12">
                    <img src="{{ $store->image }}" class="product-image" alt="{{ $store->name }}">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $store->name }}</h3>
                <p>{{ $store->description }}</p>
                <hr>

                <div class="row">
                    <div class="col-4">
                        <h4>Created at</h4>
                        <div class="bg-info py-2 px-3 mt-4">
                            {{ $store->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>Updated at</h4>
                        <div class="bg-info py-2 px-3 mt-4">
                            {{ $store->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>Deleted at</h4>
                        <div class="bg-danger py-2 px-3 mt-4">
                            {{ $store->deleted_at ? $store->deleted_at->diffForHumans() : "Null" }}
                        </div>
                    </div>
                </div>
                <div class="bg-{{ $store->active ? "success" : "danger" }} py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Status: {{ $store->active ? "Active" : "Inactive" }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
