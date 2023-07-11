@extends('admin.layout.Master')
@section('content')
	<div class="container-fluid">
		<h1 class="page-title">Edit Brand</h1>
		
		<form method="POST" class="form-horizontal m-t-30">
			@csrf
			<div class="form-group">
				<span class="help">Edit Brand <b class="text-danger">(*)</b></span>
				@foreach($dataBrand as $brand)
				<input class="form-control" type="text" name="brand" value="{{$brand->brand}}">
				@endforeach
			</div>
			<button class="btn btn-success" type="submit">Edit Brand</button>
		</form>
		</div>
@endsection
