		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +234-80-662-77-007</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> armconsultech@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i>4 Wazobia Community, Bwari-Abuja</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
						@auth
						<li class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    								<i class="fa fa-user-o"></i>{{Auth::user()->name}}</a>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<form method="POST" action="{{ route('logout') }}">
                            			@csrf
										<button class=" btn btn-default " style="layout: none; border: none; background-colour: white;
										color: black; margin-left:4.5rem;">Logout</button>
									</form>
								</div>
						</li>
						@endauth
						@guest
						<li class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    								<i class="fa fa-user-o"></i>Login/Register</a>
								<div  class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a href="login" style="color:black; display:block; padding-left: 4.5rem;">Login</a>
									<a href="register" style="color:black; display:block; padding-left: 4.5rem;">Register</a>
								</div>
						</li>
						@endguest
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
								<a href="{{url('/')}}" class="logo" style="font-size:3rem; color: magenta" padding-top: 2rem;>
									P4TShop
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Search here">
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
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">{{ count((array) session('cart')) }}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
										<?php $total = 0; $total_qty = 0; ?>
											@foreach((array) session('cart') as $id => $details)
												<?php $total += $details['price'] * $details['qty']; $total_qty += $details['qty'] ?>
											@endforeach
											
											@if(session('cart'))
											@foreach(session('cart') as $id => $details)
											<div class="product-widget">
												<div class="product-img">
													<img src="/images/backend/categories/{{$details['image']}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">{{$details['name']}}</a></h3>
													<h4 class="product-price"><span class="qty">{{$details['qty']}}x</span>${{$details['price']}}</h4>
													<h3 class="product-price"><span style="color: blue;"> = </span>${{$details['qty'] * $details['price']}}</>
												</div>
												<button class="delete" ><i class="fa fa-close"></i></button>
											</div>
											@endforeach
                    						@endif
										</div>
										<div class="cart-summary">
											<small>{{$total_qty}} Item(s) selected</small>
											<h5>SUBTOTAL: ${{$total}}</h5>
										</div>
										<div class="cart-btns">
											@if(session('cart'))
											<a href="{{url('cart')}}">View cart  <i class="fa fa-arrow-circle-right"></i></a>
											@auth
											<a href="{{url('checkout')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
											@endif
											@endauth
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
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->