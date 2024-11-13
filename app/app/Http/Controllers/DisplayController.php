<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\In;

class DisplayController extends Controller
{
    //ホーム画面
    public function index()
    {
        $post = new Post;
        $all = $post->take(8)->get();
        return view('home', [
            'posts' => $all,
        ]);
    }
    // 無限スクロール機能
    public function loadMorePosts(Request $request)
    {
        $page = $request->get('page', 1);

        // 1ページあたりの表示件数
        $perPage = 4;
    
        // 投稿をページごとに取得
        $posts = Post::paginate($perPage, ['*'], 'page', $page); // paginate()を使用
    
        // 取得した投稿があれば、HTML部分を生成
        $hasMore = $posts->hasMorePages();  // 次のページがあるかどうかをチェック
    
        return response()->json([
            'posts' => view('partials.post-list', compact('posts'))->render(),
            'hasMore' => $hasMore
        ]);
    }

    //ポスト詳細画面
    public function postall(int $postID)
    {
        $post = Post::findOrFail($postID); // IDが存在しない場合は404を返す
        return view('postdetail', compact('post'));
    }

    //詳細から違反報告
    public function dangerpost(int $postID)
    {
        $post = Post::findOrFail($postID); // IDが存在しない場合は404を返す
        return view('dangerpost', compact('post'));
    }

    //投稿詳細から前画面に戻る
    public function request(int $postID)
    {
        $post = Post::findOrFail($postID); // IDが存在しない場合は404を返す
        return view('requestpost', compact('post'));
    }
    //ユーザー編集から退会画面へ
    public function userdelete1()
    {
        return view('userdelete');
    }
    
    //マイページから依頼投稿画面
    public function requestform()
    {
        return view('requestform');
    }







    //ログイン画面へ
    public function login()
    {
        return view('login');
    }
    //新規登録画面へ
    public function signnew()
    {
        return view('signnew');
    }
    //ログアウト
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function logingo()
    {
        return view('logingo');
    }

}
