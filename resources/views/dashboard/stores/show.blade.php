@extends("layouts.index")
@section("title", "Stores")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.stores.index") }}">Stores</a>
    </li>
    <li class="breadcrumb-item active">{{ $store->name }}</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <table class="table table-bordered text-center">
                <caption class="text-center">Store Details</caption>
                <thead>
                <tr>
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Deleted at</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $store->slug }}</td>
                    <td>{{ $store->name }}</td>
                    <td>{{ $store->description }}</td>
                    <td><img src="{{ $store->image }}" alt="{{ $store->name }}"
                             style="max-width: 100%; max-height: 200px;"></td>
                    <td>{{ $store->created_at->diffForHumans() }}</td>
                    <td>{{ $store->updated_at->diffForHumans() }}</td>
                    <td>{{ $store->deleted_at ? $store->deleted_at->diffForHumans() : "Null" }}</td>
                    <td>{{ $store->active ? "Active" : "Inactive" }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
