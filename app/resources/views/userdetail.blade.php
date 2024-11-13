@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <div class="d-flex mb-3">
                @foreach($users->posts as $post)
                <div class="p-2"><img src="https://via.placeholder.com/80" alt="ユーザー名" class="user-image"></div>
                <div class="p-2 large-text">{{ $post->users->name }}</div>
                <div class="ms-auto p-2"><button type="button" class="btn btn-danger">ユーザー利用停止</button></div>
            </div>
            <br>
            <table class="table table-hover">
                <thead>
                    <h4>投稿一覧</h4>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">タイトル</th>
                        <th scope="col">内容</th>
                        <th scope="col">金額</th>
                        <th scope="col">報告数</th>
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="window.location='{{ route('kanripost.detail', $post->id) }}'">
                        <td><img src="{{ $post->image }}" alt="{{ $post->users->name }}" class="user-image"></td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->detail }}</td>
                        <td>{{ $post->amount }}</td>
                        <td>{{ $post->dangers_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- 無限スクロール実装予定 -->
        </nav>
    </div>
</div>
@endsection