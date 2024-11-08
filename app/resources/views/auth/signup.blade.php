@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5">
                <div class="card">
                    <div class="card-title text-center large-text">新規登録確認</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('sign') }}" method="POST">
                        @csrf
                        <div class="d-flex justify-content-around">
                        <img src="{{ asset('storage/' . $image) }}" alt="プロフィール画像" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                        </div>
                        <br>
                        <div class="d-flex justify-content-around">
                            <label for="name" class="col-sm-2 col-form-label no-wrap space">ユーザー名<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <p>{{ $name }}</p>
                                <input type="hidden" name="name" value="{{ $name }}">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-around">
                            <label for="email" class="col-sm-2 col-form-label no-wrap space">メールアドレス<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <p>{{ $email }}</p>
                                <input type="hidden" name="email" value="{{ $email }}">
                            </div>
                        </div>
                        <br>
                        <div class="d-flex justify-content-around">
                            <label for="image" class="col-sm-2 col-form-label no-wrap space">プロフィール画像<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <img src="{{ asset('storage/' . $image) }}" alt="プロフィール画像" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                                <input type="hidden" name="image" value="{{ $image }}">
                            </div>
                        </div>
                        <br>
                        <div class="d-grid gap-2 d-md-block text-center">
                            <button type="button" class="btn btn-secondary" onclick="goBack()">戻る</button>
                            <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>
@endsection
