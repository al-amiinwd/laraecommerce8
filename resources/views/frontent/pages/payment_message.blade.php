@extends('frontent.layouts.master')
@section('main-section')

<div class="col-md-4"></div>
<div class="col-md-4">
    <div class="alert alert-success" role="alert" style="margin-top: 100px; margin-bottom=50px">
        <h1 class="alert-heading" style="text-align:center"> Done!</h1>
        <h3 class="alert-heading" style="text-align:center"> Your order successfully done.</h3>
        <hr>
        <p style="text-align:center" >we will contact soon...</p>
    </div>
</div>
<div class="col-md-4"></div>
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
