@extends("layouts.index")
@section("title", "Update Role")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.roles.index") }}">{{ __("Roles") }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __("Update") }}</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route("dashboard.roles.update", $role) }}" method="post"
                      enctype="multipart/form-data" class="row">
                    @csrf
                    @method("put")
                    @include("dashboard.roles._form", ['action' => __('Update')])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Role\UpdateRequest'); !!}
    <script>
        $('#select_all').on('click', function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
