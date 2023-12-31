@extends("layouts.index")
@section("title")
    {{ __("Users") }}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        {{ __("Users") }}
    </li>
@endsection

@section("content")

    <table class="table table-bordered text-center">
        <caption class="text-center">
            {{ __("List of users") }}
        </caption>
        <thead>
        <tr>
            <th>#</th>
            <th>
                {{ __("Name") }}
            </th>
            <th>
                {{ __("Email") }}
            </th>
            <th>
                {{ __("Image") }}
            </th>
            <th>
                {{ __("Banned") }}
            </th>
            <th>
                {{ __("Actions") }}
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($users as $user)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><img src="{{ $user->image }}" alt="{{ $user->name }}"
                         style="max-width: 100%; max-height: 50px;"></td>
                <td>
                    @can('users.ban')
                        <a href="{{ route("dashboard.users.ban", $user) }}"
                           class="btn"
                           onclick="confirmAction({{$user->id}}, 'ban', {{ $user->banned ? "'Unban'" : "'Ban'" }})"
                        >
                            @if($user->banned)
                                <span class="badge badge-danger">
                                    {{ __("Banned") }}
                                </span>
                            @else
                                <span class="badge badge-success">
                                    {{ __("Unbanned") }}
                                </span>
                            @endif
                        </a>
                        <x-form.form-input
                            :model="$user"
                            action="ban"
                            name="users"/>
                    @else
                        @if($user->banned)
                            <span class="badge badge-danger">
                                    {{ __("Banned") }}
                                </span>
                        @else
                            <span class="badge badge-success">
                                    {{ __("Unbanned") }}
                                </span>
                        @endif
                    @endcan
                </td>
                <td>
                    @can('users.show')
                        <a href="{{ route("dashboard.users.show", $user) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endcan
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
    {{ $users->links() }}
@endsection
