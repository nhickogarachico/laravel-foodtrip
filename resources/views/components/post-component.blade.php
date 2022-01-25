<div class="card mb-3 ">
    <div class="card-body ">
        <div class="card-title d-flex justify-content-between mb-3 ">
            <div class="d-flex align-items-center ">
                <img src="{{ $post->user->avatar }}" alt="{{ $post->user->username }} avatar"
                    class="small-avatar rounded-circle ">
                <div class="ms-2 ">
                    <a href="/{{ $post->user->username }}"
                        class="fs-6 fw-600 d-inline text-decoration-none text-dark">{{ $post->user->username }}</a>
                    <p class="fs-6 ">{{ $post->created_at->diffForHumans() }}</p>
                </div>
            </div>
            <div class="dropdown ">
                <button class="settings-btn py-0 " type="button " id="postSettingsButton " data-bs-toggle="dropdown "
                    aria-expanded="false ">
                    <i class="fas fa-ellipsis-h text-main-red "></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end post-settings-dropdown py-0 shadow "
                    aria-labelledby="postSettingsButton ">
                    <li><a class="dropdown-item " href="# ">Edit post</a></li>
                    <li><a class="dropdown-item " href="# ">Delete Post</a></li>
                </ul>
            </div>
        </div>
        <div class="card-text ">
            {{ $post->content }}
        </div>
        <div class="card-text ">
            <span>@ <a href="# ">Aling Rosing's Diner</a></span>
        </div>
        <img src="./images/assets/food-1.jpg " alt class="card-img-top my-2 post-img ">
        <div class="mb-2 ">
            <a href="# " class="food-tag ">Sisig</a>
        </div>

        <div class="d-flex align-items-center mt-2 ">
            <div class="me-2 ">
                @if (Auth::check())
                    <like-button v-bind:post-id="{{ $post->id }}" />
                @else
                    <a href="/login" class="react-btn link-red-hover text-dark text-decoration-none">
                        <i class="bi bi-hand-thumbs-up "></i>
                        <span class="fw-600 ">{{$likeCount}}</span>
                    </a>
                @endif
            </div>
            <div>
                <a href="/{{ $post->user->username }}/posts/{{ $post->id }}"
                    class="react-btn link-red-hover text-decoration-none text-dark">
                    <i class="bi bi-chat-left-text"></i>
                    <span class="fw-600 ">{{ $commentCount }}</span>
                </a>
            </div>
        </div>

    </div>

</div>


