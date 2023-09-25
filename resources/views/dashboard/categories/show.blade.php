@extends("layouts.index")
@section("title", "Categories")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.categories.index") }}">Categories</a>
    </li>
    <li class="breadcrumb-item active">{{ $category->name }}</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <table class="table table-bordered text-center">
                <caption class="text-center">Category Details</caption>
                <thead>
                <tr>
                    <th>Slug</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Parent Category</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Deleted at</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->name }}</td>
                    <td><img src="{{ $category->image }}" alt="{{ $category->name }}"
                             style="max-width: 100%; max-height: 200px; display: block;"></td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->parent->name ?? "No Parent" }}</td>
                    <td>{{ $category->active? "Active" : "Inactive" }}</td>
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td>{{ $category->updated_at->diffForHumans() }}</td>
                    <td>{{ $category->deleted_at ? $category->deleted_at->diffForHumans() : "null" }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
