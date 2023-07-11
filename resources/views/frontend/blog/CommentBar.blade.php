<div class="replay-box hide" id="replay-id-{{$parent_id}}">
	<div class="row">
		<div class="col-sm-12">
			<h4>Leave a replay</h4>
			<form method="post" action="{{url('/blogdetail/comment')}}" enctype="multipart/form-data" class="form-comment">
				@csrf
				<input type="hidden" name="level" value="{{$parent_id}}">
				<input type="hidden" name="id_blog" value="{{$id_blog}}">
				<div class="blank-arrow">
					<label>{{Auth::user()->name}}</label>
				</div>
				<span>*</span>
				<textarea id="comment" name="comment" rows="3"></textarea>
				<button type="submit" class="btn btn-primary" style="padding: 6px 12px;">post comment</button>
			</form>
		</div>
	</div>
</div><!--/Repaly Box-->