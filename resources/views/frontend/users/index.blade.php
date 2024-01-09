@extends('frontend.layout.app')
@section('title', 'Home')
@section('content')

@if(session('success'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
          </button>
        </div>
    	@endif

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->




					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">

									@foreach ($products as $product)
										
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="/images/backend/categories/{{$product->image}}" alt="{{$product->image}}" height="250px">
												<div class="product-label">
													@if($product->disprice!=null)
													<span class="sale">{{100-$product->disprice}}%</span>
													@else
													<span class="sale">{{$product->disprice==null ?'No discount':''}}</span>
													
													@endif
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">{{$product->category->name}}</p>
												<h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
												<h4 class="product-price">{{$product->disprice!=null?$product->price * $product->disprice / 100: $product->price}}<del class="product-old-price">{{$product->disprice!=null?$product->price:''}}</del></h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button button onclick = "window.location.href='{{url('item/'.$product->id)}}';" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">view</span></button><!-- Button trigger modal -->	
												</div>
											</div>

											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a href="{{ url('add-to-cart/'.$product->id) }}">add to cart</a></button>
											</div>
										</div>
										<!-- /product -->

										@endforeach

									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


@endsection

