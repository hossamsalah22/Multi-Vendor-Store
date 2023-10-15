<!-- Start Single Product -->
<div class="single-product">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-4 col-12">
            <div class="product-image">
                <img src="{{ $product->image }}" alt="#">
                @if($product->new)
                    <span class="new-tag">{{ __("New") }}</span>
                @endif
                @if($product->discount)
                    <span class="sale-tag">{{ $product->discount }}%</span>
                @endif
                <div class="button">
                    <a href="product-details.html" class="btn"><i
                            class="lni lni-cart"></i> {{ __("Add To Cart") }}</a>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-12">
            <div class="product-info">
                <span class="category">{{ $product->category->name }}</span>
                <h4 class="title">
                    <a href="{{ route('website.products.show', $product) }} ">{{ $product->name }}</a>
                </h4>
                @if($product->rating)
                    <ul class="review">
                        @for ($i = 1; $i <= 5; $i++)
                            <li>
                                @if ($i <= $product->rating)
                                    <i class="lni lni-star-filled"></i>
                                @else
                                    <i class="lni lni-star"></i>
                                @endif
                            </li>
                        @endfor
                        <li><span>{{ $product->rating }} {{ __("Review(s)") }}</span></li>
                    </ul>
                @else
                    <ul class="review">
                        <li><span>{{ __("No Reviews") }}</span></li>
                    </ul>
                @endif
                <div class="price">
                    <span>{{ Currency::format($product->price) }}</span>
                    <span class="discount-price">{{ Currency::format($product->compare_price) }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Single Product -->
