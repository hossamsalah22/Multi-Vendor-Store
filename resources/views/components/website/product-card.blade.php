<!-- Start Single Product -->
<div class="single-product">
    <div class="product-image">
        <img src="{{ $product->image }}" alt="{{ $product->name }}" height="100%">
        @if($product->new)
            <span class="new-tag">New</span>
        @endif
        @if($product->discount)
            <span class="sale-tag">{{ $product->discount }}%</span>
        @endif
        <div class="button">
            <a href="#" class="btn"><i class="lni lni-cart"></i> Add to
                Cart</a>
        </div>
    </div>
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
                <li><span>{{ $product->rating }} Review(s)</span></li>
            </ul>
        @else
            <ul class="review">
                <li><span>No Reviews</span></li>
            </ul>
        @endif
        <div class="price">
            <span>{{ Currency::format($product->price) }}</span>
            @if($product->compare_price)
                <span class="discount-price">{{ Currency::format($product->compare_price) }}</span>
            @endif
        </div>
    </div>
</div>
<!-- End Single Product -->
