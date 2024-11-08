@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5 nav-card">
                <div class="text-center">
                    <p>ログインしてください</p>
                    <a href="{{ route('login') }}" class="btn btn-primary" type="button">ログイン画面へ</a>
                    <br>
                    <br>
                    <button class="btn btn-secondary" type="button" onclick="history.back()">戻る</button>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection
