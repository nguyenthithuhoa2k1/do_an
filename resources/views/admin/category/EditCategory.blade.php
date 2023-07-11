@extends('admin.layout.Master')
@section('content')
	<div class="container-fluid">
		<h1 class="page-title">Edit Category</h1>
		
		<form method="POST" class="form-horizontal m-t-30">
			@csrf
			<div class="form-group">
				<span class="help">Edit Category <b class="text-danger">(*)</b></span>
				@foreach($dataCategory as $category)
				<input class="form-control" type="text" name="category" value="{{$category->category}}">
				@endforeach
			</div>
			<button class="btn btn-success" type="submit">Edit Category</button>
		</form>
		</div>
@endsection
