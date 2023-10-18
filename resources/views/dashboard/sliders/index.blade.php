@extends("layouts.index")
@section("title")
    {{ __("Sliders") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        {{ __("Sliders") }}
    </li>
@endsection

@section("content")

    <table class="table table-bordered text-center">
        <caption class="text-center">
            {{ __("List of sliders") }}
        </caption>
        <thead>
        <tr>
            <th>#</th>
            <th>
                {{ __("Title") }}
            </th>
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
        @forelse($sliders as $slider)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $slider->title }}</td>
                <td>{{ $slider->description }}</td>
                <td><img src="{{ $slider->image }}" alt="{{ $slider->name }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>
                    @if($slider->deleted_at === null)
                        @can('sliders.activate')
                            <a href="{{ route("dashboard.sliders.activate", $slider) }}"
                               class="btn"
                               onclick="confirmAction({{$slider->id}}, 'activate', {{ $slider->active ? "'Deactivate'" : "'Activate'"  }})"
                            >
                                @if($slider->active)
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
                                :model="$slider"
                                method="PUT"
                                action="activate"
                                name="sliders"/>
                        @else
                            @if($slider->active)
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
                    @can('sliders.show')
                        <a href="{{ route("dashboard.sliders.show", $slider) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endcan
                    @if($slider->deleted_at === null)
                        @can('sliders.update')
                            <a href="{{ route("dashboard.sliders.edit", $slider) }}"
                               class="btn btn-sm btn-outline-info">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan
                        @can('sliders.delete')
                            <a href="#"
                               class="btn btn-sm btn-outline-danger"
                               onclick="confirmAction({{$slider->id}}, 'destroy', 'Delete')"
                            ><i class="fas fa-trash-alt"></i></a>
                            {{--    Delete Form     --}}
                            <x-form.form-input :model="$slider" method="DELETE" action="destroy" name="sliders"/>
                        @endcan
                    @else
                        @can('sliders.restore')
                            <a href="{{ route("dashboard.sliders.restore", $slider) }}"
                               class="btn btn-sm btn-outline-success"
                               onclick="confirmAction({{$slider->id}}, 'restore', 'Restore')"
                            ><i class="fas fa-trash-restore"></i></a>
                            {{--    Restore Form     --}}
                            <x-form.form-input :model="$slider" method="PUT" action="restore" name="sliders"/>
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
    {{ $sliders->links() }}
@endsection
