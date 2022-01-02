@extends('layouts.main')

@section('title', 'Edit Profile')

@section('content')
    <h1>Edit Profile</h1>
    <a href="/{{ $user->username }}" class="btn btn-light">Back to profile</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="/{{ $user->username }}/edit" method="POST">
        @csrf
        @method('PUT')
        <div><img src="{{ $user->avatar }}" alt=""></div>
        <div class="mb-3">
            <label for="avatarFile" class="form-label">Upload image</label>
            <input class="form-control" type="file" id="avatarFile">
        </div>
        <div>
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="first name" value={{ $user->first_name }}
                name="firstName">
            @if ($errors->has('firstName'))
                @foreach ($errors->get('firstName') as $message)
                    <p class="text-danger">{{ $message }}</p>
                @endforeach
            @endif
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" placeholder="last name" value={{ $user->last_name }} name="lastName">
            @if ($errors->has('lastName'))
                @foreach ($errors->get('lastName') as $message)
                    <p class="text-danger">{{ $message }}</p>
                @endforeach
            @endif
        </div>
        <div>
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" name="birthday" class="form-control" value={{ $user->birthday }}>
        </div>
        <div>
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" value={{ $user->username }}>
            @if ($errors->has('username'))
                @foreach ($errors->get('username') as $message)
                    <p class="text-danger">{{ $message }}</p>
                @endforeach
            @endif
        </div>
        <div>
            <label for="bio" class="form-label">Bio</label>
            <textarea class="form-control" id="bio" rows="3" name="bio">{{ $user->bio }}</textarea>
            @if ($errors->has('bio'))
                @foreach ($errors->get('bio') as $message)
                    <p class="text-danger">{{ $message }}</p>
                @endforeach
            @endif
        </div>
        <div>
            <a href="/{{ $user->username }}" class="btn btn-danger">Cancel</a>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
