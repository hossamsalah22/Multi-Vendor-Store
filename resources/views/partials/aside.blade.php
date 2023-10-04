<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route("dashboard.dashboard") }}" class="brand-link">
        <img src="{{ asset("dist/img/AdminLTELogo.png") }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">
            {{ config("app.name") }}
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ auth()->user()->image }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                {{--    Stores  --}}
                <li class="nav-item {{ request()->is("dashboard/stores*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("dashboard/stores*")? "active" : "" }}">
                        <i class="fas fa-store"></i>
                        <p>
                            Stores
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.stores.index") }}"
                               class="nav-link {{ request()->is("dashboard/stores")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.stores.create") }}"
                               class="nav-link {{ request()->is("dashboard/stores/create")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>


                {{--    Categories  --}}
                <li class="nav-item {{ request()->is("dashboard/categories*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("dashboard/categories*")? "active" : "" }}">
                        <i class="fas fa-folder"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.categories.index") }}"
                               class="nav-link {{ request()->is("dashboard/categories")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.categories.create") }}"
                               class="nav-link {{ request()->is("dashboard/categories/create")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--    Products    --}}
                <li class="nav-item {{ request()->is("dashboard/products*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("dashboard/products*")? "active" : "" }}">
                        <i class="fas fa-shopping-bag"></i>
                        <p>
                            Products
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.products.index") }}"
                               class="nav-link {{ request()->is("dashboard/products")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show All</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.products.create") }}"
                               class="nav-link {{ request()->is("dashboard/products/create")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--    Orders    --}}
                <li class="nav-item {{ request()->is("dashboard/orders*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("dashboard/orders*")? "active" : "" }}">
                        <i class="fas fa-shopping-cart"></i>
                        <p>
                            Orders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.orders.index") }}"
                               class="nav-link {{ request()->is("dashboard/orders")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Show All</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <form action="{{ route("logout") }}" method="POST">
                        @csrf
                        <a href="{{ route("logout") }}" class="nav-link"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
