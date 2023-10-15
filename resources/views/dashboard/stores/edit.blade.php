@extends("layouts.index")
@section("title")
    {{ __("Update Store") }}
@endsection
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.stores.index") }}">
            {{ __("Stores") }}
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
                <form action="{{ route("dashboard.stores.update", $store) }}" method="post"
                      enctype="multipart/form-data" class="row">
                    @csrf
                    @method("put")
                    @include("dashboard.stores._form", ['action' => __('Update')])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Store\UpdateRequest'); !!}
@endpush
