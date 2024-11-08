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
        $all = $post->all();
        return view('home', [
            'posts' => $all,
        ]);
    }
    public function mypage()
    {
        $post = new Post;
        $all = $post->all();
        return view('home', [
            'posts' => $all,
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

    public function a()
    {
        return view('requestformedit');
    }





    // //パスワードリセット
    // // メールドレス入力画面
    // public function passwordreset()
    // {
    //     return view('password');
    // }

    // // パスワードリセットリンクをメールで送信
    // public function sendResetLink(Request $request)
    // {
    //     // バリデーション
    //     $request->validate(['email' => 'required|email']);
    //     // リセットリンクを送信
    //     $response = Password::sendResetLink($request->only('email'));
    //     // 成功メッセージ
    //     if ($response == Password::RESET_LINK_SENT) {
    //         return back()->with('status', trans($response));
    //     }
    //     // エラーメッセージ
    //     return back()->withErrors(['email' => trans($response)]);
    // }

    // // パスワード変更フォームを表示
    // public function showResetForm(Request $request, $token)
    // {
    //     return view('newpass')->with(['token' => $token, 'email' => $request->email]);
    // }

    // // パスワードをリセット
    // public function resetPassword(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|confirmed',
    //         'token' => 'required'
    //     ]);

    //     // パスワードリセットを実行
    //     $response = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user, $password) {
    //         $user->password = Hash::make($password);
    //         $user->save();
    //     });

    //     // 成功メッセージ
    //     if ($response == Password::PASSWORD_RESET) {
    //         return redirect()->route('login')->with('status', trans($response));
    //     }

    //     // エラーメッセージ
    //     return back()->withErrors(['email' => trans($response)]);
    // }
}
