@extends('frontend.layout.Master')
@section('content')
	<form action="{{url('/member/searchadvanced')}}" method="post" class="search-advanced">
		@csrf
		<input type="text" name="name" placeholder="Name" style="background: #F0F0E9;border: 0;color: #696763;padding: 5px;width: 100%;border-radius: 0;resize: none; width:150px;" >

		<select name="price"  style="width:150px;">
			<option value="">Price</option>
			<option value="500">500 - 1000</option>
			<option value="1000">1000 - 50000</option>
		</select>

		<select name="category" style="width:150px;">
			<option value="">Category</option>
			@foreach($dataCategory as $category)
			<option value="{{$category->id}}">{{$category->category}}</option>
			@endforeach
		</select>

		<select name="brand" style="width:150px;">
			<option value="">Brand</option>
			@foreach($dataBrand as $brand)
			<option value="{{$brand->id}}">{{$brand->brand}}</option>
			@endforeach
		</select>

		<select name="status" style="width:150px;">
			<option value="">Status</option>
			<option value="1">New</option>
			<option value="0">sale</option>
		</select>
		<button type="submit">Search</button>
	</form>

	@if($dataProduct)
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
	@endif


@endsection