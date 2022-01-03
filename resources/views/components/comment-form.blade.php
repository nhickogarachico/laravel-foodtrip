<form action="/comments/{{$comment->id}}/reply" method="POST">
    @csrf
    <textarea name="content{{$comment->id}}" rows="3" class="form-control mb-2"
        placeholder="Add comment"></textarea>
    @if ($errors->has('content{{$comment->id}}'))
        @foreach ($errors->get('content{{$comment->id}}') as $message)
            <p class="text-danger">{{ $message }}</p>
        @endforeach
    @endif
    <button type="submit" class="btn btn-primary">Comment</button>
</form>