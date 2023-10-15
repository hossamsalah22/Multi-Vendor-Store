@extends("layouts.index")
@section("title")
    {{ __("Product Details") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.stores.index") }}">
            {{ __("Products") }}
        </a>
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
                    {{ __("Quantity") }}
                    : {{ $product->quantity }} {{ $product->quantity == 1 ? __("Piece") : __("Pieces") }}</h4>
                <hr>
                <div class="row">

                    <div class="col-6">
                        <h4>
                            {{ __("Category") }}
                        </h4>
                        @if($product->category_id != null)
                            <a href="{{ route('dashboard.categories.show', $product->category) }}"
                               class="btn btn-default">{{ $product->category->name }}</a>
                        @else
                            <p class="btn btn-default">
                                {{ __("No Category") }}
                            </p>
                        @endif
                    </div>

                    <div class="col-6">
                        <h4>
                            {{ __("Store") }}
                        </h4>
                        <a href="{{ route('dashboard.stores.show', $product->store) }}"
                           class="btn btn-default">{{ $product->store->name }}</a>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h4>
                            {{ __("Created At") }}
                        </h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $product->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>
                            {{ __("Updated At") }}
                        </h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $product->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>
                            {{ __("Deleted At") }}
                        </h4>
                        <div class="bg-gradient-danger py-2 px-3 mt-4">
                            {{ $product->deleted_at ? $product->deleted_at->diffForHumans() : __("Null") }}
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-{{ $product->active ? "success" : "danger" }} py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        {{ __("Status") }}: {{ $product->active ? __("Active") : __("Inactive") }}
                    </h2>
                </div>
                <div class="bg-gradient-gray py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        {{ __("Price") }}: {{ Currency::format($product->price) }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
