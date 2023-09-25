@extends("layouts.index")
@section("title", "Create Category")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.categories.index") }}">Categories</a>
    </li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route("dashboard.categories.store") }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include("dashboard.categories._form", ['category' => new \App\Models\Category(), 'action' => 'Create'])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Category\CreateRequest'); !!}
@endpush
