@extends("layouts.index")
@section("title")
    {{ __("Admins") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        {{ __("Admins") }}
    </li>
@endsection

@section("content")

    <table class="table table-bordered text-center">
        <caption class="text-center">
            {{ __("List of admins") }}
        </caption>
        <thead>
        <tr>
            <th>#</th>
            <th>
                {{ __("Name") }}
            </th>
            <th>{{ __("Email") }}</th>
            <th>{{ __("Image") }}</th>
            <th>{{ __("Status") }}</th>
            <th>{{ __("Actions") }}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($admins as $admin)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td><img src="{{ $admin->image }}" alt="{{ $admin->username }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>
                    @can('admins.ban')
                        <a href="{{ route("dashboard.admins.ban", $admin) }}"
                           class="btn"
                           onclick="confirmAction({{$admin->id}}, 'ban', {{ $admin->banned ? "'Unban'" : "'Ban'" }})"
                        >
                            @if($admin->banned)
                                <span class="badge badge-danger">{{ __("Banned") }}</span>
                            @else
                                <span class="badge badge-success">{{ __("Unbanned") }}</span>
                            @endif
                        </a>
                        <x-form.form-input :model="$admin" method="PUT" action="ban" name="admins"/>

                    @else
                        @if($admin->banned)
                            <span class="badge badge-danger">{{ __("Banned") }}</span>
                        @else
                            <span class="badge badge-success">{{ __("Unbanned") }}</span>
                        @endif
                    @endcan
                </td>
                <td>
                    @can('admins.show')
                        <a href="{{ route("dashboard.admins.show", $admin) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endcan
                    @if($admin->deleted_at === null)
                        @can('admins.update')
                            <a href="{{ route("dashboard.admins.edit", $admin) }}"
                               class="btn btn-sm btn-outline-info">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan
                        @can('admins.delete')
                            <a href="#"
                               class="btn btn-sm btn-outline-danger"
                               onclick="confirmAction({{$admin->id}}, 'destroy', 'Delete')"
                            ><i class="fas fa-trash-alt"></i></a>
                            {{--    Delete Form     --}}
                            <x-form.form-input :model="$admin" method="DELETE" action="destroy" name="admins"/>
                        @endcan
                    @else
                        {{--    Restore Button     --}}
                        @can('admins.restore')
                            <a href="{{ route("dashboard.admins.restore", $admin) }}"
                               class="btn btn-sm btn-outline-success"
                               onclick="confirmAction({{$admin->id}}, 'restore', 'Restore')"
                            ><i class="fas fa-trash-restore"></i></a>
                            {{--    Restore Form     --}}
                            <x-form.form-input :model="$admin" method="PUT" action="restore" name="admins"/>
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
    {{ $admins->links() }}
@endsection
