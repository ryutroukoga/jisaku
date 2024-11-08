@extends('layouts.layout')

@section('content')
<!-- フォーム画面 (postdetail.blade.php) -->
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <div class="card">
                <div class="card-body d-flex align-items-start">
                    <div class="p-2">
                        <img src="{{ $post->image }}" alt="ユーザー名" class="user-image" style="width: 80px; height: auto;">
                    </div>
                    <div class="ms-3">
                        <p class="card-text large-text">{{ $post->title }}</p>
                        <p class="card-text">{{ $post->detail }}</p>
                    </div>
                </div>
            </div>
            <br>
            <form action="{{ route('request.check') }}" method="POST">
                @csrf
                <table class="table table-bordered narrow-table">
                    <tbody>
                        <tr>
                            <td>内容<span class="text-danger">*</span></td>
                            <td><textarea class="form-control" name="detail" required></textarea></td>
                        </tr>
                        <tr>
                            <td>電話番号</td>
                            <td><input type="tel" name="phone" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>メールアドレス<span class="text-danger">*</span></td>
                            <td><input type="email" name="email" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>希望納期</td>
                            <td><input type="date" name="DueDate" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">確認画面へ</button>
                </div>
            </form>
        </nav>
    </div>
</div>


@endsection