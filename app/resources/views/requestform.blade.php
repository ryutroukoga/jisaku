@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <form action="requestform1" method="POST" enctype="multipart/form-data">
                @csrf
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
                            <td><textarea name="detail" class="form-control" required></textarea></td>
                        </tr>
                        <tr>
                            <td>画像</td>
                            <td><input type="file" name="image" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">依頼する</button>
                </div>
            </form>
        </nav>
    </div>
</div>
@endsection