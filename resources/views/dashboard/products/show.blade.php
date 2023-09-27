@extends("layouts.index")
@section("title", "Product Details")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.stores.index") }}">Products</a>
    </li>
    <li class="breadcrumb-item active">{{ $product->name }}</li>
@endsection
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $product->name }}</h3>
                <div class="col-12">
                    <img src="{{ $product->image }}" class="product-image" alt="{{ $product->name }}">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $product->name }}</h3>
                <p>{{ $product->description }}</p>
                <hr>
                <h4 class="col-12">
                    Quantity: {{ $product->quantity }} {{ $product->quantity == 1 ? "Piece" : "Pieces" }}</h4>
                <hr>
                <div class="row">

                    <div class="col-6">
                        <h4>Category</h4>
                        <a href="{{ route('dashboard.categories.show', $product->category) }}"
                           class="btn btn-default">{{ $product->category->name }}</a>
                    </div>

                    <div class="col-6">
                        <h4>Store</h4>
                        <a href="{{ route('dashboard.stores.show', $product->store) }}"
                           class="btn btn-default">{{ $product->store->name }}</a>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h4>Created at</h4>
                        <div class="bg-gray py-2 px-3 mt-4">
                            {{ $product->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>Updated at</h4>
                        <div class="bg-gray py-2 px-3 mt-4">
                            {{ $product->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>Deleted at</h4>
                        <div class="bg-gray py-2 px-3 mt-4">
                            {{ $product->deleted_at ? $product->deleted_at->diffForHumans() : "Null" }}
                        </div>
                    </div>
                </div>
                <div class="bg-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        {{ $product->price }} EGP
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
