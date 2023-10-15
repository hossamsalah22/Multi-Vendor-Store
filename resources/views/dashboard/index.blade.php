@extends("layouts.index")
@section("title")
    {{ __("Dashboard") }}
@endsection
@section("content")
    <div class="row">
        <x-dashboard.home-cards :variable="$categories" label="Categories Available"
                                route="{!!  route('dashboard.categories.index') !!}" icon="ion ion-pie-graph"
                                color="bg-info"/>

        <x-dashboard.home-cards :variable="$stores" label="Stores Available"
                                route="{!! route('dashboard.stores.index') !!}"
                                icon="ion ion-stats-bars"/>

        <x-dashboard.home-cards :variable="$products" label="Products Available"
                                route="{!! route('dashboard.products.index') !!}"
                                icon="ion ion-person-add" color="bg-danger"/>

        <x-dashboard.home-cards :variable="$orders" label="Orders Available"
                                route="{!! route('dashboard.orders.index') !!}"
                                icon="ion ion-pie-graph" color="bg-warning"/>

        <x-dashboard.home-cards :variable="$users" label="Users Available"
                                route="{!! route('dashboard.users.index') !!}"
                                icon="ion ion-stats-bars" color="bg-info"/>

        <x-dashboard.home-cards :variable="$admins" label="Admins Available"
                                route="{!! route('dashboard.admins.index') !!}"
                                icon="ion ion-person-add" color="bg-success"/>
    </div>
@endsection
