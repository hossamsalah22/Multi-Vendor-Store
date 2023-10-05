<x-front-layout title="Checkout">
    <x-slot name="breadcrumb">
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Checkout</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('website.home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="{{ route('website.products.index') }}">Shop</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot>
    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form action="{{ route('website.checkout.store') }}" method="post">
                        @csrf
                        <div class="checkout-steps-form-style-1">
                            <ul id="accordionExample">
                                <li>
                                    <h6 class="title" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree"
                                        aria-expanded="true" aria-controls="collapseThree">Your Personal Details </h6>
                                    <section class="checkout-steps-form-content collapse show" id="collapseThree"
                                             aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <x-form.input name="addr[billing][first_name]"
                                                                          placeholder="First Name" label="First Name"/>
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <x-form.input name="addr[billing][last_name]"
                                                                          placeholder="Last Name" label="Last Name"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="addr[billing][email]" type="email"
                                                                      placeholder="Email Address"
                                                                      label="Email Address"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="addr[billing][phone_number]"
                                                                      placeholder="Phone Number" label="Phone Number"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="addr[billing][address]" label="Address"
                                                                      placeholder="Address"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="addr[billing][city]" label="City"
                                                                      placeholder="City"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="addr[billing][postal_code]"
                                                                      label="Postal Code" placeholder="Postal Code"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.select-country name="addr[billing][country]"
                                                                               label="Country"
                                                                               placeholder="Select Country"
                                                                               :options="$countries"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="select-items">
                                                        <x-form.input name="addr[billing][state]"
                                                                      label="State" placeholder="State"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-checkbox checkbox-style-3">
                                                    <input type="checkbox" id="checkbox-3">
                                                    <label for="checkbox-3"><span></span></label>
                                                    <p>My delivery and mailing addresses are the
                                                        same.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" data-bs-toggle="collapse"
                                                            data-bs-target="#collapseFour" aria-expanded="true"
                                                            aria-controls="collapseFour"
                                                            onclick="event.preventDefault();">next
                                                        step
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                        aria-expanded="false" aria-controls="collapseFour">Shipping Address</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapseFour"
                                             aria-labelledby="headingFour" data-bs-parent="#accordionExample" style="">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <div class="row">
                                                        <div class="col-md-6 form-input form">
                                                            <x-form.input name="addr[shipping][first_name]"
                                                                          placeholder="First Name" label="First Name"/>
                                                        </div>
                                                        <div class="col-md-6 form-input form">
                                                            <x-form.input name="addr[shipping][last_name]"
                                                                          placeholder="Last Name" label="Last Name"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="addr[shipping][email]" type="email"
                                                                      placeholder="Email Address"
                                                                      label="Email Address"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="addr[shipping][phone_number]"
                                                                      placeholder="Phone Number" label="Phone Number"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="addr[shipping][address]" label="Address"
                                                                      placeholder="Address"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="addr[shipping][city]" label="City"
                                                                      placeholder="City"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.input name="addr[shipping][postal_code]"
                                                                      label="Postal Code" placeholder="Postal Code"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="form-input form">
                                                        <x-form.select-country name="addr[shipping][country]"
                                                                               label="Country"
                                                                               placeholder="Select Country"
                                                                               :options="$countries"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <div class="select-items">
                                                        <x-form.input name="addr[shipping][state]"
                                                                      label="State" placeholder="State"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <div class="checkout-payment-option">
                                                        <h6 class="heading-6 font-weight-400 payment-title">Select
                                                            Delivery
                                                            Option</h6>
                                                        <div class="payment-option-wrapper">
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" checked=""
                                                                       id="shipping-1">
                                                                <label for="shipping-1">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                         alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-2">
                                                                <label for="shipping-2">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                         alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-3">
                                                                <label for="shipping-3">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                         alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                            <div class="single-payment-option">
                                                                <input type="radio" name="shipping" id="shipping-4">
                                                                <label for="shipping-4">
                                                                    <img src="https://via.placeholder.com/60x32"
                                                                         alt="Sipping">
                                                                    <p>Standerd Shipping</p>
                                                                    <span class="price">$10.50</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="steps-form-btn button">
                                                        <button class="btn collapsed" type="submit">Checkout
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                                <li>
                                    <h6 class="title collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive"
                                        aria-expanded="false" aria-controls="collapsefive">Payment Info</h6>
                                    <section class="checkout-steps-form-content collapse" id="collapsefive"
                                             aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="checkout-payment-form">
                                                    <div class="single-form form-default">
                                                        <label>Cardholder Name</label>
                                                        <div class="form-input form">
                                                            <input type="text" placeholder="Cardholder Name">
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default">
                                                        <label>Card Number</label>
                                                        <div class="form-input form">
                                                            <input id="credit-input" type="text"
                                                                   placeholder="0000 0000 0000 0000">
                                                            <img src="{{ asset('assets/images/payment/card.png') }}"
                                                                 alt="card">
                                                        </div>
                                                    </div>
                                                    <div class="payment-card-info">
                                                        <div class="single-form form-default mm-yy">
                                                            <label>Expiration</label>
                                                            <div class="expiration d-flex">
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="MM">
                                                                </div>
                                                                <div class="form-input form">
                                                                    <input type="text" placeholder="YYYY">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-form form-default">
                                                            <label>CVC/CVV <span><i
                                                                        class="mdi mdi-alert-circle"></i></span></label>
                                                            <div class="form-input form">
                                                                <input type="text" placeholder="***">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-form form-default button">
                                                        <button class="btn" type="submit">pay now</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Apply Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>

                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Subtotal Price:</p>
                                    <p class="price">{{ Currency::format($cart->total()) }}</p>
                                </div>
                                <div class="total-price shipping">
                                    <p class="value">Shipping Price:</p>
                                    <p class="price">{{ Currency::format(0) }}</p>
                                </div>
                                <div class="total-price discount">
                                    <p class="value">Discount Price:</p>
                                    <p class="price">{{ Currency::format(0) }}</p>
                                </div>
                            </div>

                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subtotal Price:</p>
                                    <p class="price">{{ Currency::format($cart->total()) }}</p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <button class="btn btn-alt">Checkout</button>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="https://via.placeholder.com/400x330" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        {!! JsValidator::formRequest('App\Http\Requests\Website\Order\CreateRequest'); !!}
    @endpush
</x-front-layout>
