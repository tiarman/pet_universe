{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel - Stripe Payment Gateway Integration Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    
<div class="container">
    
    <h1>Laravel - Stripe Payment Gateway Integration Example <br/> ItSolutionStuff.com</h1>
    
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                        <h3 class="panel-title" >Payment Details</h3>
                </div>
                <div class="panel-body">
    
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
    
                    <form 
                            role="form" 
                            action="{{ route('stripe.post') }}" 
                            method="post" 
                            class="require-validation"
                            data-cc-on-file="false"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                            id="payment-form">
                        @csrf
    
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' name="card_name" size='4' type='text'>
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' name="card_number" class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off' name="cvc"
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input    name="expiration"
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                            </div>
                        </div>
                            
                    </form>
                </div>
            </div>        
        </div>
    </div>
        
</div>
    
</body>
    
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
$(function() {
  
    /*------------------------------------------
    --------------------------------------------
    Stripe Payment Code
    --------------------------------------------
    --------------------------------------------*/
    
    var $form = $(".require-validation");
     
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
    
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
     
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    
    });
      
    /*------------------------------------------
    --------------------------------------------
    Stripe Response Handler
    --------------------------------------------
    --------------------------------------------*/
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];
                 
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
</html> --}}


@extends('layouts.site')

@section('stylesheet')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection

