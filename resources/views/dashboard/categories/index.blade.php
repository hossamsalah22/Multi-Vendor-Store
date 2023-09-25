@extends("layouts.index")
@section("title", "Categories")

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection

@section("content")
    @if(session()->has("success"))
        <div class="alert alert-success mb-4">
            {{ session()->get("success") }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <caption class="text-center">List of categories</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Parent Category</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $category->name }}</td>
                <td><img src="{{ $category->image }}" alt="{{ $category->name }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>{{ $category->parent->name ?? "No Parent" }}</td>
                <td>
                    <form action="{{ route("dashboard.categories.activate", $category) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <a href="{{ route("dashboard.categories.activate", $category) }}"
                           class="btn"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                        >
                            @if($category->active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Inactive</span>
                            @endif
                        </a>
                    </form>
                </td>
                <td>
                    <a href="{{ route("dashboard.categories.show", $category) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route("dashboard.categories.edit", $category) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="#"
                       class="btn btn-sm btn-outline-danger"
                       onclick="event.preventDefault(); document.getElementById('form-delete').submit();"
                    ><i class="fas fa-trash"></i></a>
                    {{--    Delete Form     --}}
                    <form action="{{ route("dashboard.categories.destroy", $category) }}" method="POST" class="hidden"
                          id="form-delete">
                        @csrf
                        @method("DELETE")
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center font-weight-bold">No categories Found</td>
            </tr>
        @endforelse
        </tbody>

    </table>

@endsection
