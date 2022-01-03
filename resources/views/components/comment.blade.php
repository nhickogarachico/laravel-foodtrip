<div>
    <p>{{ $comment->content }}</p>
    <a href="/{{ $comment->user->username }}">{{ $comment->user->username }}</a>
    <p>{{ date('F d, Y - h:i a', strtotime($comment->created_at)) }}</p>

    @if ($likeCount > 1)
        <p>{{ $likeCount }} likes</p>
    @else
        <p>{{ $likeCount }} like</p>
    @endif
    
    @if (Auth::check())
        @if ($isLiked)
            <x-comment-unlike-button :comment-id="$comment->id" />
        @else
            <x-comment-like-button :comment-id="$comment->id" />
        @endif


    @endif
    <hr>
</div>
