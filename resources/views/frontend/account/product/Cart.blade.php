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
                <li class="active">Shopping Cart</li>
            </ol>
        </div>
        <div class="table-responsive cart_info">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
            {{session('success')}}
        </div>
        @endif
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
                    @foreach($carts as $key => $cart)
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="{{asset('/upload/product/2'.json_decode($cart['image'])[0])}}" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""></a>{{$cart['title']}}</h4>
                            <p>Web ID: {{$key}}</p>
                        </td>
                        <td class="cart_price">
                            <p class = "price">{{$cart['price']}} VND</p>
                        </td>
                        <td class="cart_quantity">
                            @csrf
                            <div class="cart_quantity_button">
                                <a class="cart_quantity_up" data-id="{{$key}}" href=""> + </a>
                                <input class="cart_quantity_input" type="text" name="quantity" value="{{$cart['qty']}}" autocomplete="off" size="2">
                                <a class="cart_quantity_down" data-id="{{$key}}" href=""> - </a>
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">{{$cart['price'] * $cart['qty'] }} VND</p>
                        </td>
                        <td class="cart_delete">
                            <form method="post" action = "{{url('/member/cart/delete/'.$key)}}" >
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="cart_quantity_delete"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<section id="do_action">
    <div class="container">
        <div class="heading">
            <h3>What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="chose_area">
                    <ul class="user_option">
                        <li>
                            <input type="checkbox">
                            <label>Use Coupon Code</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Use Gift Voucher</label>
                        </li>
                        <li>
                            <input type="checkbox">
                            <label>Estimate Shipping &amp; Taxes</label>
                        </li>
                    </ul>
                    <ul class="user_info">
                        <li class="single_field">
                            <label>Country:</label>
                            <select>
                                <option>United States</option>
                                <option>Bangladesh</option>
                                <option>UK</option>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>Ucrane</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                            
                        </li>
                        <li class="single_field">
                            <label>Region / State:</label>
                            <select>
                                <option>Select</option>
                                <option>Dhaka</option>
                                <option>London</option>
                                <option>Dillih</option>
                                <option>Lahore</option>
                                <option>Alaska</option>
                                <option>Canada</option>
                                <option>Dubai</option>
                            </select>
                        
                        </li>
                        <li class="single_field zip-field">
                            <label>Zip Code:</label>
                            <input type="text">
                        </li>
                    </ul>
                    <a class="btn btn-default update" href="">Get Quotes</a>
                    <a class="btn btn-default check_out" href="">Continue</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <?php
                            $sumtotal = 0;
                            foreach($carts as $cart){
                                $total = $cart['price'] * $cart['qty'] ;
                                $sumtotal = $sumtotal + $total;
                            }
                            
                        ?>
                        <li>Total <span class="sum-total">{{$sumtotal}} VND</span></li>

                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{url('/member/checkout')}}">Check Out</a>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        var total = 0;
        $('.cart_quantity_up').click(function(){
            var qtyUp = $(this).closest('.cart_quantity').find('.cart_quantity_input').val();
            var qtyQuantityUp = parseInt(qtyUp) + 1;
            var id_product = $(this).attr('data-id');
            var price = $(this).closest('tr').find('.price').text().replace(' VND', '');
            total = parseInt(qtyQuantityUp) * parseInt(price);
            $(this).closest('.cart_quantity').find('.cart_quantity_input').val(qtyQuantityUp);
            $(this).closest('tr').find('.cart_total_price').text(total + " VND");

            $.ajax({
                method: "POST",
                headers: {'X-CSRF-TOKEN': $("input[name='_token']").val()},
                url: "<?= url('/member/cart'); ?>", //k co html va chi chay ngầm
                dataType: 'json',
                data: {
                    "qty": qtyQuantityUp,
                    "id_product": id_product
                },
                success : function(res){
                    $('.sum-total').text(res.sumtotal  + " VND");
                }
            });
            return false;
        });
       var total = 0;
        $('.cart_quantity_down').click(function(){
            var qtyDown = $(this).closest('.cart_quantity').find('.cart_quantity_input').val();
            var qtyQuantityDown = parseInt(qtyDown) - 1;
            var id_product = $(this).attr('data-id');
            var parent = $(this).closest('tr');
            $(this).closest('.cart_quantity').find('.cart_quantity_input').val(qtyQuantityDown);
            var price = $(this).closest('tr').find('.price').text().replace(' VND', '');
            total = parseInt(qtyQuantityDown) * parseInt(price);
            $(this).closest('tr').find('.cart_total_price').text(total + " VND");
            $.ajax({
                method: "POST",
                headers: {'X-CSRF-TOKEN': $("input[name='_token']").val()},
                url: "<?= url('/member/cart'); ?>", //k co html va chi chay ngầm
                dataType: 'json',
                data: {
                    "qty": qtyQuantityDown,
                    "id_product": id_product
                },
                success : function(res){
                    if(qtyQuantityDown < 1) {
                        parent.remove();
                    }
                    $('.sum-total').text(res.sumtotal + " VND");
                }
            });
            return false;
        });

    });
</script>
@endsection