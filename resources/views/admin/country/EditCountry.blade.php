@extends('admin.layout.Master')
@section('content')
	<div class="container-fluid">
		<h1 class="page-title">Edit Country</h1>
		
		<form method="POST" class="form-horizontal m-t-30">
			@csrf
			<div class="form-group">
				<span class="help">Edit Country <b class="text-danger">(*)</b></span>
				@foreach($getCountry as $country)
				<input class="form-control" type="text" name="name_country" value="{{$country['name_country']}}">
				@endforeach
			</div>
			<button class="btn btn-success" type="submit">Edit Country</button>
		</form>
		</div>
@endsection