@extends("layouts.index")
@section("title")
    {{ __("Role Details") }}
@endsection
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.roles.index") }}">{{ __("Roles") }}</a>
    </li>
    <li class="breadcrumb-item active">{{ $role->name }}</li>
@endsection
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block">{{ __("Permissions") }}</h3>
                <div class="col-12">
                    @foreach($role->permissions as $permission)
                        <span class="badge badge-info">{{ $permission->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $role->name }}</h3>
                <hr>
                <div class="row">
                    <div class="col-4">
                        <h4>{{ __("Created At") }}</h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $role->created_at->diffForHumans() }}
                        </div>
                    </div>

                    <div class="col-4">
                        <h4>{{ __("Updated At") }}</h4>
                        <div class="bg-gradient-info py-2 px-3 mt-4">
                            {{ $role->updated_at->diffForHumans() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
