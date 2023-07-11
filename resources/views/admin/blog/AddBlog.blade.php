@extends('admin.layout.Master')
@section('content')
	<div class="container-fluid">
		<h1 class="page-title">Create Blog</h1>
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
			<form method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<span class="help">Title<b class="text-danger">(*)</b></span>
					<input class="form-control" type="text" name="title_blog">
				</div>
				<div class="form-group">
					<span class="help">Image</span>
					<input class="form-control" type="file" name="image_blog">
				</div>
				<div>
					<span class="help">Description</span>
					<textarea class="form-control form-control-line" type="text"  name="description_blog" value=""></textarea>
				</div>
				<div class="form-group">
					<span class="help">Content</span>

					<textarea id="addblog" class="form-control form-control-line" type="text"  name="content_blog" value=""></textarea>
				</div>
				<button class="btn btn-success" type="submit">Create Blog</button>
			</form>
		</div>

		<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
		<script> CKEDITOR.replace('addblog'); </script>
@endsection