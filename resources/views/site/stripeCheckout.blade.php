


@extends('layouts.site')

@section('stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection

@section('content')
    <div class="container py-5">
        {{-- pet checkout --}}
        {{-- vogaxe8337@miqlab.com --}}
        <div class="row mb-n4 pt-5">

            <div class="col-lg-6 col-12 mb-4">

                <!-- Your Order Area Start -->
                <div class="your-order-area border">

                    <!-- Title Start -->
                    <h3 class="title">Your order</h3>
                    <!-- Title End -->

                    <!-- Your Order Table Start -->
                    <div class="your-order-table table-responsive">
                        <table class="table">

                            <!-- Table Head Start -->
                            <thead>
                                <tr class="cart-product-head">
                                    <th class="cart-product-name text-start">Product</th>
                                    <th class="cart-product-total text-end">Total</th>
                                </tr>
                            </thead>
                            <!-- Table Head End -->
                            @php
                                $totalAmount = 0;
                                $deliveryCharge = 50;
                            @endphp
                            <!-- Table Body Start -->
                            <tbody>
                                @foreach ($cartItems as $item)
                                    <tr class="cart_item">
                                        <td class="cart-product-name text-start ps-0"> {{ $item->name }}<strong
                                                class="product-quantity"> × {{ $item->qty }}</strong></td>
                                        <td class="cart-product-total text-end pe-0"><span
                                                class="amount">${{ $item->subtotal }}</span></td>
                                    </tr>
                                    @php
                                        $totalAmount += $item->subtotal;
                                    @endphp
                                @endforeach
                            </tbody>
                            <!-- Table Body End -->

                            <!-- Table Footer Start -->
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th class="text-start ps-0">Cart Subtotal</th>
                                    <td class="text-end pe-0"><span class="amount">${{ $totalAmount }}</span></td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th class="text-start ps-0">Delivery Charge</th>
                                    <td class="text-end pe-0"><span class="amount">${{ $deliveryCharge }}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th class="text-start ps-0">Order Total</th>
                                    <td class="text-end pe-0"><strong><span
                                                class="amount">৳{{ $deliveryCharge + $totalAmount }}</span></strong></td>
                                </tr>
                            </tfoot>
                            <!-- Table Footer End -->

                        </table>
                    </div>
                    <!-- Your Order Table End -->

                </div>
                <!-- Your Order Area End -->
            </div>

            <div class="col-lg-6 col-12 mb-4">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-bs-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif
                <!-- Checkbox Form Start -->
                <form role="form" action="{{ route('order.place') }}" method="post" class="require-validation"
                    data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <input value="{{ $deliveryCharge + $totalAmount }}" type="hidden" name="amount" id="amount">

                    <div class="checkbox-form">

                        <!-- Checkbox Form Title Start -->
                        <h3 class="title">Shipping Details</h3>
                        <!-- Checkbox Form Title End -->

                        <div class="row">
                            <!-- First Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Name<span class="required">*</span></label>
                                    <input id="shipping_name" value="{{$auth->full_name}}" name="name" placeholder="Name" type="text">
                                </div>
                            </div>
                            <!-- First Name Input End -->

                            <!-- Email Address Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input id="email" value="{{$auth->email}}" name="email" placeholder="" type="email">
                                </div>
                            </div>
                            <!-- Email Address Input End -->

                            <!-- Phone Number Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input id="phone" name="phone" type="text">
                                </div>
                            </div>

                            <!-- Address Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input id="shipping_address" name="shipping_address"
                                        placeholder="Street address/ House no" type="text">
                                </div>
                            </div>
                            <!-- Address Input End -->

                            <!-- Town or City Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Shipping Address <span class="required">*</span></label>
                                    <input id="shipping_city" name="city" placeholder="City name" type="text">
                                </div>
                            </div>
                            <!-- Town or City Name Input End -->

                            <!-- Postcode or Zip Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input id="shipping_postcode" name="post_code" placeholder="2231" type="text">
                                </div>
                            </div>
                            <!-- Postcode or Zip Input End -->

                            <br>
                            {{--  <div class="form-group col-lg-4">
                                <label>Paypal</label>
                                <input type="radio" name="payment_type">
                            </div>  --}}
                            <div class="form-group col-lg-4">
                                <label>Bkash/Rocket/Nogod </label>
                                <input type="radio" name="payment_type" value="Aamarpay">
                            </div>
                            <div class="form-group col-lg-4">
                                <label>Hand Cash</label>
                                <input type="radio" name="payment_type" value="Hand cash" checked="">
                            </div>

                        </div>
                    </div>
                    {{--  <h3 class="title border-1 fw-bold pb-3 border-bottom">Payment Details</h3>
                    <div class='form-row row mt-3'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Name on Card</label> <input class='form-control' name="card_name"
                                size='4' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 form-group required'>
                            <label class='control-label'>Card Number</label> <input autocomplete='off' name="card_number"
                                class='form-control card-number' size='20' type='text'>
                        </div>
                    </div>

                    <div class='form-row row'>
                        <div class='col-xs-12 col-md-4 form-group cvc required'>
                            <label class='control-label'>CVC</label> <input autocomplete='off' name="cvc"
                                class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Month</label>
                            <input name="expiration" class='form-control card-expiry-month' placeholder='MM' size='2'
                                type='text'>
                        </div>
                        <div class='col-xs-12 col-md-4 form-group expiration required'>
                            <label class='control-label'>Expiration Year</label> <input
                                class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                        </div>
                    </div>  --}}

                    <div class='form-row row'>
                        <div class='col-md-12 error form-group hide'>
                            <div class='alert-danger alert'>Please correct the errors
                                and try
                                again.</div>
                        </div>
                    </div>
                    <div class="order-button-payment">
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Place Order
                                    (৳{{ $deliveryCharge + $totalAmount }})</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Checkbox Form End -->

            </div>
        </div>
        {{-- end pet checkout --}}

    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection
