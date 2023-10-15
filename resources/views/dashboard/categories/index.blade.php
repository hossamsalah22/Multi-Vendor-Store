@extends("layouts.index")
@section("title")
    {{ __("Categories") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        {{ __("Categories") }}
    </li>
@endsection

@section("content")
    @if(session()->has("success"))
        <div class="alert alert-success mb-4">
            {{ session()->get("success") }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <caption class="text-center">
            {{ __("List of categories") }}
        </caption>
        <thead>
        <tr>
            <th>#</th>
            <th>
                {{ __("Name") }}
            </th>
            <th>
                {{ __("Image") }}
            </th>
            <th>
                {{ __("Primary Category") }}
            </th>
            <th>
                {{ __("Products Count") }}
            </th>
            <th>
                {{ __("Status") }}
            </th>
            <th>
                {{ __("Actions") }}
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $category->name }}</td>
                <td><img src="{{ $category->image }}" alt="{{ $category->name }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>{{ $category->parent->name }}</td>
                <td>{{ $category->products_count }}</td>
                <td>
                    @if($category->deleted_at === null)
                        <form action="{{ route("dashboard.categories.activate", $category) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <a href="{{ route("dashboard.categories.activate", $category) }}"
                               class="btn"
                               onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                @if($category->active)
                                    <span class="badge badge-success">
                                        {{ __("Active") }}
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        {{ __("Inactive") }}
                                    </span>
                                @endif
                            </a>
                        </form>
                    @else
                        <span class="badge badge-danger">
                            {{ __("Deleted") }}
                        </span>
                    @endif
                </td>
                <td>
                    <a href="{{ route("dashboard.categories.show", $category) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i>
                    </a>
                    @if($category->deleted_at === null)
                        <a href="{{ route("dashboard.categories.edit", $category) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#"
                           class="btn btn-sm btn-outline-danger"
                           onclick="event.preventDefault(); document.getElementById('form-delete-{{ $category->id }}').submit();"
                        ><i class="fas fa-trash-alt"></i></a>
                        {{--    Delete Form     --}}
                        <form action="{{ route("dashboard.categories.destroy", $category) }}" method="POST"
                              class="hidden"
                              id="form-delete-{{ $category->id }}">
                            @csrf
                            @method("DELETE")
                        </form>

                    @else
                        <a href="{{ route("dashboard.categories.restore", $category) }}"
                           class="btn btn-sm btn-outline-success"
                           onclick="event.preventDefault(); document.getElementById('form-restore-{{ $category->id }}').submit();"
                        ><i class="fas fa-trash-restore"></i></a>
                        {{--    Restore Form     --}}
                        <form action="{{ route("dashboard.categories.restore", $category) }}" method="POST"
                              class="hidden"
                              id="form-restore-{{ $category->id }}">
                            @csrf
                            @method("PUT")
                        </form>
                    @endif

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center font-weight-bold">
                    {{ __("No data") }}
                </td>
            </tr>
        @endforelse
        </tbody>

    </table>
    {{ $categories->links() }}
@endsection
