@extends('layouts.main')

@section('title', 'Search Result')

@section('content')
    <h2>Search Results</h2>
    @if ($users->count() > 0)
        <p>{{ $users->count() }} results for '{{ $search }}'</p>
    @endif
    @forelse ($users as $user)
        <div class="card">
            <div class="card-body">
                <img src="{{ $user->avatar }}" alt="{{ $user->username }} avatar" width="50" height="50">
                <p><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></p>
                <p>{{ $user->username }}</p>
                @if (Auth::user() != $user)
                    <x-add-friend-button :user-second="$user"/>
                @endif

                <a href="/{{ $user->username }}" class="btn btn-warning">View profile</a>

            </div>
        </div>

    @empty
        <p>{{ $users->count() }} result for '{{ $search }}'</p>
    @endforelse

@endsection
