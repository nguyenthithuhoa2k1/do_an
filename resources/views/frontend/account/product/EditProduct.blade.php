@extends('frontend.layout.Master')
@section('content')
<div class="signup-form">
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
	<form method="POST" action="#" enctype="multipart/form-data" >
		@csrf
		@foreach($dataProduct as $product)
            <div>
                <span>Title</span>
                <input name="title" type="text" placeholder="title" value="{{$product->title}}"/>
            </div>
            <div>
                <span>Price</span>
                <input name="price" type="text" placeholder="price" value="{{$product->price}}"/>
            </div>
            <select name="id_category" class="category">
                <option>Please choose category</option>
                @foreach($dataCategory as $category)
                    @if($category->id == $product->id_category)
                        <option value="{{$category->id}}" selected>{{$category->category}}</option>
                    @else
                        <option value="{{$category->id}}" >{{$category->category}}</option>
                    @endif
                @endforeach
            </select>
            <select  name="id_brand" class="brand">
                <option>Please choose brand</option>
                @foreach($dataBrand as $brand)
                    @if($brand->id == $product->id_brand)
                        <option value="{{$brand->id}}" selected >{{$brand->brand}}</option>
                    @else
                        <option value="{{$brand->id}}" >{{$brand->brand}}</option>
                    @endif
                @endforeach
            </select>
            <select id="select-sale"  name="status" class="sale-product">
                <option value="0">sale</option>
                <option value="1">new</option>
            </select>
            <div>
                <input name="sale" class="hide" id="sale-number" type="text" style="width: 200px; display: inline-block;">
                <span id="percent" class="hide" >%</span>
            </div>
            <div>
                <input name="company"  type="text" placeholder="Company profile" value="{{$product->company}}" /> 
            </div>
            <div>
                <span>Image</span>
                <input id="image" type="file" class="form-control" name="image[]" multiple>
                <div class="row">
                    @foreach(json_decode($product->image) as $image)
                        <div class="col-md-4">
                            <img src="{{asset('/upload/product/'.$image)}}" width="100px" height="100px" style="margin-bottom: 10px;  ">
                            <input style="width:100px;" name="listImageRemove[]" type="checkbox" value="{{$image}}"> 
                        </div>
                    @endforeach
                </div>
            </div>
            <textarea name="detail" placeholder="detail">{{$product->detail}}</textarea>
		@endforeach
		<button  type="submit" class="btn btn-default">Edit product</button>
	</form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#select-sale').change(function(){
            var value = $(this).find('option:selected').val();
            console.log(value);
            if(value == 0){
                if($('#sale-number').hasClass('hide')){
                    $('#sale-number').removeClass('hide');
                }
                if($('#percent').hasClass('hide')){
                    $('#percent').removeClass('hide');
                }
            }
        });

        $("input[type='file']").on("change", function(e){  
            var numFiles = $(this).get(0).files.length
            var checked = $('input[type="checkbox"]:checked').map(function() {
                return $(this).val();
            }).get()
            var countChecked = checked.length;

            var noChecked = $('input[type="checkbox"]:not(:checked)').map(function() {
                return $(this).val();
            }).get()
            var countNoChecked = noChecked.length;

            if((numFiles + countNoChecked)>3){
                alert('lớn hơn 3 file');
                return false;
            }
        });
    });
</script>
@endsection