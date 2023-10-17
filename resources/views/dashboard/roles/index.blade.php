@extends("layouts.index")
@section("title")
    {{ __("Roles") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        {{ __("Roles") }}
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
            {{ __("List of roles") }}
        </caption>
        <thead>
        <tr>
            <th>#</th>
            <th>
                {{ __("Name") }}
            </th>
            <th>{{ __("Permissions") }}</th>
            <th>{{ __("Actions") }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($roles as $role)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $role->name }}</td>
                <td>
                    @forelse($role->permissions as $permission)
                        <span class="badge badge-info">{{ $permission->name }}</span>
                    @empty
                        <span class="badge badge-danger">{{ __("No permissions") }}</span>
                    @endforelse
                </td>
                <td>
                    @can('roles.show')
                        <a href="{{ route("dashboard.roles.show", $role) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endcan
                    @can('roles.update')
                        <a href="{{ route("dashboard.roles.edit", $role) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-edit"></i>
                        </a>
                    @endcan
                    @can('roles.delete')
                        {{--    Delete Button    --}}
                        <a href="#"
                           class="btn btn-sm btn-outline-danger"
                           onclick="event.preventDefault(); document.getElementById('form-delete-{{ $role->id }}').submit();"
                        ><i class="fas fa-trash-alt"></i></a>
                        {{--    Delete Form     --}}
                        <form action="{{ route("dashboard.roles.destroy", $role) }}" method="POST"
                              class="hidden"
                              id="form-delete-{{ $role->id }}">
                            @csrf
                            @method("DELETE")
                        </form>
                    @endcan
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center font-weight-bold">{{ __("No data") }}</td>
            </tr>
        @endforelse
        </tbody>

    </table>
    {{ $roles->links() }}
@endsection
