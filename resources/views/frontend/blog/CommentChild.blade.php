<li class="media {{ 'comment-level-'.$level }}" data-id="{{$comment->id}}" data-level="{{$level}}" id="comment-id-{{$comment->id}}">
	<a class="pull-left" href="#">
		@if($comment->avatar_user=="")
		 	<img class="media-object" width="100" height="100" src="{{asset('admin/upload/user/avatar-default.jpg')}}" alt="">
		@else
			<img class="media-object" width="100" height="100" src="{{asset('admin/upload/user/'.$comment->avatar_user)}}" alt="">
		@endif
	</a>
	<div class="media-body">
		<ul class="sinlge-post-meta">
			<li><i class="fa fa-user"></i> {{$comment->name_user}}</li>
			<li><i class="fa fa-clock-o"></i> {{$comment->created_at->format('H:i A')}}</li>
			<li><i class="fa fa-calendar"></i> {{$comment->created_at->format('M d, Y')}}</li>
		</ul>
		<p>{{$comment->comment}}</p>
		<a class="btn btn-primary replay-comment" href=""><i class="fa fa-reply"></i>Replay</a>
		@include('frontend.blog.CommentBar', ['id_blog' => $comment->id_blog, 'parent_id' => $comment->id])
	</div>
</li>