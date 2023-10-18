<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        @foreach($items as $item)
            @can($item['name'].'.index')
                <li class="nav-item {{ request()->is($item['route'])? "menu-open" : "" }}">
                    <a href="#" class="nav-link {{ request()->is($item['route'])? "active" : "" }}">
                        <i class="{{ $item['main_icon'] }}"></i>
                        <p>
                            {{ __($item['title']) }}
                            <i class="{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if($item['show'])
                            <li class="nav-item">
                                <a href="{{ route($item['show']['route']) }}"
                                   class="nav-link {{ request()->is($item['show']['active'])? "active" : "" }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __("Show All") }}</p>
                                </a>
                            </li>
                        @endif
                        @if($item['create'])
                            @can($item['name'].'.create')
                                <li class="nav-item">
                                    <a href="{{ route($item['create']['route']) }}"
                                       class="nav-link {{ request()->is($item['create']['active'])? "active" : "" }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __("Create") }}</p>
                                    </a>
                                </li>
                            @endcan
                        @endif
                    </ul>
                </li>
            @endcan
        @endforeach

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Simple Link
                    <span class="{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} badge badge-danger">New</span>
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
