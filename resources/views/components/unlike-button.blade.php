<div>
    <form action="/posts/{{$postId}}/unlike" method="POST">
        @csrf
        @method('DELETE')
       <button type="submit" class="btn btn-primary">Unlike</button>
    </form>
</div>
