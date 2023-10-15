@extends("layouts.index")
@section("title")
    {{ __("Store Details") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.stores.index") }}">
            {{ __("Stores") }}
        </a>
    </li>
    <li class="breadcrumb-item active">{{ $store->name }}</li>
@endsection
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $store->name }}</h3>
                <div class="col-12">
                    <img src="{{ $store->image }}" class="product-image" alt="{{ $store->name }}">
                </div>
            </div>

            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $store->name }}</h3>
                <p>{{ $store->description }}</p>
                <hr>
                <div class="bg-gradient-primary py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        {{ __("Admins") }}: {{ $store->admins->count() }}
                    </h2>
                    @foreach($store->admins as $admin)
                        <p>{{ __("Name") }}: {{ $admin->name }}, {{ __("Username") }}: {{ $admin->username }}</p>
                    @endforeach
                </div>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h4>
                            {{ __("Created At") }}
                        </h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $store->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>
                            {{ __("Updated At") }}
                        </h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $store->updated_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>
                            {{ __("Deleted At") }}
                        </h4>
                        <div class="bg-gradient-danger py-2 px-3 mt-4">
                            {{ $store->deleted_at ? $store->deleted_at->diffForHumans() : __("Null") }}
                        </div>
                    </div>
                </div>
                <div class="bg-gradient-{{ $store->active ? "success" : "danger" }} py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        {{ __("Status") }}: {{ $store->active ? __("Active") : __("Inactive") }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
