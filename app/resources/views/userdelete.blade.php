@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5">
                <div class="card">
                    <div class="card-title text-center large-text">退会</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('delete.mypage') }}" method="POST">
                        @csrf
                        <div class="card-title text-center">退会するとすべてのデータが消えます。<br>
                            アカウントを削除しますか？
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-danger">退会する</button>
                        </div>
                        <p class="text-end">※マイページへ戻ります</p>
                    </form>
                </div>
            </nav>
        </div>
    </div>
</div>

@endsection