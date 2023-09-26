@extends("layouts.index")
@section("title", "Create Product")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.products.index") }}">Products</a>
    </li>
    <li class="breadcrumb-item active">Create</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route("dashboard.products.store") }}" method="post" enctype="multipart/form-data"
                      class="row">
                    @csrf
                    @include("dashboard.products._form", ['product' => new \App\Models\Product(), 'action' => 'Create'])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Product\CreateRequest'); !!}
@endpush
