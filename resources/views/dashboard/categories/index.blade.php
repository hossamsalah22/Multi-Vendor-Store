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
                        @can('categories.activate')
                            <a href="{{ route("dashboard.categories.activate", $category) }}"
                               class="btn"
                               onclick="confirmAction({{$category->id}}, 'activate', {{ $category->active ? "'Deactivate'" : "'Activate'"  }})"
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
                            <x-form.form-input :model="$category" method="PUT" action="activate" name="categories"/>
                        @else
                            @if($category->active)
                                <span class="badge badge-success">
                                    {{ __("Active") }}
                                </span>
                            @else
                                <span class="badge badge-danger">
                                    {{ __("Inactive") }}
                                </span>
                            @endif
                        @endcan
                    @else
                        <span class="badge badge-danger">
                            {{ __("Deleted") }}
                        </span>
                    @endif
                </td>
                <td>
                    @can('categories.show')
                        <a href="{{ route("dashboard.categories.show", $category) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endcan
                    @if($category->deleted_at === null)
                        @can('categories.update')
                            <a href="{{ route("dashboard.categories.edit", $category) }}"
                               class="btn btn-sm btn-outline-info">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan
                        @can('categories.delete')
                            <a href="#"
                               class="btn btn-sm btn-outline-danger"
                               onclick="confirmAction({{$category->id}}, 'destroy', 'Delete')"
                            ><i class="fas fa-trash-alt"></i></a>
                            {{--    Delete Form     --}}
                            <x-form.form-input :model="$category" method="DELETE" action="destroy" name="categories"/>
                        @endcan
                    @else
                        {{--    Restore Button     --}}
                        @can('categories.restore')
                            <a href="{{ route("dashboard.categories.restore", $category) }}"
                               class="btn btn-sm btn-outline-success"
                               onclick="confirmAction({{$category->id}}, 'restore', 'Restore')"
                            ><i class="fas fa-trash-restore"></i></a>
                            {{--    Restore Form     --}}
                            <x-form.form-input :model="$category" method="PUT" action="restore" name="categories"/>
                        @endcan
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
