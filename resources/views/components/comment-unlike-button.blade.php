<div>
    <form action="/comments/{{$commentId}}/unlike" method="POST">
        @csrf
        @method('DELETE')
       <button type="submit" class="btn btn-primary">Unlike</button>
    </form>
</div>
