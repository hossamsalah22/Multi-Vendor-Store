@extends("layouts.index")
@section("title", "Banners")

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">Banners</li>
@endsection

@section("content")
    @if(session()->has("success"))
        <div class="alert alert-success mb-4">
            {{ session()->get("success") }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <caption class="text-center">List of banners</caption>
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
        @forelse($banners as $banner)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $banner->title }}</td>
                <td>{{ $banner->description }}</td>
                <td><img src="{{ $banner->image }}" alt="{{ $banner->name }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>
                    @if($banner->deleted_at === null)
                        <form action="{{ route("dashboard.banners.activate", $banner) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <a href="{{ route("dashboard.banners.activate", $banner) }}"
                               class="btn"
                               onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                @if($banner->active)
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
                    <a href="{{ route("dashboard.banners.show", $banner) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i>
                    </a>
                    @if($banner->deleted_at === null)
                        <a href="{{ route("dashboard.banners.edit", $banner) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#"
                           class="btn btn-sm btn-outline-danger"
                           onclick="event.preventDefault(); document.getElementById('form-delete-{{ $banner->id }}').submit();"
                        ><i class="fas fa-trash-alt"></i></a>
                        {{--    Delete Form     --}}
                        <form action="{{ route("dashboard.banners.destroy", $banner) }}" method="POST"
                              class="hidden"
                              id="form-delete-{{ $banner->id }}">
                            @csrf
                            @method("DELETE")
                        </form>

                    @else
                        <a href="{{ route("dashboard.banners.restore", $banner) }}"
                           class="btn btn-sm btn-outline-success"
                           onclick="event.preventDefault(); document.getElementById('form-restore-{{ $banner->id }}').submit();"
                        ><i class="fas fa-trash-restore"></i></a>
                        {{--    Restore Form     --}}
                        <form action="{{ route("dashboard.banners.restore", $banner) }}" method="POST"
                              class="hidden"
                              id="form-restore-{{ $banner->id }}">
                            @csrf
                            @method("PUT")
                        </form>
                    @endif

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center font-weight-bold">No banners Found</td>
            </tr>
        @endforelse
        </tbody>

    </table>
    {{ $banners->links() }}
@endsection
