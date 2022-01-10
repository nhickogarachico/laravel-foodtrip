@extends('layouts.main')

@section('title', 'Home | FoodTrip')

@section('content')
    <p>Home</p>
    <h5>Posts</h5>
    @foreach ($posts as $post)
        <p>{{ $post->content }}</p>
        @if ($post->image)
            <img src="{{ $post->image }}" alt="image" />
        @endif
        <p>{{ $post->user->username }}</p>
        <p>Posted {{ $post->created_at->diffForHumans() }}</p>
    @endforeach
@endsection
