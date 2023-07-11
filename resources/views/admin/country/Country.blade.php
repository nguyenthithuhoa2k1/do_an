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
						<th>Name</th>
						<th>Action</th>
					</thead>
					<tbody>
						@foreach($dataCountry as $country)
							<tr>
								<td>{{$country->id_country}}</td>
								<td>{{$country->name_country}}</td>
								<td>
									<a href="{{ url('/editcountry/'.$country->id_country) }}">Edit</a>
									<form method="post" action="{{url('/deletecountry/'.$country->id_country)}}">
										@csrf
										@method('DELETE')
										<button class="btn btn-success" type="submit">Delete</button>
									</form>
								</td>
							</tr>
						@endforeach
						<tr>
							<td colspan="3">
								<a href="{{url('/addcountry')}}" class="btn btn-success">Add country</a>
							</td>
						</tr>
					</tbody>

				</table>
				{{ $dataCountry->links('pagination::bootstrap-4'); }}
			</div>
		</div>
	</div>	
@endsection