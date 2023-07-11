@extends('admin.layout.Master')
@section('content')
	<div class="container-fluid">
		<h1 class="page-title">Edit Blog</h1>
			<form method="POST" class="form-horizontal m-t-30" enctype="multipart/form-data">
				@csrf
				@foreach($dataBlog as $dataBlog)
				<div class="form-group">
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
					<span class="help">Title<b class="text-danger">(*)</b></span>
					<input class="form-control" type="text" name="title_blog" value="{{$dataBlog['title_blog']}}">
				</div>
				<div class="form-group">
					<span class="help">Image</span>
					<input class="form-control" type="file" name="image_blog" >
					<img src="{{asset('admin/blog/'.$dataBlog['image_blog'])}}" width="100px" height="100px">
				</div>
				<div class="form-group">
					<span class="help">Description</span>
					<textarea class="form-control form-control-line" type="text" name="description_blog">{{$dataBlog['description_blog']}}</textarea>
				</div>
				<div class="form-group">
					<span class="help">Content</span>
					<textarea id="editblog" class="form-control form-control-line" type="text" name="content_blog">{{$dataBlog['content_blog']}}</textarea>
				</div>
				@endforeach
				<button class="btn btn-success" type="submit">Edit Blog</button>
			</form>
		</div>
		<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
		<script> CKEDITOR.replace('editblog'); </script>
@endsection