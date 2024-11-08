@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <div class="d-flex justify-content-around">
                <form action="" method="POST" class="form-inline">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="ユーザー名を入力">
                    </div>
                    <button type="submit" class="btn btn-primary">検索</button>
                </form>
                <div class="card">
                    <div class="d-flex justify-content-center">
                        <div>表示停止件数</div>
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
                        <th scope="col">ユーザー名</th>
                        <th scope="col">ユーザー詳細</th>
                        <th scope="col">投稿件数</th>
                        <th scope="col">表示停止件数</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user['name'] }}</td>
                        <td><a href="ページのURL">{{ $user['name'] }}</a></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex flex-row-reverse">
                <button type="button" class="btn btn-link">次ページ＞</button>
                <button type="button" class="btn btn-link">＜前ページ</button>
            </div>
        </nav>
        <!-- 10件表示 -->
    </div>
</div>

@endsection