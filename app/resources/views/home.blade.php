@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <nav class="card mt-5 nav-card">
            <form action="" method="POST" class="form-inline">
                @csrf
                <div class="d-flex justify-content-evenly">
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control" placeholder="キーワード">
                    </div>
                    <select name='status' class='form-control'>
                        <option value='amount' hidden>金額</option>
                        <option value='yen'>1000</option>
                    </select>
                    <p>円～</p>
                    <select name='amount' class='form-control'>
                        <option value='amount' hidden>金額</option>
                        <option value='yen'>2000
                        </option>
                    </select>
                    <p>円</p>
                    <div class="form-group">
                        <input type="text" name="sort" class="form-control" placeholder="並び替え">
                    </div>
                    <select name='status' class='form-control'>
                        <option value='stutas' hidden>ステータス</option>
                        <option value='uplode'>掲載中</option>
                        <option value='move'>進行中</option>
                        <option value='done'>完了</option>
                    </select>
                    <button type="submit" class="btn btn-primary">検索</button>
                </div>
            </form>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>タイトル</th>
                        <th>内容</th>
                        <th>金額</th>
                        <th>ステータス</th>
                    </tr>
                </thead>
                <tbody id="post-list">
                    @foreach($posts as $post)
                    <tr onclick="location.href='{{ route('post.all', ['id' => $post['id']]) }}'" style="cursor: pointer;">
                        <td><img src="https://via.placeholder.com/50" alt="ユーザー名" class="user-image">{{ $post['image'] }}</td>
                        <td>{{ $post['title'] }}</td>
                        <td>{{ $post['detail'] }}</td>
                        <td>{{ $post['amount'] }}</td>
                        <td>{{ $post['status'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- 無限スクロール、TOPへ戻るボタン実装予定 -->
            <!-- ローディングインジケーター -->
            <div id="loading" style="display: none;">読み込み中...</div>
        </nav>
    </div>
</div>

<script>
    let page = 1;
    let loading = false;

    window.addEventListener('scroll', function() {
        if (loading) return;

        if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 100) {
            loading = true;
            document.getElementById('loading').style.display = 'block'; // ローディング表示

            fetch('{{ route("loadMorePosts") }}?page=' + (page + 1))
                .then(response => response.json())
                .then(data => {
                    if (data.posts.length > 0) {
                        // 新しい投稿を下に追加
                        document.getElementById('post-list').innerHTML += data.posts;
                        page++; // ページ番号をインクリメント
                    } else {
                        // データが無ければローディングを非表示に
                        document.getElementById('loading').style.display = 'none';
                    }

                    // 次のページが無い場合、スクロールイベントを解除
                    if (!data.hasMore) {
                        window.removeEventListener('scroll', arguments.callee);
                        document.getElementById('loading').style.display = 'none';
                    }

                    loading = false;
                })
                .catch(() => {
                    loading = false;
                    document.getElementById('loading').style.display = 'none';
                });
        }
    });
</script>
@endsection