<?php
return [
    [
        "title" => "Sliders",
        "name" => "sliders",
        "route" => "admin/dashboard/sliders*",
        "main_icon" => "fas fa-image",
        "show" => [
            'route' => 'dashboard.sliders.index',
            'active' => 'admin/dashboard/sliders',
        ],
        "create" => [
            'route' => 'dashboard.sliders.create',
            'active' => 'admin/dashboard/sliders/create',
        ],
    ],
    [
        "title" => "Banners",
        "name" => "banners",
        "route" => "admin/dashboard/banners*",
        "main_icon" => "fas fa-image",
        "show" => [
            'route' => 'dashboard.banners.index',
            'active' => 'admin/dashboard/banners',
        ],
        "create" => [
            'route' => 'dashboard.banners.create',
            'active' => 'admin/dashboard/banners/create',
        ],
    ],
    [
        "title" => "Stores",
        "name" => "stores",
        "route" => "admin/dashboard/stores*",
        "main_icon" => "fas fa-store",
        "show" => [
            'route' => 'dashboard.stores.index',
            'active' => 'admin/dashboard/stores',
        ],
        "create" => [
            'route' => 'dashboard.stores.create',
            'active' => 'admin/dashboard/stores/create',
        ],
    ],
    [
        "title" => "Categories",
        "name" => "categories",
        "route" => "admin/dashboard/categories*",
        "main_icon" => "fas fa-list",
        "show" => [
            'route' => 'dashboard.categories.index',
            'active' => 'admin/dashboard/categories',
        ],
        "create" => [
            'route' => 'dashboard.categories.create',
            'active' => 'admin/dashboard/categories/create',
        ],
    ],
    [
        "title" => "Products",
        "name" => "products",
        "route" => "admin/dashboard/products*",
        "main_icon" => "fas fa-box",
        "show" => [
            'route' => 'dashboard.products.index',
            'active' => 'admin/dashboard/products',
        ],
        "create" => [
            'route' => 'dashboard.products.create',
            'active' => 'admin/dashboard/products/create',
        ],
    ],
    [
        "title" => "Orders",
        "name" => "orders",
        "route" => "admin/dashboard/orders*",
        "main_icon" => "fas fa-shopping-cart",
        "show" => [
            'route' => 'dashboard.orders.index',
            'active' => 'admin/dashboard/orders',
        ],
        "create" => null,
    ],
    [
        "title" => "Users",
        "name" => "users",
        "route" => "admin/dashboard/users*",
        "main_icon" => "fas fa-users",
        "show" => [
            'route' => 'dashboard.users.index',
            'active' => 'admin/dashboard/users',
        ],
        "create" => null,
    ],
    [
        "title" => "Admins",
        "name" => "admins",
        "route" => "admin/dashboard/admins*",
        "main_icon" => "fas fa-user-shield",
        "show" => [
            'route' => 'dashboard.admins.index',
            'active' => 'admin/dashboard/admins',
        ],
        "create" => [
            'route' => 'dashboard.admins.create',
            'active' => 'admin/dashboard/admins/create',
        ],
    ],
    [
        "title" => "Roles",
        "name" => "roles",
        "route" => "admin/dashboard/roles*",
        "main_icon" => "fas fa-user-shield",
        "show" => [
            'route' => 'dashboard.roles.index',
            'active' => 'admin/dashboard/roles',
        ],
        "create" => [
            'route' => 'dashboard.roles.create',
            'active' => 'admin/dashboard/roles/create',
        ],
    ]
];
