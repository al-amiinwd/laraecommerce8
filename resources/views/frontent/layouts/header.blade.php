<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/slick.css')}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset('css/slick-theme.css')}}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/nouislider.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{asset('css/style.css')}}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i>01918831525</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i>alamin@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i>Wireless, Moghbazar, Dhaka</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i></i>&#2547;BDT</a></li>
                        @php
                        $customer=Session::get('id')
                        @endphp
                        @if($customer!=Null)
						<li><a href="{{url('cus-logout')}}"><i class="fa fa-user-o"></i>Logout</a></li>
                        @else
                        <li><a href="{{url('login-check')}}"><i class="fa fa-user-o"></i>Login</a></li>
                        @endif
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="{{url('/')}}" class="logo">
									<img src="{{asset('img/logo.PNG')}}" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{url('search')}}" method="get">
									<select class="input-select" name="category">
										<option value="All" {{request('category') == 'All' ? 'selected':''}}>All Categories</option>
										@foreach ($categories as $category)
										<option value="{{$category->id}}" {{request('category') == $category->id ? 'selected':''}}>{{$category->name}}</option>
										@endforeach
									</select>
									<input class="input" name="product" placeholder="Search here" value="{{request('product')}}">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
                                @php
                                    $card_arrays=cardArray();
                                @endphp
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">
                                            <?=count($card_arrays);?>
                                        </div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
                                            @foreach ($card_arrays as $card_array)
                                            @php
                                                $images=$card_array['attributes'][0];
                                                $images=explode('|',$images);
                                                $images=$images[0];
                                            @endphp

											<div class="product-widget">
												<div class="product-img">
													<img src="{{url('category/'.$images)}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$card_array['name']}}</a></h3>
													<h4 class="product-price"><span class="qty">{{$card_array['quantity']}}</span>&#2547;{{$card_array['price']}}</h4>
												</div>
												<a class="delete" href="{{url('cart-delete/'.$card_array['id'])}}"><i class="fa fa-close"></i>
                                                </a>
											</div>
                                            @endforeach
										</div>
										<div class="cart-summary">
											<small><?=
                                                count($card_arrays);
                                            ?>
                                             Item(s) selected</small>
											<h5>{{Cart::getTotal();}}</h5>
										</div>
										<div class="cart-btns">
                                            @php
                                            $customer_id=Session::get('id');
                                            @endphp
                                             @if($customer_id!=Null);
											<a style="width:100%; background-color:#D10024" href="{{url('checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                            @else
                                            <a style="width:100%; background-color:#D10024" href="{{url('login-check')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                            @endif
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					{{-- <ul class="main-nav nav navbar-nav">
                        @foreach ($categories as $category)
						<li><a href="{{'product_by_cat/'.$category->id}}">{{$category->name}}</a></li>
                        @endforeach
					</ul> --}}
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
