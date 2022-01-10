@extends('layouts.main')

@section('title', 'Friend Requests')

@section('content')
    <p>Friend Requests</p>
    <h5>Sent requests</h5>
    @foreach ($sentRequests as $sentRequest)
        <div>
            <p>{{ $sentRequest->secondUser->username }}</p>
            @if ($sentRequest->type == 1)
                <p>Status: Pending</p>
            @endif
        </div>
    @endforeach
    <h5>Requests from others</h5>
    @foreach ($friendRequestsFromOthers as $friendRequestsFromOther)
        <div>
            <p>{{ $friendRequestsFromOther->firstUser->username }}</p>
            <form action="/friend-requests/{{ $friendRequestsFromOther->id }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary">Accept</button>
            </form>
            <form action="/friend-requests/{{ $friendRequestsFromOther->id }}" method="POST"> 
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Decline</button>
            </form>
        </div>

    @endforeach
@endsection
