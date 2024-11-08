@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <div class="d-flex mb-3">
                <div class="p-2"><img src="https://via.placeholder.com/80" alt="ユーザー名" class="user-image"></div>
                <div class="p-2 large-text">ユーザー名</div>
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
                    <tr>
                        <td><img src="https://via.placeholder.com/50" alt="ユーザー名" class="user-image"></td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                    </tr>
                </tbody>
            </table>
            <!-- 無限スクロール実装予定 -->
        </nav>
    </div>
</div>

@endsection