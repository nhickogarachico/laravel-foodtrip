@extends('layouts.main')

@section('title', 'Friends List')

@section('content')
    <h5>Friends</h5>
    @foreach ($friends as $friend)
        @if (Auth::id() == $friend->user_first_id)
            <p>{{ $friend->secondUser->username }}</p>
            <a href="/{{ $friend->secondUser->username }}" class="btn btn-primary">View profile</a>
        @else
            <p>{{ $friend->firstUser->username }}</p>
            <a href="/{{ $friend->firstUser->username }}" class="btn btn-primary">View profile</a>
        @endif
        
    @endforeach
@endsection
