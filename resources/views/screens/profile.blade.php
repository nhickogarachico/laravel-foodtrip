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

                    @if (Auth::check() && Auth::user()->username == $user->username)
                        <a href="/{{ $user->username }}/edit" class="btn btn-primary">Edit Profile</a>
                    @endif
                </div>

            </div>

        </div>
        <div class="col-9">
            @if (Auth::check() && Auth::user()->username == $user->username)
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
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>

                </div>
            @endif
            <h5 class="mb-3">Posts</h5>
            <div>
                @foreach ($posts as $post)
                    <x-post-component :post="$post"/>
                @endforeach
            </div>
        </div>
    </div>

@endsection
