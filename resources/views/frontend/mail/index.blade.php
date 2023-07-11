@extends('frontend.layout.Master')
@section('slide')
@endsection
@section('sidebar')
@endsection
@section('content')
	<div class="table-responsive cart_info">
		<table class="table table-condensed">
			<thead>
				<tr class="cart_menu">
					<td class="image">Item</td>
					<td class="description"></td>
					<td class="price">Price</td>
					<td class="quantity">Quantity</td>
					<td class="total">Total</td>
					<td></td>
				</tr>
			</thead>
			<tbody>
				@foreach($data['body'] as $key=> $cart)
				<tr>
					<td class="cart_product">
						<a href=""><img src="{{asset('/upload/product/2'.json_decode($cart['image'])[0])}}" alt=""></a>
					</td>
					<td class="cart_description">
						<h4><a href="">{{$cart['title']}}</a></h4>
						<p id="id_product">Web ID:{{$key}}</p>
					</td>
					<td class="cart_price">
						<p id='price'>{{$cart['price']}}</p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
							@csrf
							<a type="up" class="cart_quantity_up" href=""> + </a>
							<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart['qty']}}" autocomplete="off" size="2">
							<a type="down" class="cart_quantity_down" href=""> - </a>
						</div>
					</td>
					<td class="cart_total">
						<p class="cart_total_price">{{$cart['qty'] * $cart['price']}} VND</p>
					</td>
					<td class="cart_delete">
						<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
					</td>
				</tr>
				@endforeach
				<tr>
					<td colspan="4">&nbsp;</td>
					<td colspan="2">
						<table class="table table-condensed total-result">
							<tbody>
								<tr>
									<td>Cart Sub Total</td>
									<td>$59</td>
								</tr>
								<tr>
									<td>Exo Tax</td>
									<td>$2</td>
								</tr>
								<tr class="shipping-cost">
									<td>Shipping Cost</td>
									<td>Free</td>										
								</tr>
								<tr>
									<td>Total</td>
									<td><span id="sumTotal" style="background-color:red;">{{$data['sumtotal']}} VND</span></td>
								</tr>
								<tr>
									<td></td>	
									<td>
										<button name="btn-checkout" type="button">Thanh toán</button>
									</td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
				
			</tbody>
		</table>

	</div>
@endsection