@extends('frontend.layout.Master')
@section('slide')
<!-- override slide -->
@endsection
@section('sidebar')
<!-- override sidebar -->
@endsection
@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
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
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST" action="{{url('/member/login')}}">
							@csrf
							<input type="email" placeholder="Email Address" name="email" />
							<input type="password" placeholder="password" name="password" />
							<span>
								<input type="checkbox" class="checkbox" name="remember_me"> 
								Keep me signed in
							</span>
							<a href="{{url('/member/register')}}" style="float: right;">Register</a>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection
