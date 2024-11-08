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
          <form action="{{ route('reset.mail') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-around">
              <label for="email" class="col-sm-2 col-form-label no-wrap">メールアドレス<span class="text-danger">*</span></label>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required/>
              </div>
            </div>
            <br>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">メール送信</button>
            </div>
          </form>
        </div>
      </nav>
    </div>
  </div>
</div>
@endsection
