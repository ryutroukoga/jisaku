@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <div class="d-flex justify-content-around">
                <form action="" method="POST" class="form-inline">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="投稿タイトル">
                    </div>
                    <button type="submit" class="btn btn-primary">検索</button>
                </form>
                <div class="card">
                    <div class="d-flex justify-content-center">
                        <div>違反報告数</div>
                        <button id="sortAsc" class="btn btn-link"
                            onclick="sortUsers('asc')">昇順</button>
                        <button id="sortDesc" class="btn btn-link"
                            onclick="sortUsers('desc')">降順</button>
                    </div>
                </div>
            </div>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">投稿タイトル</th>
                        <th scope="col">投稿ユーザー</th>
                        <th scope="col">ユーザー詳細</th>
                        <th scope="col">違反投稿件数</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td><a href="ページのURL">ユーザー名</a></td>
                        <td>4</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex flex-row-reverse">
                <button type="button" class="btn btn-link">次ページ＞</button>
                <button type="button" class="btn btn-link">＜前ページ</button>
            </div>
            <!-- 20件表示 -->
        </nav>
    </div>
</div>
@endsection