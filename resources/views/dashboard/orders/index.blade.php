@extends("layouts.index")
@section("title")
    {{__("Orders")}}
@endsection

@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        {{ __("Orders") }}
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
            {{ __("List of orders") }}
        </caption>
        <thead>
        <tr>
            <th>
                {{ __("Number") }}
            </th>
            <th>
                {{ __("Customer") }}
            </th>
            <th>
                {{ __("Store") }}
            </th>
            <th>
                {{ __("Total") }}
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
        @forelse($orders as $order)
            <tr>
                <td>{{ $order->number }}</td>
                <td> {{ $order->user?->name ?? __("Guest") }}</td>
                <td> {{ $order->store->name }}</td>
                <td>{{ $order->total }}</td>
                <td>@if($order->status != "completed")
                        <span class="badge badge-danger">{{ $order->status }}</span>
                    @else
                        <span class="badge badge-success">{{ $order->status }}</span>
                    @endif</td>
                <td>
                    @can('orders.show')
                        <a href="{{ route("dashboard.orders.show", $order) }}"
                           class="btn btn-sm btn-outline-info">
                            <i class="fas fa-eye"></i>
                        </a>
                    @endcan
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center font-weight-bold">
                    {{ __("No data") }}
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    {{ $orders->links() }}

@endsection
