@extends("layouts.index")
@section("title")
    {{ __("Products") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        {{ __("Products") }}
    </li>
@endsection

@section("content")
    @if(session()->has("success"))
        <div class="alert alert-success mb-4">
            {{ session()->get("success") }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <caption class="text-center">
            {{ __("List of products") }}
        </caption>
        <thead>
        <tr>
            <th>#</th>
            <th>
                {{ __("Name") }}
            </th>
            <th>
                {{ __("Price") }}
            </th>
            <th>
                {{ __("Image") }}
            </th>
            <th>
                {{ __("Category") }}
            </th>
            <th>
                {{ __("Store") }}
            </th>
            <th>
                {{ __("Status") }}
            </th>
            <th>
                {{ __("Actions") }}
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $product->name }}</td>
                <td> {{ Currency::format($product->price) }}</td>
                <td><img src="{{ $product->image }}" alt="{{ $product->name }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>{{ $product?->category?->name }}</td>
                <td>{{ $product->store->name }}</td>
                <td>
                    @if($product->deleted_at === null)
                        @can('products.activate')
                            <form action="{{ route("dashboard.products.activate", $product) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <a href="{{ route("dashboard.products.activate", $product) }}"
                                   class="btn"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                >
                                    @if($product->active)
                                        <span class="badge badge-success">
                                        {{ __("Active") }}
                                    </span>
                                    @else
                                        <span class="badge badge-danger">
                                        {{ __("Inactive") }}
                                    </span>
                                    @endif
                                </a>
                            </form>
                        @else
                            @if($product->active)
                                <span class="badge badge-success">
                                        {{ __("Active") }}
                                    </span>
                            @else
                                <span class="badge badge-danger">
                                        {{ __("Inactive") }}
                                    </span>
                            @endif
                        @endcan
                    @else
                        <span class="badge badge-danger">
                            {{ __("Deleted") }}
                        </span>
                    @endif
                </td>
                <td>
                    @can('products.show')
                        <a href="{{ route("dashboard.products.show", $product) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endcan
                    @if($product->deleted_at === null)
                        @can('products.update')
                            <a href="{{ route("dashboard.products.edit", $product) }}"
                               class="btn btn-sm btn-outline-info">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan
                        @can('products.delete')
                            <a href="#"
                               class="btn btn-sm btn-outline-danger"
                               onclick="event.preventDefault(); document.getElementById('form-delete-{{ $product->id }}').submit();"
                            ><i class="fas fa-trash"></i></a>
                            {{--    Delete Form     --}}
                            <form action="{{ route("dashboard.products.destroy", $product) }}" method="POST"
                                  class="hidden"
                                  id="form-delete-{{ $product->id }}">
                                @csrf
                                @method("DELETE")
                            </form>
                        @endcan
                    @else
                        @can('products.restore')
                            <a href="#"
                               class="btn btn-sm btn-outline-success"
                               onclick="event.preventDefault(); document.getElementById('form-restore-{{ $product->id }}').submit();"
                            ><i class="fas fa-trash-restore"></i></a>
                            {{--    Delete Form     --}}
                            <form action="{{ route("dashboard.products.restore", $product) }}" method="POST"
                                  class="hidden"
                                  id="form-restore-{{ $product->id }}">
                                @csrf
                                @method("PUT")
                            </form>
                        @endcan
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center font-weight-bold">
                    {{ __("No data") }}
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $products->links() }}

@endsection
