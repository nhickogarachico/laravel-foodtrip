@extends('layouts.main')

@section('title', $user->first_name . " " . $user->last_name .  " | Profile")

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

                    @if (Auth::check())
                        <a href="/{{$user->username}}/edit"class="btn btn-primary">Edit Profile</a>
                    @endif
                </div>

            </div>

        </div>
        <div class="col-9">
            <h5>Posts</h5>
            <p>31221312</p>
        </div>
    </div>

@endsection
