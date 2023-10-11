@extends("layouts.index")
@section("title", "Admin Details")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.admins.index") }}">Admins</a>
    </li>
    <li class="breadcrumb-item active">{{ $admin->username }}</li>
@endsection
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $admin->name }}</h3>
                <div class="col-12">
                    <img src="{{ $admin->image }}" class="product-image" alt="{{ $admin->username }}">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $admin->name }}</h3>
                <h3 class="my-3">{{ $admin->username }}</h3>
                <p>{{ $admin->email }}</p>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h4>Created at</h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $admin->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>Updated at</h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $admin->updated_at->diffForHumans() }}
                        </div>
                    </div>

                </div>
                <div class="bg-gradient-{{ $admin->banned ? "danger" : "success" }} py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Status: {{ $admin->active ? "Banned" : "Unbanned" }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
