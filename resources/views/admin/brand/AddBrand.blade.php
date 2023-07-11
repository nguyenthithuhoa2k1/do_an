@extends('admin.layout.Master')
@section('content')

	<div class="container-fluid">
		<h1 class="page-title">Create Brand</h1>
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
		<form method="POST" class="form-horizontal m-t-30">
			@csrf
			<div class="form-group">
				<span class="help">Brand</span>
				<input class="form-control" type="text" name="brand">
			</div>
			<button class="btn btn-success" type="submit">Create Brand</button>
		</form>
		</div>
@endsection