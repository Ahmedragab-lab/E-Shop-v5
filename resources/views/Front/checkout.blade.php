@extends('Front.frontlayout.master')
@section('title')
  empty
@endsection
@section('css')

@endsection
@section('content')
<!--main area-->
<main id="main" class="main-site">
    <div>
		<div class="container">
			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="#" class="link">home</a></li>
					<li class="item-link"><span>login</span></li>
				</ul>
			</div>
            <form  action="{{ route('checkout.store') }}" method="POST" autocomplete="off" name="frm-billing">
            @csrf
                <div class=" main-content-area col-md-7 ">
                    <div class="wrap-address-billing">
                        <h3 class="box-title">client information</h3>
                        <p class="row-in-form">
                            <label for="fname"> name<span>*</span></label>
                            <input id="fname" type="text" name="name"  value="{{ Auth::user()->name }}" readonly>
                        </p>
                        {{-- <p class="row-in-form">
                            <label for="lname">last name<span>*</span></label>
                            <input id="lname" type="text" name="lname" value="" placeholder="Your last name">
                        </p> --}}
                        <p class="row-in-form">
                            <label for="email">Email Addreess:</label>
                            <input id="email" type="email" name="email" value="{{ Auth::user()->email }}" placeholder="Type your email" readonly>
                        </p>
                        {{-- <p class="row-in-form">
                            <label for="phone">Phone number<span>*</span></label>
                            <input id="phone" type="number" name="phone" value="" placeholder="10 digits format">
                        </p> --}}
                        {{-- <p class="row-in-form">
                            <label for="add">Address:</label>
                            <input id="add" type="text" name="add" value="" placeholder="Street at apartment number">
                        </p> --}}
                        {{-- <p class="row-in-form">
                            <label for="country">Country<span>*</span></label>
                            <input id="country" type="text" name="country" value="" placeholder="United States">
                        </p> --}}
                        {{-- <p class="row-in-form">
                            <label for="zip-code">Postcode / ZIP:</label>
                            <input id="zip-code" type="number" name="zip-code" value="" placeholder="Your postal code">
                        </p> --}}
                        {{-- <p class="row-in-form">
                            <label for="city">Town / City<span>*</span></label>
                            <input id="city" type="text" name="city" value="" placeholder="City name">
                        </p> --}}
                        {{-- <p class="row-in-form fill-wife">
                            <label class="checkbox-field">
                                <input name="create-account" id="create-account" value="forever" type="checkbox">
                                <span>Create an account?</span>
                            </label>
                            <label class="checkbox-field">
                                <input name="different-add" id="different-add" value="forever" type="checkbox">
                                <span>Ship to a different address?</span>
                            </label>
                        </p> --}}
                    </div>
                </div>
                <div class="col-md-5 ">
                    <div class="columns is-variable is-multiline is-centered ">
                        <div class="column is-10 ">
                            <h1 class="heading-title style-1">Order Details</h1>
                            <br>
                            @php
                                $total_price = 0;
                                $total_tax = 0;
                                $total = 0;
                            @endphp
                            <table class="table is-fullwidth is-hoverable ">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total Price</th>
                                    <th>Tax (14%)</th>
                                </tr>
                                </thead>
                                <tbody class="overflow-scroll">
                                    @foreach ($cartitems as $item)
                                    <tr >
                                        <td><img src="{{ asset('uploads/product/'.$item->product->image) }}" alt="" width="50px"></td>
                                        <td>{{ $item->product->product_name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>{{ number_format($item->product->selling_price)}}</td>
                                        <td>{{ number_format($item->sum)}}</td>
                                        <td>{{ number_format($item->tax) }}</td>
                                    </tr>
                                    @php
                                        $total_price += $item->sum;
                                        $total_tax += $item->tax;
                                        $total += $item->product->selling_price;
                                    @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <table class="table is-fullwidth is-hoverable">
                                <thead>
                                <tr>
                                    <th>total price</th>
                                    <th>total tax</th>
                                    <th>total </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ number_format($total_price) }} LE</td>
                                        <td>{{ number_format($total_tax) }} LE</td>
                                        <td>{{ number_format($total_price+$total_tax) }} LE</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="m-auto text-center">
                            <button type="submit" class="btn text-light  save-data rounded-pill " style="background:#cf5029">Order Now</button>
                            </div>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </form>
            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Payment Method</h4>
                    <p class="summary-info"><span class="title">Check / Money order</span></p>
                    <p class="summary-info"><span class="title">Credit Cart (saved)</span></p>
                    <div class="choose-payment-methods">
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="bank" type="radio">
                            <span>Direct Bank Transder</span>
                            <span class="payment-desc">But the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-visa" value="visa" type="radio">
                            <span>visa</span>
                            <span class="payment-desc">There are many variations of passages of Lorem Ipsum available</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio">
                            <span>Paypal</span>
                            <span class="payment-desc">You can pay with your credit</span>
                            <span class="payment-desc">card if you don't have a paypal account</span>
                        </label>
                    </div>
                    <p class="summary-info grand-total"><span>Grand Total</span> <span class="grand-total-price">$100.00</span></p>
                    <a href="thankyou.html" class="btn btn-medium">Place order now</a>
                </div>
                <div class="summary-item shipping-method">
                    <h4 class="title-box f-title">Shipping method</h4>
                    <p class="summary-info"><span class="title">Flat Rate</span></p>
                    <p class="summary-info"><span class="title">Fixed $50.00</span></p>
                    <h4 class="title-box">Discount Codes</h4>
                    <p class="row-in-form">
                        <label for="coupon-code">Enter Your Coupon code:</label>
                        <input id="coupon-code" type="text" name="coupon-code" value="" placeholder="">
                    </p>
                    <a href="#" class="btn btn-small">Apply</a>
                </div>
            </div>
            <div class="wrap-show-advance-info-box style-1 box-in-site">
                <h3 class="title-box">Most Viewed Products</h3>
                <div class="wrap-products">
                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_17.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_15.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_01.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_21.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_03.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><ins><p class="product-price">$168.00</p></ins> <del><p class="product-price">$250.00</p></del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_04.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item new-label">new</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="#" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="assets/images/products/digital_05.jpg" width="214" height="214" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item bestseller-label">Bestseller</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>
                    </div>
                </div><!--End wrap-products-->
            </div>
		</div><!--end main content area-->
	</div><!--end container-->
</main>
	<!--main area-->

@endsection
@section('js')

@endsection
