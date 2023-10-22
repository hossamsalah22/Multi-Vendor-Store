@extends("layouts.index")
@section("title")
    {{ __("Stores") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        {{ __("Stores") }}
    </li>
@endsection

@section("content")

    <table class="table table-bordered text-center">
        <caption class="text-center">
            {{ __("List of stores") }}
        </caption>
        <thead>
        <tr>
            <th>#</th>
            <th>
                {{ __("Name") }}
            </th>
            <th>
                {{ __("Description") }}
            </th>
            <th>
                {{ __("Image") }}
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
        @forelse($stores as $store)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $store->name }}</td>
                <td> {{ substr($store->description, 0, 40) }}...</td>
                <td><img src="{{ $store->image }}" alt="{{ $store->name }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>{{ $store->products_count }}</td>
                <td>
                    @if($store->deleted_at === null)
                        @can('stores.activate')
                            <a href="{{ route("dashboard.stores.activate", $store) }}"
                               class="btn"
                               onclick="confirmAction({{$store->id}}, 'activate', {{ $store->active ? "'Deactivate'" : "'Activate'"  }})"
                            >
                                @if($store->active)
                                    <span class="badge badge-success">
                                        {{ __("Active") }}
                                    </span>
                                @else
                                    <span class="badge badge-danger">
                                        {{ __("Inactive") }}
                                    </span>
                                @endif
                            </a>
                            <x-form.form-input
                                :model="$store"

                                action="activate"
                                name="stores"/>
                        @else
                            @if($store->active)
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
                    @can('stores.show')
                        <a href="{{ route("dashboard.stores.show", $store) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endcan
                    @if($store->deleted_at === null)
                        @can('stores.update')
                            <a href="{{ route("dashboard.stores.edit", $store) }}"
                               class="btn btn-sm btn-outline-info">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan
                        @can('stores.delete')
                            {{--    Delete Button    --}}
                            <a href="#"
                               class="btn btn-sm btn-outline-danger"
                               onclick="confirmAction({{$store->id}}, 'destroy', 'Delete')"
                            ><i class="fas fa-trash"></i></a>
                            {{--    Delete Form     --}}
                            <x-form.form-input :model="$store" method="DELETE" action="destroy" name="stores"/>
                        @endcan
                    @else
                        {{--    Restore Button    --}}
                        @can('stores.restore')
                            <a href="{{ route("dashboard.stores.restore", $store) }}"
                               class="btn btn-sm btn-outline-success"
                               onclick="confirmAction({{$store->id}}, 'restore', 'Restore')">
                                <i class="fas fa-trash-restore"></i>
                            </a>
                            {{--    Restore Form     --}}
                            <x-form.form-input :model="$store" action="restore" name="stores"/>
                        @endcan
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center font-weight-bold">
                    {{ __("No data") }}
                </td>
            </tr>
        @endforelse
        </tbody>

    </table>

    {{ $stores->links() }}
@endsection
