@extends("layouts.index")
@section("title", "Sliders")

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">Sliders</li>
@endsection

@section("content")
    @if(session()->has("success"))
        <div class="alert alert-success mb-4">
            {{ session()->get("success") }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <caption class="text-center">List of sliders</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th>Actions</th>
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
                        <form action="{{ route("dashboard.sliders.activate", $slider) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <a href="{{ route("dashboard.sliders.activate", $slider) }}"
                               class="btn"
                               onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                @if($slider->active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </a>
                        </form>
                    @else
                        <span class="badge badge-danger">Deleted</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route("dashboard.sliders.show", $slider) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i>
                    </a>
                    @if($slider->deleted_at === null)
                        <a href="{{ route("dashboard.sliders.edit", $slider) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-edit"></i>
                        </a>
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

                    @else
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
                    @endif

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center font-weight-bold">No sliders Found</td>
            </tr>
        @endforelse
        </tbody>

    </table>
    {{ $sliders->links() }}
@endsection
