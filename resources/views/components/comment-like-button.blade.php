<div>
    <form action="/comments/{{$commentId}}/like" method="POST">
        @csrf
        @method('PUT')
       <button type="submit" class="btn btn-primary">Like</button>
    </form>
</div>
