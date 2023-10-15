@extends("layouts.index")
@section("title")
    {{ __("Create Slider") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.sliders.index") }}">
            {{ __("Sliders") }}
        </a>
    </li>
    <li class="breadcrumb-item active">
        {{ __("Create") }}
    </li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route("dashboard.sliders.store") }}" method="post" enctype="multipart/form-data"
                      class="row">
                    @csrf

                    @include("dashboard.sliders._form", ['slider' => new \App\Models\Slider(), 'action' => __('Create')])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Slider\CreateRequest'); !!}
@endpush
