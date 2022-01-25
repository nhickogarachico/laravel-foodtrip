@extends('layouts.main')

@section('title', $user->username . ' - ' . $post->content)

@section('content')
    <div class="row">
        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $user->avatar }}" alt="{{ $user->username }} avatar" width="50" height="50"
                            class="rounded-circle">
                        <a href="/{{ $user->username }}">{{ $user->username }}</a>
                    </div>
                    <div>
                        <p>{{ $post->content }}</p>
                        @if ($post->image)
                            <img src="{{ $post->image }}" alt="{{ $post->content }} image" class="card-img-top">
                        @endif

                    </div>
                </div>
                <div class="card-footer">
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
                        @else
                            <x-like-button :post-id="$post->id" />
                        @endif


                    @endif
                    <div>

                        <h6>Comments</h6>
                        <hr>
                        @foreach ($comments as $comment)
                            <x-comment :comment="$comment" :user="$user" :post="$post" />
                        @endforeach
                    </div>
                    <div class="mb-3">
                        @if (Auth::check())
                            <form action="/{{ $user->username }}/posts/{{ $post->id }}/comments" method="POST">
                                @csrf
                                <textarea name="content" rows="3" class="form-control mb-2"
                                    placeholder="Add comment"></textarea>
                                @if ($errors->has('content'))
                                    @foreach ($errors->get('content') as $message)
                                        <p class="text-danger">{{ $message }}</p>
                                    @endforeach
                                @endif
                                <button type="submit" class="btn btn-primary">Comment</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
