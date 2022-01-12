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


                @if (!Auth::user()->relationshipTypeSender($user->id) && !Auth::user()->relationShipTypeInvited($user->id) && Auth::id() != $user->id)
                    <x-add-friend-button :user-second="$user" />
                @elseif(Auth::user()->relationshipTypeSender($user->id))
                    @if (Auth::user()->relationshipTypeSender($user->id)->type == 1)
                        <div>
                            <span class="badge bg-info">Pending Invite</span>
                        </div>
                    @elseif(Auth::user()->relationshipTypeSender($user->id)->type == 3)
                        <div>
                            <span class="badge bg-primary">Friends</span>
                        </div>
                    @endif
                @elseif(Auth::user()->relationshipTypeInvited($user->id))
                    @if (Auth::user()->relationshipTypeInvited($user->id)->type == 1)
                        <div>
                            <span class="badge bg-info">Sent an invite</span>
                        </div>
                        <div class="d-flex">
                            <form action="/friend-requests/{{ Auth::user()->relationshipTypeInvited($user->id)->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-primary">Accept</button>
                            </form>
                            <form action="/friend-requests/{{ Auth::user()->relationshipTypeInvited($user->id)->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Decline</button>
                            </form>
                        </div>
                    @elseif(Auth::user()->relationshipTypeInvited($user->id)->type == 3)
                        <div>
                            <span class="badge bg-primary">Friends</span>
                        </div>
                    @endif
                @endif



                <a href="/{{ $user->username }}" class="btn btn-warning">View profile</a>
            </div>
        </div>

    @empty
        <p>{{ $users->count() }} result for '{{ $search }}'</p>
    @endforelse




@endsection
