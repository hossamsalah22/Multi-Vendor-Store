@extends("layouts.index")
@section("title", "Users")

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">Users</li>
@endsection

@section("content")
    @if(session()->has("success"))
        <div class="alert alert-success mb-4">
            {{ session()->get("success") }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <caption class="text-center">List of users</caption>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Banned</th>
            <th>Actions</th>
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
                    <form action="{{ route("dashboard.users.ban", $user) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <a href="{{ route("dashboard.users.ban", $user) }}"
                           class="btn"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                        >
                            @if($user->banned)
                                <span class="badge badge-danger">Banned</span>
                            @else
                                <span class="badge badge-success">Unbanned</span>
                            @endif
                        </a>
                    </form>
                </td>
                <td>
                    <a href="{{ route("dashboard.users.show", $user) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center font-weight-bold">No users Found</td>
            </tr>
        @endforelse
        </tbody>

    </table>
    {{ $users->links() }}
@endsection
