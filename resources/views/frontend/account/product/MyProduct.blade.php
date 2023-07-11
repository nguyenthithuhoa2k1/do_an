@extends('frontend.layout.Master')
@section('slide')
@endsection
@section('sidebar')
@endsection
@section('content')
	@if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
            {{session('success')}}
        </div>
    @endif
	<table class="table" style="background-color:#e7e3de " >
	  <thead style="background-color: #FE980F">
	    <tr>
	      <th scope="col">ID</th>
	      <th scope="col">Title</th>
	      <th scope="col">Price</th>
	      <th scope="col">Image</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($dataProduct as $product)
	    <tr>
	      <th scope="row">{{$product->id_product}}</th>
	      <td>{{$product->title}}</td>
	      <td>{{$product->price}} VND</td>
	      <td>
	      	@foreach(json_decode($product->image) as $image)
	      	  <img width="100px" height="100px" src="{{asset('/upload/product/'.$image)}}">
	      	@endforeach
	      </td>
	      <td>
	      	<a href="{{url('/member/editproduct/'.$product->id_product)}}">edit</a>
	      	<form method="POST" action="{{url('/member/editproduct/'.$product->id_product)}}">
	      		@csrf
	      		@method('DELETE')
	      		<button type="submit">Delete</button>
	      	</form>
	      </td>
	    </tr>
	    @endforeach
	    <tr  colspan="5">
	    	 <td><a class="submit" href="{{url('/member/addproduct')}}">Add product</a></td>
	    </tr>
	  </tbody>
	</table>
	{{$dataProduct ->links('pagination::bootstrap-4')}}
@endsection
