@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <div class="d-flex justify-content-around">
                <div class="p-2">
                    <img src="https://via.placeholder.com/80" alt="ユーザー名" class="user-image">
                </div>
                <table>
                    <tbody>
                        <tr>
                            <td>ユーザー名</td>
                            <td>
                                <span>{{ $user->name }}</span>
                            </td> 
                        </tr>
                        <tr>
                            <td>メールアドレス</td>
                            <td>
                                <span>{{ $user->email }}</span>
                            </td> 
                        </tr>
                        <tr>
                            <td>パスワード</td>
                            <td>
                                <span>パスワードは表示できません</span>
                            </td> 
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('user.edit') }}">
                    <button type="button" class="btn btn-warning">編集・退会</button>
                </a>
            </div>
            <hr class="custom-hr">
            <h5>投稿一覧</h5>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <a href="遷移先のURL" class="text-decoration-none">
                    <div class="card">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">タイトル</h5>
                        </div>
                    </div>
                </a>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <a href="" class="btn btn-primary">依頼投稿する</a>
            </div>
        </nav>
    </div>
</div>
@endsection
