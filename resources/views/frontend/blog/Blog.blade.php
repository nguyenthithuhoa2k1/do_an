@extends('frontend.layout.Master')
@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						@foreach($dataBlog as $blog)
						<div class="single-blog-post">
							<h3>{{$blog->title_blog}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> {{ $blog->created_at->format('M d, Y') }}</li>
								</ul>
								<span>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							<a href="{{url('/blogdetail/'.$blog->id_blog)}}">
								<img src="{{asset('admin/upload/blog/'.$blog->image_blog )}}" height="700px" alt="">
							</a>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
							<a  class="btn btn-primary" href="{{url('/blogdetail/'.$blog->id_blog)}}">Read More</a>
						</div>
						@endforeach
						{{$dataBlog->links('pagination::bootstrap-4')}}
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection