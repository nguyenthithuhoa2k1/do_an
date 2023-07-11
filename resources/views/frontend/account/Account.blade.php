@extends('frontend.layout.Master')
@section('sidebar')
<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Account</h2>
		<div class="panel-group category-products">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="{{url('/member/account')}}">Account</a></h4>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="{{url('/member/myproduct')}}">My Product</a></h4>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('content')
<div class="col-sm-8">
	<div class="signup-form">
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
        <h1>User Update!</h1>
		<form class="account-update" method="POST" action="#" enctype="multipart/form-data">
			 @csrf
			<input name="name" type="text" placeholder="Name" value="{{$dataUser->name}}"/>
			<input name="email" type="email" placeholder="Email Address" value="{{$dataUser->email}}"/>
			<input name="password" type="password" placeholder="Password"/>
			<input name="address" type="text" placeholder="address" value="{{$dataUser->address}}"/>
			<select name="id_country" class="form-control form-control-line">
				<option value="">vui long chon country</option>
				@foreach($dataCountry as $country)
					@if($country->id_country == $dataUser->id_country)
						<option value="{{$country->id_country}}" selected>{{$country->name_country}}</option>
					@else
						<option value="{{$country->id_country}}">{{$country->name_country}}</option>
					@endif
				@endforeach
			</select>
			<input name="avatar" type="file" placeholder="Avatar" value="{{$dataUser->avatar}}"/>

			<div class="avatar-user">
				<a class="icon-X" style="" href=""><i class="fa fa-times"></i></a>
				<img src="{{asset('/admin/upload/user/'.$dataUser->avatar)}}" width="100px" height="100px"/>
			</div>

			<button type="submit" class="btn btn-default">Signup</button>
		</form>
		
	</div>
</div>
@endsection