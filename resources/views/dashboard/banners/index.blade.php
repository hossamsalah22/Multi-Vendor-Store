@extends("layouts.index")
@section("title")
    {{ __("Banners") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">{{ __("Banners") }}</li>
@endsection

@section("content")

    <table class="table table-bordered text-center">
        <caption class="text-center">{{ __("List of banners") }}</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>{{ __("Title") }}</th>
            <th>
                {{ __("Description") }}
            </th>
            <th>
                {{ __("Image") }}
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
        @forelse($banners as $banner)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $banner->title }}</td>
                <td>{{ $banner->description }}</td>
                <td><img src="{{ $banner->image }}" alt="{{ $banner->name }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>
                    @if($banner->deleted_at === null)
                        @can('banners.activate')
                            <a href="{{ route("dashboard.banners.activate", $banner) }}"
                               class="btn"
                               onclick="confirmAction({{$banner->id}}, 'activate', {{ $banner->active ? "'Deactivate'" : "'Activate'" }})"
                            >
                                @if($banner->active)
                                    <span class="badge badge-success">{{ __("Active") }}</span>
                                @else
                                    <span class="badge badge-danger">{{ __("Inactive") }}</span>
                                @endif
                            </a>
                            <x-form.form-input :model="$banner" method="PUT" action="activate" name="banners"/>
                        @else
                            @if($banner->active)
                                <span class="badge badge-success">{{ __("Active") }}</span>
                            @else
                                <span class="badge badge-danger">{{ __("Inactive") }}</span>
                            @endif
                        @endcan
                    @else
                        <span class="badge badge-danger">{{ __("Deleted") }}</span>
                    @endif
                </td>
                <td>
                    @can('banners.show')
                        <a href="{{ route("dashboard.banners.show", $banner) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endcan
                    @if($banner->deleted_at === null)
                        @can('banners.update')
                            <a href="{{ route("dashboard.banners.edit", $banner) }}"
                               class="btn btn-sm btn-outline-info">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan
                        @can('banners.delete')
                            <a href="#"
                               class="btn btn-sm btn-outline-danger"
                               onclick="confirmAction({{$banner->id}}, 'destroy', 'Delete')"
                            ><i class="fas fa-trash-alt"></i></a>
                            {{--    Delete Form     --}}
                            <x-form.form-input :model="$banner" method="DELETE" action="destroy" name="banners"/>
                        @endcan
                    @else
                        {{--    Restore Button     --}}
                        @can('banners.restore')
                            <a href="{{ route("dashboard.banners.restore", $banner) }}"
                               class="btn btn-sm btn-outline-success"
                               onclick="confirmAction({{$banner->id}}, 'restore', 'Restore')"
                            ><i class="fas fa-trash-restore"></i></a>
                            {{--    Restore Form     --}}
                            <x-form.form-input :model="$banner" method="PUT" action="restore" name="banners"/>
                        @endcan
                    @endif

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center font-weight-bold">{{ __("No data") }}</td>
            </tr>
        @endforelse
        </tbody>

    </table>
    {{ $banners->links() }}
@endsection
