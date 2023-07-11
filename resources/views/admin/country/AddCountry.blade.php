@extends('admin.layout.Master')
@section('content')

	<div class="container-fluid">
		<h1 class="page-title">Create Country</h1>
		@if(session('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                {{session('success')}}
            </div>
        @endif
		<form method="POST" class="form-horizontal m-t-30">
			@csrf
			<div class="form-group">
				<span class="help">Country</span>
				<input class="form-control" type="text" name="name_country">
			</div>
			<button class="btn btn-success" type="submit">Create Country</button>
		</form>
		</div>
@endsection