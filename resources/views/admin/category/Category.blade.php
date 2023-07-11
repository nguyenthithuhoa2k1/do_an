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
						<th>Category</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($dataCategory as $category)
							<tr>
								<td>{{$category->id}}</td>
								<td>{{$category->category}}</td>
								<td>
									<a href="{{url('/editcategory/'.$category->id)}}">Edit</a>
									<form method="post" action="{{url('/deletecategory/'.$category->id)}}">
										@csrf
										@method('DELETE')
										<button class="btn btn-success" type="submit">Delete</button>
									</form>
								</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="3">
								<a href="{{url('/addcategory')}}" class="btn btn-success">Add Category</a>
							</td>
						</tr>
					</tbody>

				</table>
				{{ $dataCategory->links('pagination::bootstrap-4'); }}
			</div>
		</div>
	</div>	
@endsection