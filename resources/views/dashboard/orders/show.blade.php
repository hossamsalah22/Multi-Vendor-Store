@extends("layouts.index")
@section("title", "Order No. ($order->number)")
@section("breadcrumbs")
    @parent
    <li class="breadcrumb-item active">
        <a href="{{ route("dashboard.orders.index") }}">Orders</a>
    </li>
    <li class="breadcrumb-item active">{{ $order->number }}</li>
@endsection
@section("content")
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="col-12">
                    <h3 class="my-3">Customer Info</h3>
                    <h5>Name: {{ $order->user->name }}</h5>
                    <h5>Email: {{ $order->user->email }}</h5>
                    <h5>Phone: {{ $order->user->phone_number }}</h5>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3">Store Info</h3>
                <h5>Name: {{ $order->store->name }}</h5>
                <h5>Status: {{ $order->store->active ? "Active" : "Inactive" }}</h5>
                <div class="row">
                    {{-- Loop through the products associated with the order --}}
                    @foreach($order->products as $product)
                        <div class="col-6">
                            <h4>Products</h4>
                            <a href="{{ route('dashboard.products.show', $product) }}"
                               class="btn btn-default">{{ $product->name }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <h3 class="my-3">{{ "Billing Address" }}</h3>
                    <p>Full Name: {{ $order->billingAddress->name }}</p>
                    <p>Email: {{ $order->billingAddress?->email ?? "No Email" }}</p>
                    <p>Phone: {{ $order->billingAddress->phone_number }}</p>
                    <p>Address: {{ $order->billingAddress->address }}</p>
                    <p>City: {{ $order->billingAddress?->city }}</p>
                    <p>State: {{ $order->billingAddress?->state }}</p>
                    <p>Country: {{ $order->billingAddress->country_name }}</p>
                    <p>Postal Code: {{ $order->billingAddress->postal_code }}</p>
                    <hr>
                </div>
                <div class="col-6">
                    <h3 class="my-3">{{ "Shipping Address" }}</h3>
                    <p>Full Name: {{ $order->shippingAddress->name }}</p>
                    <p>Email: {{ $order->shippingAddress?->email ?? "No Email" }}</p>
                    <p>Phone: {{ $order->shippingAddress->phone_number }}</p>
                    <p>Address: {{ $order->shippingAddress->address }}</p>
                    <p>City: {{ $order->shippingAddress?->city }}</p>
                    <p>State: {{ $order->shippingAddress?->state }}</p>
                    <p>Country: {{ $order->shippingAddress->country_name }}</p>
                    <p>Postal Code: {{ $order->shippingAddress->postal_code }}</p>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-4">
                    <h4>Status</h4>
                    <div class="bg-gradient-{{ $order->status == "completed" ? "success" : "danger" }} py-2 px-3 mt-4">
                        {{ $order->status }}
                    </div>
                </div>

                <div class="col-4">
                    <h4>Payment Status</h4>
                    <div
                        class="bg-gradient-{{ $order->payment_status == "paid" ? "success" : "danger" }} py-2 px-3 mt-4">
                        {{ $order->payment_status }}
                    </div>
                </div>

                <div class="col-4">
                    <h4>Payment Method</h4>
                    <div
                        class="bg-gradient-{{ $order->payment_status == "paid" ? "success" : "danger" }} py-2 px-3 mt-4">
                        {{ $order->payment_method }}
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-4">
                    <h4>Created at</h4>
                    <div class="bg-gradient-info py-2 px-3 mt-4">
                        {{ $order->created_at->diffForHumans() }}
                    </div>
                </div>

                <div class="col-4">
                    <h4>Updated at</h4>
                    <div class="bg-gradient-info py-2 px-3 mt-4">
                        {{ $order->updated_at->diffForHumans() }}
                    </div>
                </div>

                <div class="col-4">
                    <h4>Deleted at</h4>
                    <div class="bg-gradient-danger py-2 px-3 mt-4">
                        {{ $order->deleted_at ? $order->deleted_at->diffForHumans() : "Null" }}
                    </div>
                </div>
            </div>
            <div class="bg-gradient-{{ $order->status == "completed" ? "success" : "danger" }} py-2 px-3 mt-4">
                <h2 class="mb-0">
                    Status: {{ $order->status }}
                </h2>
            </div>
            <div class="bg-gradient-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                    Price: {{ Currency::format($order->total) }}
                </h2>
            </div>
        </div>
    </div>
@endsection
