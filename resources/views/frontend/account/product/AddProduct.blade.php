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
	<form method="POST" action="{{url('/member/addproduct')}}" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="id_product" type="text" placeholder="ID product" />
		<div>
            <span>Title</span>
            <input name="title" type="text" placeholder="Title"/>      
        </div>
		<div>
            <span>Price</span>
            <input name="price" type="text" placeholder="price"/>      
        </div>
        <select name="category" class="category">
            <option>Please choose category</option>
            @foreach($dataCategory as $category)
            <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
        </select>
        <select  name="brand" class="brand">
            <option>Please choose brand</option>
            @foreach($dataBrand as $brand)
            <option value="{{$brand->id}}">{{$brand->brand}}</option>
            @endforeach
        </select>
        <select id="select-sale"  name="status" class="sale-product">
            <option value="0">sale</option>
            <option value="1">new</option>
        </select>
        <div class="sale-number">
            <input id="sale-number" type="text" name="sale" style="width: 200px; display: inline-block;">
            <span id="percent">%</span>
        </div>
        <div>
            <input name="company"  type="text" placeholder="Company profile"/>      
        </div>
        <input id="image" required type="file" class="form-control" name="image[]" multiple>
		<input type="hidden" name="id_user" type="text" placeholder="id_user"/>
        <textarea name="detail" placeholder="detail"></textarea>
		<button class="submit" type="submit" class="btn btn-default">Add product</button>
	</form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("input[type='file']").on("change", function(e){  
            var numFiles = $(this).get(0).files.length;
            if(numFiles > 3){
                alert('lớn hơn 3 file');
                return false;
            }else{
                return true;;
            }
        });
        $('#select-sale').change(function(){
            var value = $(this).find('option:selected').val();
            console.log(value);
            if(value == 0){
                $(".sale-number").removeClass("hide");
            }else{
                $(".sale-number").addClass("hide");
            }
        });
    });
</script>
@endsection