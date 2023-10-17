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
    @if(session()->has("success"))
        <div class="alert alert-success mb-4">
            {{ session()->get("success") }}
        </div>
    @endif

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
                            <form action="{{ route("dashboard.sliders.activate", $slider) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <a href="{{ route("dashboard.sliders.activate", $slider) }}"
                                   class="btn"
                                   onclick="event.preventDefault(); this.closest('form').submit();"
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
                            </form>
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
                               onclick="event.preventDefault(); document.getElementById('form-delete-{{ $slider->id }}').submit();"
                            ><i class="fas fa-trash-alt"></i></a>
                            {{--    Delete Form     --}}
                            <form action="{{ route("dashboard.sliders.destroy", $slider) }}" method="POST"
                                  class="hidden"
                                  id="form-delete-{{ $slider->id }}">
                                @csrf
                                @method("DELETE")
                            </form>
                        @endcan
                    @else
                        @can('sliders.restore')
                            <a href="{{ route("dashboard.sliders.restore", $slider) }}"
                               class="btn btn-sm btn-outline-success"
                               onclick="event.preventDefault(); document.getElementById('form-restore-{{ $slider->id }}').submit();"
                            ><i class="fas fa-trash-restore"></i></a>
                            {{--    Restore Form     --}}
                            <form action="{{ route("dashboard.sliders.restore", $slider) }}" method="POST"
                                  class="hidden"
                                  id="form-restore-{{ $slider->id }}">
                                @csrf
                                @method("PUT")
                            </form>
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
