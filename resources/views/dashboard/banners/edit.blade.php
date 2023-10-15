@extends("layouts.index")
@section("title")
    {{ __("Update Banner") }}
@endsection
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.banners.index") }}">{{ __("Banners") }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __("Update") }}</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route("dashboard.banners.update", $banner) }}" method="post"
                      enctype="multipart/form-data" class="row">
                    @csrf
                    @method("put")
                    @include("dashboard.banners._form", ['action' => __('Update')])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Banner\UpdateRequest'); !!}
    <script>
        function previewImage() {
            const fileInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
@endpush
