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
                <img src="{{ auth()->guard('admin')->user()->image }}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.edit') }}" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="{{ __("Search") }}"
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

                {{--    Sliders  --}}
                <li class="nav-item {{ request()->is("admin/dashboard/sliders*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("admin/dashboard/sliders*")? "active" : "" }}">
                        <i class="fas fa-image"></i>
                        <p>
                            {{ __("Sliders") }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.sliders.index") }}"
                               class="nav-link {{ request()->is("admin/dashboard/sliders")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Show All") }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.sliders.create") }}"
                               class="nav-link {{ request()->is("admin/dashboard/sliders/create")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Create") }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--    Banners  --}}
                <li class="nav-item {{ request()->is("admin/dashboard/banners*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("admin/dashboard/banners*")? "active" : "" }}">
                        <i class="fas fa-image"></i>
                        <p>
                            {{ __("Banners") }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.banners.index") }}"
                               class="nav-link {{ request()->is("admin/dashboard/banners")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Show All") }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.banners.create") }}"
                               class="nav-link {{ request()->is("admin/dashboard/banners/create")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Create") }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--    Stores  --}}
                <li class="nav-item {{ request()->is("admin/dashboard/stores*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("admin/dashboard/stores*")? "active" : "" }}">
                        <i class="fas fa-store"></i>
                        <p>
                            {{ __("Stores") }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.stores.index") }}"
                               class="nav-link {{ request()->is("admin/dashboard/stores")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Show All") }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.stores.create") }}"
                               class="nav-link {{ request()->is("admin/dashboard/stores/create")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Create") }}</p>
                            </a>
                        </li>
                    </ul>
                </li>


                {{--    Categories  --}}
                <li class="nav-item {{ request()->is("admin/dashboard/categories*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("admin/dashboard/categories*")? "active" : "" }}">
                        <i class="fas fa-folder"></i>
                        <p>
                            {{ __("Categories") }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.categories.index") }}"
                               class="nav-link {{ request()->is("admin/dashboard/categories")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Show All") }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.categories.create") }}"
                               class="nav-link {{ request()->is("admin/dashboard/categories/create")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Create") }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--    Products    --}}
                <li class="nav-item {{ request()->is("admin/dashboard/products*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("admin/dashboard/products*")? "active" : "" }}">
                        <i class="fas fa-shopping-bag"></i>
                        <p>
                            {{ __("Products") }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.products.index") }}"
                               class="nav-link {{ request()->is("admin/dashboard/products")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Show All") }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.products.create") }}"
                               class="nav-link {{ request()->is("admin/dashboard/products/create")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Create") }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--    Orders    --}}
                <li class="nav-item {{ request()->is("admin/dashboard/orders*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("admin/dashboard/orders*")? "active" : "" }}">
                        <i class="fas fa-shopping-cart"></i>
                        <p>
                            {{ __("Orders") }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.orders.index") }}"
                               class="nav-link {{ request()->is("admin/dashboard/orders")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Show All") }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--    Users    --}}
                <li class="nav-item {{ request()->is("admin/dashboard/users*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("admin/dashboard/users*")? "active" : "" }}">
                        <i class="fas fa-user"></i>
                        <p>
                            {{ __("Users") }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.users.index") }}"
                               class="nav-link {{ request()->is("admin/dashboard/users")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Show All") }}</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--    Admins    --}}
                <li class="nav-item {{ request()->is("admin/dashboard/admins*")? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is("admin/dashboard/admins*")? "active" : "" }}">
                        <i class="fas fa-users"></i>
                        <p>
                            {{ __("Admins") }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route("dashboard.admins.index") }}"
                               class="nav-link {{ request()->is("admin/dashboard/admins")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Show All") }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route("dashboard.admins.create") }}"
                               class="nav-link {{ request()->is("admin/dashboard/admins/create")? "active" : "" }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ __("Create") }}</p>
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
