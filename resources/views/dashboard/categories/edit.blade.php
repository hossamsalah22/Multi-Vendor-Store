@extends("layouts.index")
@section("title", "Update Category")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.categories.index") }}">Categories</a>
    </li>
    <li class="breadcrumb-item active">Update</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route("dashboard.categories.update", $category) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method("put")
                    @include("dashboard.categories._form", ['action' => 'Update'])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Category\UpdateRequest'); !!}
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
