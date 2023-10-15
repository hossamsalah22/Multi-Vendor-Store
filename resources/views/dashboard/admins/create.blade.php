@extends("layouts.index")
@section("title")
    {{ __("Create Admin") }}
@endsection
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.admins.index") }}">{{ __("Admins") }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __("Create") }}</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route("dashboard.admins.store") }}" method="post" enctype="multipart/form-data"
                      class="row">
                    @csrf

                    @include("dashboard.admins._form", ['admin' => new \App\Models\Admin(), 'action' => __('Create')])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Admin\CreateRequest'); !!}
@endpush
