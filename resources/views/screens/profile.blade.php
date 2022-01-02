@extends('layouts.main')

@section('title', $user->first_name . ' ' . $user->last_name . ' | Profile')

@section('content')
    <div class="row py-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <img src="{{ $user->avatar }}" alt="{{ $user->username }} avatar" width="100" height="100">
                    <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                    <p>&commat;{{ $user->username }}</p>
                    <p>{{ $user->birthday }}</p>
                    <p>{{ $user->bio }}</p>
                    <p>joined {{ $user->created_at->diffForHumans() }}</p>

                    @if (Auth::user()->username == $user->username)
                        <a href="/{{ $user->username }}/edit" class="btn btn-primary">Edit Profile</a>
                    @endif
                </div>

            </div>

        </div>
        <div class="col-9">
            @if (Auth::user()->username == $user->username)
                <div class="mb-3">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="/posts" method="POST">
                        @csrf
                        <textarea name="content" rows="3" class="form-control mb-2" placeholder="Add new post"></textarea>
                        @if ($errors->has('content'))
                            @foreach ($errors->get('content') as $message)
                                <p class="text-danger">{{ $message }}</p>
                            @endforeach
                        @endif
                        <button class="btn btn-primary">Post</button>
                    </form>

                </div>
            @endif
            <h5 class="mb-3">Posts</h5>
            <div>
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <img src="{{$post->user->avatar}}" alt="{{$post->user->username}} avatar" class="rounded-circle" width="35" height="35">
                                <a href="/{{ $post->user->username }}"
                                    class="card-title">{{ $post->user->username }}</a>
                                    <p>Posted {{$post->created_at->diffForHumans()}}</p>
                            </div>
                            <p>{{ $post->content }}</p>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
