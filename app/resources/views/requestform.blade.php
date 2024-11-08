@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="d-flex justify-content-around">
                    <div class="p-2">
                        <img src="https://via.placeholder.com/100" alt="ユーザー名" class="user-image">
                    </div>
                    <table class="table table-bordered narrow-table">
                        <tbody>
                            <tr>
                                <td>タイトル<span class="text-danger">*</span></td>
                                <td><input type="text" name="title" class="form-control uniform-input" required></td>
                            </tr>
                            <tr>
                                <td>金額<span class="text-danger">*</span></td>
                                <td><input type="number" name="amount" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>内容<span class="text-danger">*</span></td>
                                <td><textarea name="content" class="form-control" required></textarea></td>
                            </tr>
                            <tr>
                                <td>画像</td>
                                <td><input type="file" name="image" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">依頼する</button>
                </div>
            </form>
        </nav>
    </div>
</div>
@endsection
