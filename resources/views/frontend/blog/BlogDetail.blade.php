@extends('frontend.layout.Master')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						@foreach($blogDetail as $blogDetail)
						<div class="single-blog-post">
							<h3>{{$blogDetail->title_blog}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i>
									 {{ $blogDetail->created_at->format('H:i A') }}
									</li>
									<li><i class="fa fa-calendar"></i> {{ $blogDetail->created_at->format('M d, Y' ) }}</li>
								</ul>
								<!-- <span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span> -->
							</div>
							<a href="">
								<img src="{{asset('admin/upload/blog/'.$blogDetail->image_blog)}}" height="500px" alt="">
							</a>
							<p>
								{{$blogDetail->description_blog}}
							</p>
							<p>
								{!!$blogDetail->content_blog!!}
							</p>
							<div class="pager-area">
								<ul class="pager pull-right">
									<li>
										@if (isset($previous_record))
						                    <a href="{{url('/blogdetail/'.$previous_record->id_blog)}}">Pre</a>
						                @endif
						            </li>
									<li>
										@if (isset($next_record))
						                    <a href="{{url('/blogdetail/'.$next_record->id_blog)}}">Next</a>
						                @endif
									</li>
								</ul>
							</div>
						</div>
						@endforeach
					</div><!--/blog-post-area-->

					<div class="rating-area">
						<div class="rate">
				            <div class="vote">
				            	@csrf
				            	<input type="hidden" id="id_blog" value="{{$blogDetail->id_blog}}">
				            	@for($i = 1; $i <= 5; $i++ )
				                <div  class="star_{{$i}} ratings_stars {{$i <= $averageRate ? 'ratings_over': ''}}"><input name="rate" value="{{$i}}" type="hidden"></div>
				                @endfor
								<span class="rate-np">{{ number_format($averageRate, 0) }}</span>

				            </div> 
				        </div>
						<ul class="tag">
							<li>TAG:</li>
							<li><a class="color" href="">Pink <span>/</span></a></li>
							<li><a class="color" href="">T-Shirt <span>/</span></a></li>
							<li><a class="color" href="">Girls</a></li>
						</ul>
					</div><!--/rating-area-->

					<div class="socials-share">
						<a href=""><img src="{{asset('frontend/images/blog/socials.png')}}" alt=""></a>
					</div><!--/socials-share-->

					<!-- <div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="{{asset('frontend/image/images/blog/man-one.jpg')}}" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary" href="">Other Posts</a>
							</div>
						</div>
					</div> --><!--Comments-->
					<div class="response-area">
						<h2>3 RESPONSES</h2>
						<ul class="media-list">
							@foreach($comments as $comment)
								<!-- show comment -->
							    @include('frontend.blog.Comment', ['comment' => $comment, 'level' => 0])
							@endforeach
						</ul>					
					</div><!--/Response-area-->
					<div class="replay-box">
						<div class="row">
							<div class="col-sm-12">
								<h2>Leave a replay</h2>
								<form method="post" action="{{url('/blogdetail/comment')}}" enctype="multipart/form-data" class="text-area form-comment">
									@csrf
									<input type="hidden" name="level" value="0">
									<input type="hidden" name="id_blog" value="{{$id_blog}}">
									<div class="blank-arrow">
										@if($dataUser)
											<label>{{$dataUser->name}}</label>
										@endif
									</div>
									<span>*</span>
									<textarea id="comment" name="comment" rows="11"></textarea>
									<button type="submit" class="btn btn-primary" style="padding: 6px 12px;">post comment</button>
								</form>
							</div>
						</div>
					</div><!--/Repaly Box-->
				</div>	
			</div>
		</div>
	</section>
	<script type="text/javascript">
		$(document).ready(function(){
			//vote
			$('.ratings_stars').hover(
	            // Handles the mouseover
	            function() {
	                $(this).prevAll().andSelf().addClass('ratings_hover');
	                // $(this).nextAll().removeClass('ratings_vote'); 
	            },
	            function() {
	                $(this).prevAll().andSelf().removeClass('ratings_hover');
	                // set_votes($(this).parent());
	            }
	        );

			$('.ratings_stars').click(function(){
				let checkLogin = "{{Auth::check()}}";
				let id_blog = $("#id_blog").val();
				let rate = $(this).find("input").val();

				if(checkLogin){
			        $.ajax({
						method: "POST",
						headers: {'X-CSRF-TOKEN': $(".rate input[name='_token']").val()},
						url: "<?= url('/blogdetail/rate'); ?>", //k co html va chi chay ngầm
						dataType: 'json',
						data: {
							"rate": rate,
							"id_blog": id_blog,
						},
						success : function(res){
							if(res.averageRate){
								$('span.rate-np').text(res.averageRate.toFixed(0));
							}

						}
					});

			    	if ($(this).hasClass('ratings_over')) {
			            $('.ratings_stars').removeClass('ratings_over');
			            $(this).prevAll().andSelf().addClass('ratings_over');
			        } else {
			        	$(this).prevAll().andSelf().addClass('ratings_over');
			        }
				}else{
		    		alert('bạn chưa login');
		    	}
		     	return false;
		    });

		    $('form.form-comment').submit(function(e){
		    	e.preventDefault();

		    	let comment = $(this).find('#comment');
		    	let token = $(this).find('input[name="_token"]').val();
		    	let checkLogin = "{{Auth::check()}}";
		    	var parentId = $(this).closest('.media').attr('data-id');
		    	var level = $(this).closest('.media').attr('data-level');

		    	if(checkLogin){
		    		if(comment.val() == ""){
		    			alert('vui lòng nhập comment của bạn');
		    		}else{
		    			$.ajax({
							method: "POST",
							headers: {'X-CSRF-TOKEN': token},
							url: "<?= url('/blogdetail/comment'); ?>",
							dataType: 'json',
							data: $(this).serialize(),
							success : function(res){
								comment.val("");
								if(res.dataComment) {
									let createdAt = new Date(res.dataComment.created_at);
									let html = `
										<li class="media comment-level-${++level}" id="comment-id-${res.dataComment.id}">
											<a class="pull-left" href="#">
												<img id="show_avatar"  class="media-object" width="100" height="100" src="{{asset('admin/upload/user/')}}/${res.dataComment.avatar_user ? res.dataComment.avatar_user : 'avatar-default.jpg'}" alt="">
											</a>
											<div class="media-body">
												<ul class="sinlge-post-meta">
													<li><i class="fa fa-user"></i> ${res.dataComment.name_user}</li>
													<li><i class="fa fa-clock-o"></i> ${createdAt.toLocaleTimeString('en-US', { hour: 'numeric',minute: 'numeric', hour12: true })}</li>
													<li><i class="fa fa-calendar"></i> ${createdAt.toLocaleString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })}</li>
												</ul>
												<p>${res.dataComment.comment}</p>
												<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
											</div>
										</li>
									`;

									if(parentId) {
										$('#comment-id-'+parentId).after(html);
									} else {
										$('.comment-level-0').last().after(html);
									}

									$('#replay-id-'+parentId).addClass('hide');
									
								}
							}


						});
		    		}
		    	}else{
		    		alert('bạn chưa login');
		    	}
		     	return false;
		    });

		    $('.replay-comment').click(function(e){
				e.preventDefault();
				var checkLogin = "{{Auth::check()}}";
				if(checkLogin){
					var parentId = $(this).closest('.media').attr('data-id');
					$('#replay-id-'+parentId).removeClass('hide');
				}
		    });
		});
	</script>
@endsection