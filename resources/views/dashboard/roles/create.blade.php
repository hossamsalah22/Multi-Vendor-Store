@extends("layouts.index")
@section("title")
    {{ __("Create Role") }}
@endsection
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.roles.index") }}">{{ __("Roles") }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __("Create") }}</li>
@endsection
@section("content")
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route("dashboard.roles.store") }}" method="post" enctype="multipart/form-data"
                      class="row">
                    @csrf

                    @include("dashboard.roles._form", ['role' => new \Spatie\Permission\Models\Role(), 'action' => __('Create')])
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\Dashboard\Role\CreateRequest'); !!}
    <script>
        $('#select_all').on('click', function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>
@endpush
