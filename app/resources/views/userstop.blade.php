@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-offset-3 col-md-6">
            <nav class="card mt-5">
                <div class="text-center large-text">ユーザー名</div>
                <div class="card-body">
                    <form action="" method="POST">
                        @csrf
                        <div class="card-title text-center">このユーザーの利用を停止します</div>
                        <br>
                        <div class="text-center">
                            <button type="button" class="btn btn-danger">停止する</button>
                        </div>
                    </form>
            </nav>
        </div>
    </div>
</div>
@endsection