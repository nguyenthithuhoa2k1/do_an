@extends('frontend.layout.Master')
@section('content')
	<div class="features_items"><!--features_items-->
		<h2 class="title text-center">Products</h2>
		@foreach($dataProduct as $product)
		<div class="col-sm-4">
			<div class="product-image-wrapper">
				<div class="single-products">
					<div class="productinfo text-center">
						<img src="{{asset('/upload/product/'.json_decode($product->image)[0])}}" alt="" />
						<h2>{{$product->price}} VND</h2>
						<p>{{$product->title}}</p>
						<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
					</div>
					<div class="product-overlay">
						<div class="overlay-content">
							<h2>{{$product->price}}</h2>
							<p>{{$product->title}}</p>
							<a href="{{url('/member/productdetail/'.$product->id_product)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
						</div>
					</div>
				</div>
				<div class="choose">
					<ul class="nav nav-pills nav-justified">
						<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
						<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
					</ul>
				</div>
			</div>
		</div>
		@endforeach
		
	</div><!--features_items-->
	
@endsection