@extends('layouts.main')

@section('title', 'Friend Requests')

@section('content')
    <p>Friend Requests</p>
    @foreach ($friendRequests as $friendRequest)
        <p>{{$friendRequest->secondUser->username}}</p>
    @endforeach
@endsection