@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5 nav-card">
                <div class="text-center">
                    <a href="{{ route('alluser') }}" button class="btn btn-primary" type="button">ユーザー一覧</a>
                    <br>
                    <br>
                    <a href="{{ route('allpost') }}" button class="btn btn-primary" type="button">投稿一覧</a>
                </div>
            </nav>
        </div>
    </div>
</div>

@endsection