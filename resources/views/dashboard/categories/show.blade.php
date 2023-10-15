@extends("layouts.index")
@section("title")
    {{__("Category Details")}}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.categories.index") }}">
            {{ __("Categories") }}
        </a>
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
                <h4>{{ __("Primary Category") }}: {{ $category->parent->name }}</h4>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h4>
                            {{ __("Created At") }}
                        </h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $category->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>
                            {{ __("Updated At") }}
                        </h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $category->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>
                            {{ __("Deleted At") }}
                        </h4>
                        <div class="bg-gradient-danger py-2 px-3 mt-4">
                            {{ $category->deleted_at ? $category->deleted_at->diffForHumans() : __("Null") }}
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-{{ $category->active ? "success" : "danger" }} py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        {{ __('Status') }}: {{ $category->active ? __("Active") : __("Inactive") }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
