<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							Sportswear
						</a>
					</h4>
				</div>
				<div id="sportswear" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="#">Nike </a></li>
							<li><a href="#">Under Armour </a></li>
							<li><a href="#">Adidas </a></li>
							<li><a href="#">Puma</a></li>
							<li><a href="#">ASICS </a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#mens">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							Mens
						</a>
					</h4>
				</div>
				<div id="mens" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="#">Fendi</a></li>
							<li><a href="#">Guess</a></li>
							<li><a href="#">Valentino</a></li>
							<li><a href="#">Dior</a></li>
							<li><a href="#">Versace</a></li>
							<li><a href="#">Armani</a></li>
							<li><a href="#">Prada</a></li>
							<li><a href="#">Dolce and Gabbana</a></li>
							<li><a href="#">Chanel</a></li>
							<li><a href="#">Gucci</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#womens">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							Womens
						</a>
					</h4>
				</div>
				<div id="womens" class="panel-collapse collapse">
					<div class="panel-body">
						<ul>
							<li><a href="#">Fendi</a></li>
							<li><a href="#">Guess</a></li>
							<li><a href="#">Valentino</a></li>
							<li><a href="#">Dior</a></li>
							<li><a href="#">Versace</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#">Kids</a></h4>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#">Fashion</a></h4>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#">Households</a></h4>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#">Interiors</a></h4>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#">Clothing</a></h4>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#">Bags</a></h4>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#">Shoes</a></h4>
				</div>
			</div>
		</div><!--/category-products-->
	
		<div class="brands_products"><!--brands_products-->
			<h2>Brands</h2>
			<div class="brands-name">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
					<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
					<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
					<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
					<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
					<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
					<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
				</ul>
			</div>
		</div><!--/brands_products-->
		
		<div class="price-range"><!--price-range-->
			<h2>Price Range</h2>
			<div class="well text-center">
					<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="6000" data-slider-step="5" data-slider-value="[1000,3000]" id="sl2" ><br />
					<b class="pull-left">$ 0</b> <b class="pull-right">$ 6000</b>
			</div>
		</div><!--/price-range-->
		
		<div class="shipping text-center"><!--shipping-->
			<img src="{{asset('frontend/images/home/shipping.jpg')}}" alt="" />
		</div><!--/shipping-->
	
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.slider-track').click(function(e){
		    var price= $('div.tooltip-inner').text();
		    console.log(price);
			$.ajax({
                method: "POST",
                headers: {'X-CSRF-TOKEN': $("input[name='_token']").val()},
                url: "<?= url('/member/searchprice'); ?>", //k co html va chi chay ngầm
                dataType: 'json',
                data: {
                    "price": price,
                },
                success : function(res){
                	let dataProduct = res.dataProduct;
                	let html = '';
                	console.log(dataProduct);
                	$.map(dataProduct, function(value, key) {
                		html += `
                			<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{asset('/upload/product')}}/${JSON.parse(value.image)[0]}" alt="" />
											<h2>${value.price} VND</h2>
											<p>${value.title}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>${value.price} VND</h2>
												<p>${value.title}</p>
												<a href="{{url('/member/productdetail')}}/${value.id_product}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
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
                		`
                	});

                	$(".list-products").empty();
                	$(".recommended_items").empty();
                	$(".list-products").html(html);
                }
            });
		});
	});
</script>