@if (Auth::check())
    <form action="/{{ Auth::id() }}/request/{{ $userSecond->id }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Add Friend</button>
    </form>
@endif
