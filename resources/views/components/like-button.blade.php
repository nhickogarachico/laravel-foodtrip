<div>
    <form action="/posts/{{$postId}}/like" method="POST">
        @csrf
        @method('PUT')
       <button type="submit" class="btn btn-primary">Like</button>
    </form>
</div>
