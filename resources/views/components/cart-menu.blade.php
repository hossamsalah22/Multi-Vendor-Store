<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">{{ $items->count() }}</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{ $items->count() .' ' . __("Items")}}</span>
            <a href="{{ route('website.cart.index') }}">{{ __("View Cart") }}</a>
        </div>
        <ul class="shopping-list">
            @foreach($items as $item)
                <li>
                    <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                            class="lni lni-close"></i></a>
                    <div class="cart-img-head">
                        <a class="cart-img" href="{{ route('website.products.show', $item->product) }}"><img
                                src="{{ $item->product->image }}"
                                alt="#"></a>
                    </div>

                    <div class="content">
                        <h4><a href="{{ route('website.products.show', $item->product) }}">
                                {{ $item->product->name }}</a></h4>
                        <p class="quantity">{{$item->quantity}}x - <span
                                class="amount">{{Currency::format($item->product->price)}}</span></p>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="bottom">
            <div class="total">
                <span>{{ __("Total") }}</span>
                <span class="total-amount">{{ Currency::format($total) }}</span>
            </div>
            <div class="button">
                <a href="{{ route('website.checkout.create') }}" class="btn animate">{{ __("Checkout") }}</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>
