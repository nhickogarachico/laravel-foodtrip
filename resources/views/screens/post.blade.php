@extends('layouts.main')

@section('title', $user->username . ' - ' . $post->content)

@section('content')
    <div class="row">
        <div class="col mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <img src="{{ $user->avatar }}" alt="{{ $user->username }} avatar" width="50" height="50"
                            class="rounded-circle">
                        <a href="/{{ $user->username }}">{{ $user->username }}</a>
                    </div>
                    <div>
                        <p>{{ $post->content }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="mb-3">
                        <textarea name="comment" rows="3" class="form-control mb-2" placeholder="Add comment"></textarea>
                        <button class="btn btn-primary">Comment</button>
                    </div>
                    <div>
                        <h6>Comments</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
