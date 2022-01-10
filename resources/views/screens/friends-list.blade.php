@extends('layouts.main')

@section('title', 'Friends List')

@section('content')
    <h5>Friends</h5>
    @foreach ($friends as $friend)
        <p>{{$friend->username}}</p>
    @endforeach
@endsection
