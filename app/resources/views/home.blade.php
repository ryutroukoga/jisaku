@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <form action="" method="POST" class="form-inline">
                @csrf
                <div class="d-flex justify-content-evenly">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" placeholder="キーワード">
                    </div>
                    <select name='status' class='form-control'>
                        <option value='amount' hidden>金額</option>
                        <option value='yen'>1000</option>
                    </select>
                    <p>円～</p>
                    <select name='amount' class='form-control'>
                        <option value='amount' hidden>金額</option>
                        <option value='yen'>2000
                        </option>
                    </select>
                    <p>円</p>
                    <div class="form-group">
                        <input type="text" name="sort" class="form-control" placeholder="並び替え">
                    </div>
                    <select name='status' class='form-control'>
                        <option value='stutas' hidden>ステータス</option>
                        <option value='uplode'>掲載中</option>
                        <option value='move'>進行中</option>
                        <option value='done'>完了</option>
                    </select>
                    <button type="submit" class="btn btn-primary">検索</button>
                </div>
            </form>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>タイトル</th>
                        <th>内容</th>
                        <th>金額</th>
                        <th>ステータス</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr onclick="location.href='{{ route('post.all', ['id' => $post['id']]) }}'" style="cursor: pointer;">
                        <td><img src="https://via.placeholder.com/50" alt="ユーザー名" class="user-image">{{ $post['image'] }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['detail'] }}</td>
                        <td>{{ $post['amount'] }}</td>
                        <td>{{ $post['status'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- 無限スクロール、TOPへ戻るボタン実装予定 -->
        </nav>
    </div>
</div>
@endsection