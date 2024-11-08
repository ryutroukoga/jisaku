@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5">
                <div class="card">
                    <div class="card-title text-center large-text">編集・退会</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.update') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="d-flex justify-content-around">
                            <img src="https://via.placeholder.com/60" alt="ユーザー名" class="user-image">
                        </div>
                        <br>

                        <div class="d-flex justify-content-around">
                            <label for="name" class="col-sm-2 col-form-label no-wrap space">ユーザー名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" value="">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-around">
                            <label for="email" class="col-sm-2 col-form-label no-wrap space">メールアドレス</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email" name="email" value="">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-around">
                            <label for="password" class="col-sm-2 col-form-label no-wrap space">パスワード</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password" name="password" />
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="d-grid gap-2 col-3 mx-auto">
                            <button type="submit" class="btn btn-primary">変更する</button>
                        </div>
                    </form>
                    <form action="{{ route('user.delete') }}" method="POST" class="mt-3">
                        @csrf
                        @method('POST')
                        <div class="d-grid gap-2 col-3 mx-auto">
                            <button type="submit" class="btn btn-danger">退会する</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>
@endsection