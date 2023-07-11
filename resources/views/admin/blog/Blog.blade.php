@extends('admin.layout.Master')
@section('content')
	<div class="container-fluid">
		<div class="table-responsive">
			<div class="card">
				@if(session('success'))
				    <div class="alert alert-success alert-dismissible">
				        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
				        {{session('success')}}
				    </div>
				@endif
				<table class="table table-striped table-bordered">
					<thead class="thead-light">
						<th>#</th>
						<th>Title</th>
						<th>Image</th>
						<th>Description</th>
						<th>Content</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($dataBlog as $blog)
						<tr>
							<td>{{$blog['id_blog'] }}</td>
							<td>{{$blog['title_blog'] }}</td>
							<td>{{$blog['image_blog'] }}</td>
							<td>{{$blog['description_blog'] }}</td>
							<td>{{$blog['content_blog'] }}</td>
							<td>
								<a class="btn btn-success" href="{{url('/editblog/'.$blog->id_blog)}}">Edit</a>
								<form method="POST" action="{{url('/deleteblog/'.$blog->id_blog)}}">
									@csrf
									@method('DELETE')
									<button class="btn btn-danger" type="submit">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach
						<tr>
							<td colspan="6">
								<a href="{{url('/addblog')}}" class="btn btn-success" type="submit">Add Blog</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection