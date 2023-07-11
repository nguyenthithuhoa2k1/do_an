<!-- show comment -->
@include('frontend.blog.CommentChild', ['comment' => $comment, 'level' => $level])

<!-- Show comment child -->
@if($comment->children->count() > 0)
    @foreach($comment->children as $comment)
		@include('frontend.blog.Comment', ['comment' => $comment, 'level' => ++$level])
	@endforeach
@endif