@section('content')
    <div class="container">
        {{-- pet checkout --}}
        <div class="row mb-n4">
            <div class="col-lg-6 col-12 mb-4">

                <!-- Checkbox Form Start -->
                <form action="#">
                    <div class="checkbox-form">

                        <!-- Checkbox Form Title Start -->
                        <h3 class="title">Billing Details</h3>
                        <!-- Checkbox Form Title End -->

                        <div class="row">

                            <!-- Select Country Name Start -->
                            <div class="col-md-12 mb-6">
                                <div class="country-select">
                                    <label>Country <span class="required">*</span></label>
                                    <select class="myniceselect nice-select wide rounded-0">
                                        <option data-display="Bangladesh">Bangladesh</option>
                                        <option value="uk">London</option>
                                        <option value="rou">Romania</option>
                                        <option value="fr">French</option>
                                        <option value="de">Germany</option>
                                        <option value="aus">Australia</option>
                                    </select>
                                </div>
                            </div>
                            <!-- Select Country Name End -->

                            <!-- First Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>First Name <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <!-- First Name Input End -->

                            <!-- Last Name Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Last Name <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <!-- Last Name Input End -->

                            <!-- Company Name Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Company Name</label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <!-- Company Name Input End -->

                            <!-- Address Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Address <span class="required">*</span></label>
                                    <input placeholder="Street address" type="text">
                                </div>
                            </div>
                            <!-- Address Input End -->

                            <!-- Optional Text Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                </div>
                            </div>
                            <!-- Optional Text Input End -->

                            <!-- Town or City Name Input Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Town / City <span class="required">*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <!-- Town or City Name Input End -->

                            <!-- State or Country Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>State / County <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <!-- State or Country Input End -->

                            <!-- Postcode or Zip Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Postcode / Zip <span class="required">*</span></label>
                                    <input placeholder="" type="text">
                                </div>
                            </div>
                            <!-- Postcode or Zip Input End -->

                            <!-- Email Address Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Email Address <span class="required">*</span></label>
                                    <input placeholder="" type="email">
                                </div>
                            </div>
                            <!-- Email Address Input End -->

                            <!-- Phone Number Input Start -->
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text">
                                </div>
                            </div>
                            <!-- Phone Number Input End -->

                            <!-- Checkout Form List checkbox Start -->
                            <div class="col-md-12">
                                <div class="checkout-form-list create-acc">
                                    <input id="cbox" type="checkbox">
                                    <label for="cbox" class="checkbox-label">Create an account?</label>
                                </div>
                                <div id="cbox-info" class="checkout-form-list create-account">
                                    <p class="mb-2">Create an account by entering the information below. If you are a
                                        returning customer please login at the top of the page.</p>
                                    <label>Account password <span class="required">*</span></label>
                                    <input placeholder="Password" type="password">
                                </div>
                            </div>
                            <!-- Checkout Form List checkbox End -->

                        </div>

                        <!-- Different Address Start -->
                        <div class="different-address">
                            <!-- Ship Different Title Checkbox Start -->
                            <div class="ship-different-title">
                                <div>
                                    <input id="ship-box" type="checkbox">
                                    <label for="ship-box" class="checkbox-label">Ship to a different address?</label>
                                </div>
                            </div>
                            <!-- Ship Different Title Checkbox End -->

                            <!-- Ship Box Info Start -->
                            <div id="ship-box-info" class="row mt-2">

                                <!-- Select Country Name Start -->
                                <div class="col-md-12">
                                    <div class="myniceselect country-select clearfix">
                                        <label>Country <span class="required">*</span></label>
                                        <select class="myniceselect nice-select wide rounded-0">
                                            <option data-display="Bangladesh">Bangladesh</option>
                                            <option value="uk">London</option>
                                            <option value="rou">Romania</option>
                                            <option value="fr">French</option>
                                            <option value="de">Germany</option>
                                            <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Select Country Name End -->

                                <!-- First Name Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <!-- First Name Input End -->

                                <!-- Last Name Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <!-- Last Name Input End -->

                                <!-- Company Name Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Company Name</label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <!-- Company Name End -->

                                <!-- Address Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input placeholder="Street address" type="text">
                                    </div>
                                </div>
                                <!-- Address Input End -->

                                <!-- Optional Text Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <input placeholder="Apartment, suite, unit etc. (optional)" type="text">
                                    </div>
                                </div>
                                <!-- Optional Text End -->

                                <!-- Town or City Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <!-- Town or City Input End -->

                                <!-- State or Country Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <!-- State or Country Input End -->

                                <!-- Postcode or Zip Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>
                                        <input placeholder="" type="text">
                                    </div>
                                </div>
                                <!-- Postcode or Zip Input End -->

                                <!-- Email Address Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input placeholder="" type="email">
                                    </div>
                                </div>
                                <!-- Email Address Input End -->

                                <!-- Phone Number Input Start -->
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text">
                                    </div>
                                </div>
                                <!-- Phone Number Input End -->

                            </div>
                            <!-- Ship Box Info End -->

                            <!-- Order Notes Textarea Start -->
                            <div class="order-notes mt-3 mb-n2">
                                <div class="checkout-form-list checkout-form-list-2">
                                    <label>Order Notes</label>
                                    <textarea id="checkout-mess" cols="30" rows="10"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                            <!-- Order Notes Textarea End -->

                        </div>
                        <!-- Different Address End -->
                    </div>
                </form>
                <!-- Checkbox Form End -->

            </div>

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

                            <!-- Table Body Start -->
                            <tbody>
                                <tr class="cart_item">
                                    <td class="cart-product-name text-start ps-0"> Some Winter Collections<strong
                                            class="product-quantity"> × 2</strong></td>
                                    <td class="cart-product-total text-end pe-0"><span class="amount">£145.00</span></td>
                                </tr>
                                <tr class="cart_item">
                                    <td class="cart-product-name text-start ps-0"> Small Scale Style<strong
                                            class="product-quantity"> × 4</strong></td>
                                    <td class="cart-product-total text-end pe-0"><span class="amount">£204.00</span></td>
                                </tr>
                            </tbody>
                            <!-- Table Body End -->

                            <!-- Table Footer Start -->
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th class="text-start ps-0">Cart Subtotal</th>
                                    <td class="text-end pe-0"><span class="amount">£349.00</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th class="text-start ps-0">Order Total</th>
                                    <td class="text-end pe-0"><strong><span class="amount">£349.00</span></strong></td>
                                </tr>
                            </tfoot>
                            <!-- Table Footer End -->

                        </table>
                    </div>
                    <!-- Your Order Table End -->

                    <!-- Payment Accordion Order Button Start -->
                    <div class="payment-accordion-order-button">
                        <div class="payment-accordion">
                            <div class="single-payment">
                                <h5 class="panel-title mb-3">
                                    <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Direct Bank Transfer.
                                    </a>
                                </h5>
                                <div class="collapse show" id="collapseExample">
                                    <div class="card card-body rounded-0">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the
                                            payment reference. Your order won’t be shipped until the funds have cleared in
                                            our account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-payment">
                                <h5 class="panel-title mb-3">
                                    <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample-2"
                                        aria-expanded="false" aria-controls="collapseExample-2">
                                        Cheque Payment.
                                    </a>
                                </h5>
                                <div class="collapse" id="collapseExample-2">
                                    <div class="card card-body rounded-0">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the
                                            payment reference. Your order won’t be shipped until the funds have cleared in
                                            our account.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-payment">
                                <h5 class="panel-title mb-3">
                                    <a class="collapse-off" data-bs-toggle="collapse" href="#collapseExample-3"
                                        aria-expanded="false" aria-controls="collapseExample-3">
                                        Paypal.
                                    </a>
                                </h5>
                                <div class="collapse show" id="collapseExample-3">
                                    {{-- stripe payment --}}
                                    <div class="row">
                                        <div class="col-md-12 ">
                                            <div class="panel panel-default credit-card-box">
                                                <div class="panel-heading display-table">
                                                    <h3 class="panel-title">Payment Details</h3>
                                                </div>
                                                <div class="panel-body">

                                                    @if (Session::has('success'))
                                                        <div class="alert alert-success text-center">
                                                            <a href="#" class="close" data-dismiss="alert"
                                                                aria-label="close">×</a>
                                                            <p>{{ Session::get('success') }}</p>
                                                        </div>
                                                    @endif

                                                    <form role="form" action="{{ route('stripe.post') }}"
                                                        method="post" class="require-validation" data-cc-on-file="false"
                                                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                        id="payment-form">
                                                        @csrf

                                                        <div class='form-row row'>
                                                            <div class='col-xs-12 form-group required'>
                                                                <label class='control-label'>Name on Card</label> <input
                                                                    class='form-control' name="card_name" size='4'
                                                                    type='text'>
                                                            </div>
                                                        </div>

                                                        <div class='form-row row'>
                                                            <div class='col-xs-12 form-group required'>
                                                                <label class='control-label'>Card Number</label> <input
                                                                    autocomplete='off' name="card_number"
                                                                    class='form-control card-number' size='20'
                                                                    type='text'>
                                                            </div>
                                                        </div>

                                                        <div class='form-row row'>
                                                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                                <label class='control-label'>CVC</label> <input
                                                                    autocomplete='off' name="cvc"
                                                                    class='form-control card-cvc' placeholder='ex. 311'
                                                                    size='4' type='text'>
                                                            </div>
                                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                <label class='control-label'>Expiration Month</label>
                                                                <input name="expiration"
                                                                    class='form-control card-expiry-month'
                                                                    placeholder='MM' size='2' type='text'>
                                                            </div>
                                                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                                <label class='control-label'>Expiration Year</label> <input
                                                                    class='form-control card-expiry-year'
                                                                    placeholder='YYYY' size='4' type='text'>
                                                            </div>
                                                        </div>

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
                                                                    <button class="btn btn-primary btn-lg btn-block"
                                                                        type="submit">Place Order</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end stripe payment --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Payment Accordion Order Button End -->
                </div>
                <!-- Your Order Area End -->
            </div>
        </div>
        {{-- end pet checkout --}}

    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">
        $(function() {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endsection
