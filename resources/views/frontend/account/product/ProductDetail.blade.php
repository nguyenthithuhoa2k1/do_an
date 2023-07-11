@extends('frontend.layout.Master')
@section('slide')
@endsection
@section('content')

<div class="product-details"><!--product-details-->
@foreach($dataProduct as $product)
    <div class="col-sm-5">
        <div class="view-product">
            <img class="show-image" src="{{asset('/upload/product/3'.json_decode($product->image)[0])}}" alt="">
            <a class="zoom-image-product" href="{{asset('/upload/product/3'.json_decode($product->image)[0])}}" rel="prettyPhoto" ><h3>ZOOM</h3></a>
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                    @foreach(json_decode($product->image) as $image )
                        <a href=""><img class="image-click" id='{{$image}}'  src="{{asset('/upload/product/2'.$image )}}" alt=""></a>
                    @endforeach
                    </div>
                    <div class="item ">
                    @foreach(json_decode($product->image) as $image )
                        <a href=""><img src="{{asset('/upload/product/2'.$image )}}" alt=""></a>
                    @endforeach
                    </div>
                </div>

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
                </a>
        </div>
    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="">
            <h2>{{$product->title}}</h2>
            <p>Web ID: {{$product->id_product}}</p>
            <img src="images/product-details/rating.png" alt="">
            <span>
                <span>{{$product->price}} VND</span>
                <label>Quantity:</label>
                <input class="qty" type="text" value="1">
                @csrf
                <button type="button" class="btn btn-fefault btn-add-to-cart cart">
                    <i class="fa fa-shopping-cart"></i>
                    Add to cart
                </button>
            </span>
            <p><b>Availability:</b> In Stock</p>
            <p><b>Condition:</b> New</p>
            <p><b>Brand:</b> E-SHOPPER</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a>
        </div><!--/product-information-->
    </div>
    @endforeach
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Details</a></li>
            <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
            <li><a href="#tag" data-toggle="tab">Tag</a></li>
            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade" id="details">
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery2.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery3.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery4.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="companyprofile">
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery3.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery2.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery4.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade" id="tag">
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery1.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery2.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery3.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="images/home/gallery4.jpg" alt="">
                            <h2>$56</h2>
                            <p>Easy Polo Black Edition</p>
                            <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade active in" id="reviews">
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>
                
                <form action="#">
                    <span>
                        <input type="text" placeholder="Your Name">
                        <input type="email" placeholder="Email Address">
                    </span>
                    <textarea name=""></textarea>
                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="">
                    <button type="button" class="btn btn-default pull-right">
                        Submit
                    </button>
                </form>
            </div>
        </div>
        
    </div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
            @foreach($Products as $products)   
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('upload/product/'.json_decode($products->image)[0])}}" alt="">
                                <h2>{{$products->price}}</h2>
                                <p>{{$products->title}}</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                            <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{$products->price}}</h2>
                                <p>{{$products->title}}</p>
                                <a href="{{url('/member/productdetail/'.$products->id_product)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="item">  
            @foreach($Products as $products)   
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{asset('upload/product/'.json_decode($products->image)[0])}}" alt="">
                                <h2>{{$products->price}}</h2>
                                <p>{{$products->title}}</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                            <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{$products->price}}</h2>
                                <p>{{$products->title}}</p>
                                <a href="{{url('/member/productdetail/'.$products->id_product)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>          
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.image-click').click(function(){
           var getsrc =  $(this).attr('id');
            $('.view-product').find('img.show-image').attr('src',"{{asset('/upload/product/3')}}" + getsrc);
            $('.zoom-image-product').attr('href',"{{asset('/upload/product/3')}}" + getsrc);
           return false;
        });
         
        $('.btn-add-to-cart').click(function(){
            var qty =  $('.qty').val();
            $.ajax({
                method: "POST",
                headers: {'X-CSRF-TOKEN': $("input[name='_token']").val()},
                url: "<?= url('/member/addtocart'); ?>", //k co html va chi chay ngầm
                dataType: 'json',
                data: {
                    "qty": qty,
                    "id_product":{{$product->id_product}},
                },
                success : function(res){
                    var sumQty = res.sumQty;
                    $('.qty-add-to-cart').text(sumQty);
                }
            });
        });
         $("a[rel^='prettyPhoto']").prettyPhoto();
    });
</script>
@endsection