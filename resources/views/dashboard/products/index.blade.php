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
                            <a href="{{ route("dashboard.products.activate", $product) }}"
                               class="btn"
                               onclick="confirmAction({{$product->id}}, 'activate', {{ $product->active ? "'Deactivate'" : "'Activate'"  }})"
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
                            <x-form.form-input :model="$product" method="PUT" action="activate" name="products"/>
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
                               onclick="confirmAction({{$product->id}}, 'destroy', 'Delete')"
                            ><i class="fas fa-trash"></i></a>
                            {{--    Delete Form     --}}
                            <x-form.form-input :model="$product" method="DELETE" action="destroy" name="products"/>
                        @endcan
                    @else
                        @can('products.restore')
                            <a href="#"
                               class="btn btn-sm btn-outline-success"
                               onclick="confirmAction({{$product->id}}, 'restore', 'Restore')"
                            ><i class="fas fa-trash-restore"></i></a>
                            {{--    Delete Form     --}}
                            <x-form.form-input :model="$product" method="PUT" action="restore" name="products"/>
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
