@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <div class="p-2">
                        <img src="{{ $post->image }}" alt="ユーザー名" class="user-image" style="width: 80px; height: auto;">
                    </div>
                    <div class="ms-3">
                        <p class="card-text　large-text">{{ $post->title }}</p>
                        <p class="card-text">{{ $post['detail'] }}</p>
                    </div>
                </div>
            </div>
            <form action="{{ route('danger.post2') }}" method="post">
                @csrf
                <h7>この投稿の問題点をご記載ください。必須ではありません。</h7>
                <textarea class="form-control" name="detail"></textarea>
                <input type='hidden' name='post_id' id='post_id' value="{{ $post['id'] }}" />
                <input type='hidden' name='user_id' id='user_id' value="{{ $post['user_id'] }}" />
                <br>
                <div class="d-flex justify-content-evenly">
                    <button class="btn btn-primary">報告する</button>
                </div>
                <div class="text-right">
                    <p>※ホーム画面に戻ります</p>
                </div>
            </form>
        </nav>
    </div>
</div>

@endsection