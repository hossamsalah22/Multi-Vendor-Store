@extends("layouts.index")
@section("title", "Stores")

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">Stores</li>
@endsection

@section("content")
    @if(session()->has("success"))
        <div class="alert alert-success mb-4">
            {{ session()->get("success") }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <caption class="text-center">List of stores</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($stores as $store)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $store->name }}</td>
                <td> {{ $store->description }}</td>
                <td><img src="{{ $store->image }}" alt="{{ $store->name }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>
                    <form action="{{ route("dashboard.stores.activate", $store) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <a href="{{ route("dashboard.stores.activate", $store) }}"
                           class="btn"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                        >
                            @if($store->active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </a>
                    </form>
                </td>
                <td>
                    <a href="{{ route("dashboard.stores.show", $store) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route("dashboard.stores.edit", $store) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#"
                       class="btn btn-sm btn-outline-danger"
                       onclick="event.preventDefault(); document.getElementById('form-delete').submit();"
                    ><i class="fas fa-trash"></i></a>
                    {{--    Delete Form     --}}
                    <form action="{{ route("dashboard.stores.destroy", $store) }}" method="POST" class="hidden"
                          id="form-delete">
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center font-weight-bold">No stores Found</td>
            </tr>
        @endforelse
        </tbody>

    </table>

    {{ $stores->links() }}
@endsection
