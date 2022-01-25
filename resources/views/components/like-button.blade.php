<form action="/posts/{{ $postId }}/like" method="POST">
    @csrf
    <button type="button " class="react-btn link-red-hover ">
        <i class="bi bi-hand-thumbs-up "></i>
        <span class="fw-600 "></span>
    </button>
</form>

<div>
    <form action="/posts/{{ $postId }}/like" method="POST">
        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-primary">Like</button>
    </form>
</div>
