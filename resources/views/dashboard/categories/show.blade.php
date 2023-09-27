@extends("layouts.index")
@section("title", "Category Details")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.categories.index") }}">Categories</a>
    </li>
    <li class="breadcrumb-item active">{{ $category->name }}</li>
@endsection
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $category->name }}</h3>
                <div class="col-12">
                    <img src="{{ $category->image }}" class="product-image" alt="{{ $category->name }}">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $category->name }}</h3>
                <p>{{ $category->description }}</p>
                <hr>
                <h4>Parent Category: {{ $category->parent->name ?? "Primary Category" }}</h4>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h4>Created at</h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $category->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>Updated at</h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $category->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>Deleted at</h4>
                        <div class="bg-gradient-danger py-2 px-3 mt-4">
                            {{ $category->deleted_at ? $category->deleted_at->diffForHumans() : "Null" }}
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-{{ $category->active ? "success" : "danger" }} py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Status: {{ $category->active ? "Active" : "Inactive" }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
