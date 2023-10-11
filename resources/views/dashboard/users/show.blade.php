@extends("layouts.index")
@section("title", "User Details")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.users.index") }}">Users</a>
    </li>
    <li class="breadcrumb-item active">{{ $user->username }}</li>
@endsection
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{ $user->name }}</h3>
                <div class="col-12">
                    <img src="{{ $user->image }}" class="product-image" alt="{{ $user->name }}">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $user->name }}</h3>
                <h3 class="my-3">{{ $user->username }}</h3>
                <p>{{ $user->email }}</p>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h4>Created at</h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $user->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>Updated at</h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $user->updated_at->diffForHumans() }}
                        </div>
                    </div>

                </div>
                <div class="bg-gradient-{{ $user->banned ? "danger" : "success" }} py-2 px-3 mt-4">
                    <h2 class="mb-0">
                        Status: {{ $user->banned ? "Banned" : "Unbanned" }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection
