@extends('frontend.layout.Master')
@section('slide')
@endsection
@section('sidebar')
@endsection
@section('content')
<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Check out</li>
			</ol>
		</div><!--/breadcrums-->

		<div class="step-one">
			<h2 class="heading">Step1</h2>
		</div>
		<div class="checkout-options">
			<h3>New User</h3>
			<p>Checkout options</p>
			<ul class="nav">
				<li>
					<label><input type="checkbox"> Register Account</label>
				</li>
				<li>
					<label><input type="checkbox"> Guest Checkout</label>
				</li>
				<li>
					<a href=""><i class="fa fa-times"></i>Cancel</a>
				</li>
			</ul>
		</div><!--/checkout-options-->

		<div class="register-req">
			<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
		</div><!--/register-req-->
		@if(session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                        {{session('success')}}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
		<div class="shopper-informations">
			<div class="row">
				<div class="col-sm-3">
					<div class="shopper-info">
						@if(Auth::check())
						@else
							<p>Shopper Information</p>
							<form method="POST" action="{{url('/member/checkout/register')}}">
								@csrf
								<input name="name" type="text" placeholder="Name"/>
								<input name="email" type="email" placeholder="Email Address"/>
								<input name="password" type="password" placeholder="Password"/>
								<button type="submit" class="btn btn-default">Signup</button>
							</form>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="review-payment">
			<h2>Review &amp; Payment</h2>
		</div>

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
					@foreach($carts as $key=> $cart)
					
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
										<?php
				                            $sumtotal = 0;
				                            foreach($carts as $cart){
				                                $total = $cart['price'] * $cart['qty'] ;
				                                $sumtotal = $sumtotal + $total;
				                            }
				                        ?>
										<td><span id="sumTotal">{{$sumtotal}} VND</span></td>
									</tr>
									<tr>
										<td></td>	
										<td>
											<button id="btn-checkout" name="btn-checkout" type="submit">Thanh toán</button>
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
					
				</tbody>
			</table>

		</div>
		<div class="payment-options">
				<span>
					<label><input type="checkbox"> Direct Bank Transfer</label>
				</span>
				<span>
					<label><input type="checkbox"> Check Payment</label>
				</span>
				<span>
					<label><input type="checkbox"> Paypal</label>
				</span>
			</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		var total =0;
		$('.cart_quantity_up').click(function(){
			var qty = $(this).closest('tr').find('.cart_quantity_input').val();
			var qtyUp = parseInt(qty) + 1;
			$(this).closest('tr').find('.cart_quantity_input').val(qtyUp);
			var id_product = $(this).closest('tr').find('#id_product').text().replace('Web ID:','');
			var price = $('#price').text();
			total = parseInt(qtyUp) * parseInt(price);
			$(this).closest('tr').find('.cart_total_price').text(total + 'VND');
			$.ajax({
                method: "POST",
                headers: {'X-CSRF-TOKEN': $("input[name='_token']").val()},
                url: "<?= url('/member/checkout'); ?>", //k co html va chi chay ngầm
                dataType: 'json',
                data: {
                    "qty": qtyUp,
                    "id_product": id_product,
                },
                success : function(res){
                	$('#sumTotal').text(res.sumtotal + ' VND');
                }
            });
            return false;
		});
		$('.cart_quantity_down').click(function(){
			var qty = $(this).closest('tr').find('.cart_quantity_input').val();
			var qtyUp = parseInt(qty) - 1;
			$(this).closest('tr').find('.cart_quantity_input').val(qtyUp);
			var id_product = $(this).closest('tr').find('#id_product').text().replace('Web ID:','');
			var price = $('#price').text();
			total = parseInt(qtyUp) * parseInt(price);
			$(this).closest('tr').find('.cart_total_price').text(total + 'VND');

			$.ajax({
                method: "POST",
                headers: {'X-CSRF-TOKEN': $("input[name='_token']").val()},
                url: "<?= url('/member/checkout'); ?>", //k co html va chi chay ngầm
                dataType: 'json',
                data: {
                    "qty": qtyUp,
                    "id_product": id_product,
                },
                success : function(res){
                	$('#sumTotal').text(res.sumtotal + ' VND');
                }
            });
            return false;
		});
		$('#btn-checkout').click(function(){
			var sumtotal = $('#sumTotal').text().replace(' VND',"");
			@if(Auth::check())
				alert('Mua hàng thành công. Bạn vui lòng check mail để kiểm tra lại đơn hàng')
			@else
				alert('vui long login để thanh toán')
			@endif
			$.ajax({
                method: "POST",
                headers: {'X-CSRF-TOKEN': $("input[name='_token']").val()},
                url: "<?= url('/member/mailcheckout'); ?>", //k co html va chi chay ngầm
                dataType: 'json',
                data: {
                	'sumtotal':sumtotal,
                },
                success : function(res){
                	console.log(res.create);
                }
            });
		});
	});
</script>
@endsection
