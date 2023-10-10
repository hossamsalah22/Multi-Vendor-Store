@extends("layouts.index")
@section("title", "Create Banner")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.banners.index") }}">Banners</a>
    </li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route("dashboard.banners.store") }}" method="post" enctype="multipart/form-data"
                      class="row">
                    @csrf

                    @include("dashboard.banners._form", ['banner' => new \App\Models\Banner(), 'action' => 'Create'])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Banner\CreateRequest'); !!}
@endpush
