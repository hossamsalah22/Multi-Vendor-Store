@extends("layouts.index")
@section("title", "Products")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.stores.index") }}">Products</a>
    </li>
    <li class="breadcrumb-item active">{{ $product->name }}</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <table class="table table-bordered text-center">
                <caption class="text-center">Product Details</caption>
                <thead>
                <tr>
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Store</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Deleted at</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $product->slug }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ $product->image }}" alt="{{ $product->name }}"
                             style="max-width: 100%; max-height: 200px;"></td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->store->name }}</td>
                    <td>{{ $product->created_at->diffForHumans() }}</td>
                    <td>{{ $product->updated_at->diffForHumans() }}</td>
                    <td>{{ $product->deleted_at ? $product->deleted_at->diffForHumans() : "Null" }}</td>
                    <td>{{ $product->active ? "Active" : "Inactive" }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
