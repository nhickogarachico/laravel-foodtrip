<div class="card mb-3">
    <div class="card-body">
        <div class="mb-3">
            <img src="{{ $post->user->avatar }}" alt="{{ $post->user->username }} avatar" class="rounded-circle"
                width="35" height="35">
            <a href="/{{ $post->user->username }}" class="card-title">{{ $post->user->username }}</a>
            <p>Posted {{ $post->created_at->diffForHumans() }}</p>
        </div>
        <p>{{ $post->content }}</p>

    </div>
    <div class="card-footer">
        <div>
            @if ($likeCount > 1)
                <p>{{ $likeCount }} likes</p>
            @else
                <p>{{ $likeCount }} like</p>
            @endif

            @if ($commentCount > 1)
                <p>{{ $commentCount }} comments</p>
            @else
                <p>{{ $commentCount }} comment</p>
            @endif

            @if (Auth::check())
                @if ($isLiked)
                    <x-unlike-button :post-id="$post->id" />
                @else
                    <x-like-button :post-id="$post->id" />
                @endif
            @endif

        </div>


        <a href="/{{ $post->user->username }}/posts/{{ $post->id }}">Go to post page</a>
    </div>
</div>
