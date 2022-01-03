<div>
    <p>{{ $comment->content }}</p>
    <img src="{{$comment->user->avatar}}" alt="{{ $comment->user->username }} avatar" width='40' height=40 class="rounded-circle">
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
        <x-reply-button :comment="$comment"/>
       

        {{-- reply collapse --}}
        <div class="collapse" id="replyCollapse{{$comment->id}}">
            <p>Reply to {{$comment->user->username}}</p>
            <x-comment-form :comment="$comment"/>
        </div>
    @endif
    
    <a class="text-link" type="button" data-bs-toggle="collapse" data-bs-target="#repliesCollapse{{$comment->id}}"
        aria-expanded="false" aria-controls="repliesCollapse{{$comment->id}}">
        {{$replyCount}} Replies
    </a>

    {{-- replies collapse --}}
    <div class="collapse" id="repliesCollapse{{$comment->id}}">
        @foreach ($replies as $reply)
            <x-comment :comment="$reply" :user="$user" :post="$post" />
        @endforeach
    </div>
    
</div>
