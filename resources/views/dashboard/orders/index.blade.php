@extends("layouts.index")
@section("title", "Orders")

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">Orders</li>
@endsection

@section("content")
    @if(session()->has("success"))
        <div class="alert alert-success mb-4">
            {{ session()->get("success") }}
        </div>
    @endif

    <table class="table table-bordered text-center">
        <caption class="text-center">List of Latest Orders</caption>
        <thead>
        <tr>
            <th>Number</th>
            <th>User</th>
            <th>Store</th>
            <th>Total</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->number }}</td>
                <td> {{ $order->user?->name ?? "Guest" }}</td>
                <td> {{ $order->store->name }}</td>
                <td>{{ $order->total }}</td>
                <td>@if($order->status != "completed")
                        <span class="badge badge-danger">{{ $order->status }}</span>
                    @else
                        <span class="badge badge-success">{{ $order->status }}</span>
                    @endif</td>
                {{--                <td>--}}
                {{--                    --}}{{--                    @if($order->deleted_at === null)--}}
                {{--                    --}}{{--                        <form action="{{ route("dashboard.products.activate", $order) }}" method="POST">--}}
                {{--                    --}}{{--                            @csrf--}}
                {{--                    --}}{{--                            @method("PUT")--}}
                {{--                    --}}{{--                            <a href="{{ route("dashboard.products.activate", $order) }}"--}}
                {{--                    --}}{{--                               class="btn"--}}
                {{--                    --}}{{--                               onclick="event.preventDefault(); this.closest('form').submit();"--}}
                {{--                    --}}{{--                            >--}}
                {{--                    --}}{{--                                @if($order->active)--}}
                {{--                    --}}{{--                                    <span class="badge badge-success">Active</span>--}}
                {{--                    --}}{{--                                @else--}}
                {{--                    --}}{{--                                    <span class="badge badge-danger">Inactive</span>--}}
                {{--                    --}}{{--                                @endif--}}
                {{--                    --}}{{--                            </a>--}}
                {{--                    --}}{{--                        </form>--}}
                {{--                    --}}{{--                    @else--}}
                {{--                    --}}{{--                        <span class="badge badge-danger">Deleted</span>--}}
                {{--                    --}}{{--                    @endif--}}
                {{--                    Still--}}
                {{--                </td>--}}
                <td>
                    <a href="{{ route("dashboard.orders.show", $order) }}"
                       class="btn btn-sm btn-outline-info">
                        <i class="fas fa-eye"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center font-weight-bold">No Orders Found</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $orders->links() }}

@endsection
