@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <h5>下記の内容で依頼申請します。</h5>
            <table class="table table-bordered narrow-table">
                <tbody>
                    <tr>
                        <td>内容</td>
                        <td>{{ $detail }}</td>
                    </tr>
                    <tr>
                        <td>電話番号</td>
                        <td>{{ $phone }}</td>
                    </tr>
                    <tr>
                        <td>メールアドレス</td>
                        <td>{{ $email }}</td>
                    </tr>
                    <tr>
                        <td>希望納期</td>
                        <td>{{ $DueDate }}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <form action="{{ route('request') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <input type="hidden" name="detail" value="{{ $detail }}">
                <input type="hidden" name="phone" value="{{ $phone }}">
                <input type="hidden" name="email" value="{{ $email }}">
                <input type="hidden" name="DueDate" value="{{ $DueDate }}">
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">申請する</button>
                </div>
            </form>
        </nav>
    </div>
</div>


@endsection