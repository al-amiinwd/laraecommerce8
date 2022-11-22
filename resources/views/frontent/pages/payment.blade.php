@extends('frontent.layouts.master')
@section('main-section')

 <!-- Order Details -->
 <div class="col-md-4"></div>
 <div class="col-md-4 order-details" style="margin-top: 100px; margin-botttom: 50px;" >
    <div class="section-title text-center">
        <h3 class="title">Your Order</h3>
    </div>
    <div class="order-summary">
        <div class="order-col">
            <div><strong>PRODUCT</strong></div>
            <div><strong>TOTAL</strong></div>
        </div>
        @foreach ($cart_array as $cart)
        <div class="order-products">
            <div class="order-col">
                <div>{{$cart['quantity']}} x {{$cart['name']}}</div>
                <div> &#2547; {{Cart::get($cart['id'])->getPriceSum()}} </div>
            </div>
        </div>
        @endforeach
        <div class="order-col">
            <div>Shiping</div>
            <div><strong>&#2547;70</strong></div>
        </div>
        <div class="order-col">
            <div><strong>TOTAL</strong></div>
            <div><strong class="order-total">&#2547;{{Cart::getTotal()+70}}</strong></div>
        </div>
    </div>
    <form action="{{url('place-order/')}}" method="post">
    @csrf
    <div class="section-title text-center" style="margin-top: 50px;">
        <h5 class="title" style="color: #D10024">Please Select a payment method</h5>
    </div>
    <div class="payment-method">
        <div class="input-radio">
            <input type="radio" name="payment" id="payment-1" value="Cash">
            <label for="payment-1">
                <span></span>
                Cash on delivery
            </label>
        </div>
        <div class="input-radio">
            <input type="radio" name="payment" id="payment-1" value="Bkash">
            <label for="payment-1">
                <span></span>
                Bkash
            </label>
            <div class="caption">
                <p>Bkash : 01918831525</p>
            </div>
        </div>
        <div class="input-radio">
            <input type="radio" name="payment" id="payment-2" value="Nagot">
            <label for="payment-2">
                <span></span>
                Nagot
            </label>
            <div class="caption">
                <p>Nagot : 01811414248</p>
            </div>
        </div>
        <div class="input-radio">
            <input type="radio" name="payment" id="payment-3" value="Rocket">
            <label for="payment-3">
                <span></span>
                Rocket
            </label>
            <div class="caption">
                <p>Rocket : 01721202087</p>
            </div>
        </div>
    </div>
    <div class="input-checkbox">
        <input type="checkbox" id="terms">
        <label for="terms">
            <span></span>
            I've read and accept the <a href="#">terms & conditions</a>
        </label>
    </div>
    <input class="primary-btn order-submit" type="submit" value="Place Order" style="float: right">
    </form>
</div>
<div class="col-md-4"></div>
<!-- /Order Details -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
<!-- container -->
<div class="container">
<!-- row -->
<div class="row">
<div class="col-md-12">
    <div class="newsletter">
        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
        <form>
            <input class="input" type="email" placeholder="Enter Your Email">
            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
        </form>
        <ul class="newsletter-follow">
            <li>
                <a href="#"><i class="fa fa-facebook"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-pinterest"></i></a>
            </li>
        </ul>
    </div>
</div>
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /NEWSLETTER -->

@endsection
