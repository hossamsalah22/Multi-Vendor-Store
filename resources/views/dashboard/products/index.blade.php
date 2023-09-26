@extends("layouts.index")
@section("title", "Products")

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">Products</li>
@endsection

@section("content")
    @if(session()->has("success"))
        <div class="alert alert-success mb-4">
            {{ session()->get("success") }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <caption class="text-center">List of products</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Category</th>
            <th>Store</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $product->name }}</td>
                <td> {{ $product->price }} EGP</td>
                <td><img src="{{ $product->image }}" alt="{{ $product->name }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->store->name }}</td>
                <td>
                    <form action="{{ route("dashboard.products.activate", $product) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <a href="{{ route("dashboard.products.activate", $product) }}"
                           class="btn"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                        >
                            @if($product->active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </a>
                    </form>
                </td>
                <td>
                    <a href="{{ route("dashboard.products.show", $product) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route("dashboard.products.edit", $product) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#"
                       class="btn btn-sm btn-outline-danger"
                       onclick="event.preventDefault(); document.getElementById('form-delete').submit();"
                    ><i class="fas fa-trash"></i></a>
                    {{--    Delete Form     --}}
                    <form action="{{ route("dashboard.products.destroy", $product) }}" method="POST" class="hidden"
                          id="form-delete">
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center font-weight-bold">No products Found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $products->links() }}

@endsection
