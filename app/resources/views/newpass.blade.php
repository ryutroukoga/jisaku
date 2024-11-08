@extends('layouts.layout')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <div class="card">
          <div class="card-title text-center large-text">パスワード再設定</div>
        </div>
        <div class="card-body">
          <form action="{{ route('password.update', $token) }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="d-flex justify-content-around">
              <label for="password" class="col-sm-5 col-form-label no-wrap space">新しいパスワード<span class="text-danger">*</span></label>
              <div class="col-sm-6">
                <input type="password" class="form-control" id="password" name="password" required/>
              </div>
            </div>
            <br>
            <div class="d-flex justify-content-around">
              <label for="password_confirmation" class="col-sm-5 col-form-label no-wrap space">新しいパスワード(確認)<span class="text-danger">*</span></label>
              <div class="col-sm-6">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required/>
              </div>
            </div>
            <br>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">登録</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection
