<x-front-layout title="Products">
    <x-slot name="breadcrumb">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Products</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('website.home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li>Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- Start Product Sidebar -->
                    <div class="product-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget search">
                            <h3>Search Product</h3>
                            <form action="#">
                                <input type="text" placeholder="Search Here...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <h3>All Categories</h3>
                            <ul class="list">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{ route('website.products.index', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <!-- End Product Sidebar -->
                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <label for="sorting">Sort by:</label>
                                        <select class="form-control" id="sorting">
                                            <option>Popularity</option>
                                            <option>Low - High Price</option>
                                            <option>High - Low Price</option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>
                                        <h3 class="total-show-product">
                                            Showing:
                                            <span>{{ $products->lastItem() }} - {{ \App\Models\Product::count() }} Products</span>
                                        </h3>

                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-grid" type="button" role="tab"
                                                    aria-controls="nav-grid" aria-selected="true"><i
                                                    class="lni lni-grid-alt"></i></button>
                                            <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                                    data-bs-target="#nav-list" type="button" role="tab"
                                                    aria-controls="nav-list" aria-selected="false"><i
                                                    class="lni lni-list"></i></button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                 aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @foreach($products as $product)
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <!-- Start Single Product -->
                                            <x-website.product-card :product="$product"/>
                                            <!-- End Single Product -->
                                        </div>
                                    @endforeach
                                </div>
                                <div class="pagination left">
                                    <ul class="pagination-list">
                                        @if ($products->onFirstPage())
                                            <li class="disabled"><span>&laquo;</span></li>
                                        @else
                                            <li><a href="{{ $products->previousPageUrl() }}">&laquo;</a></li>
                                        @endif

                                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                            @if ($page == $products->currentPage())
                                                <li class="active"><a href="javascript:void(0)"
                                                                      onclick="event.preventDefault();">{{ $page }}</a>
                                                </li>
                                            @else
                                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        @if ($products->hasMorePages())
                                            <li><a href="{{ $products->nextPageUrl() }}">&raquo;</a></li>
                                        @else
                                            <li class="disabled"><span>&raquo;</span></li>
                                        @endif
                                    </ul>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <!-- Start Single Product -->
                                        @foreach($products as $product)
                                            <x-website.product-list :product="$product"/>
                                        @endforeach
                                        <!-- End Single Product -->
                                    </div>
                                </div>
                                <div class="pagination left">
                                    <ul class="pagination-list">
                                        @if ($products->onFirstPage())
                                            <li class="disabled"><span>&laquo;</span></li>
                                        @else
                                            <li><a href="{{ $products->previousPageUrl() }}">&laquo;</a></li>
                                        @endif

                                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                                            @if ($page == $products->currentPage())
                                                <li class="active"><a href="javascript:void(0)"
                                                                      onclick="event.preventDefault();">{{ $page }}</a>
                                                </li>
                                            @else
                                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                                            @endif
                                        @endforeach

                                        @if ($products->hasMorePages())
                                            <li><a href="{{ $products->nextPageUrl() }}">&raquo;</a></li>
                                        @else
                                            <li class="disabled"><span>&raquo;</span></li>
                                        @endif
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grids -->
</x-front-layout>
