@extends("layouts.index")
@section("title")
    {{ __("Update Product") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.products.index") }}">
            {{ __("Products") }}
        </a>
    </li>
    <li class="breadcrumb-item active">
        {{ __("Update") }}
    </li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route("dashboard.products.update", $product) }}" method="post"
                      enctype="multipart/form-data" class="row">
                    @csrf
                    @method("put")
                    @include("dashboard.products._form", ['action' => __("Update")])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Product\UpdateRequest'); !!}
@endpush
