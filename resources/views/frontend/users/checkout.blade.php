@extends('frontend.layout.app')
@section('title', 'Checkout')
@section('content')
	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Checkout</h3>
					<ul class="breadcrumb-tree">
						<li><a href="{{url('/')}}">Home</a></li>
						<li class="active">Checkout</li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<form action="{{route('checkout.store')}}" method="post">
					@csrf
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
								<input class="input" disabled type="text" name="user_name" value="{{Auth::user()->name}}">
							</div>
							<div class="form-group">
								<input class="input" disabled type="email" name="email" value="{{Auth::user()->email}}">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Enter address">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="phone" placeholder="Enter phone number">
							</div>
						</div>
						<!-- /Billing Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" name="note" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>


					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
							<?php $total = 0; $total_qty = 0; ?>
							@foreach((array) session('cart') as $id => $items)
							<?php $total += $items['price'] * $items['qty']; $total_qty += $items['qty'] ?>
							@endforeach
						
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
							@if(session('cart'))
							@foreach(session('cart') as $id => $items)
								<div class="order-col">
									<div><span>{{$items['qty']}} X</span> {{$items['name']}}</div>
									<div>${{$items['price'] * $items['qty']}}</div>
								</div>
							@endforeach
							@endif
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">${{$total}}</strong></div>
							</div>
						</div>
						

						<div class="payment-method">
						
							<div class="input-radio">
								<input type="radio"  name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Pay with Paypal
								</label>
								<div class="caption">
									<p>Please make your payment.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" name="terms"  id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<button href="#" type="submit" class="primary-btn order-submit">Place order</button>
					</div>
					<!-- /Order Details -->
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->
@endsection