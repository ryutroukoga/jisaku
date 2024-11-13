<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Danger;
use App\Post;
use App\User;
use App\Application;

class RegistrationController extends Controller
{
    //違反報告画面からホーム画面（DB登録）
    public function dangerpost2(Request $request)
    {
        $danger = new Danger;
        $danger->user_id = $request->user_id;
        $danger->post_id = $request->post_id;
        $danger->detail = $request->input('detail', '');
        $danger->save();
        return redirect('/');
    }

    // 入力内容を確認画面に渡す
    public function requestcheck(Request $request)
    {
        $user_id = auth()->user()->id;

        return view('request', [
            'user_id' => $user_id,
            'detail' => $request->input('detail'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'DueDate' => $request->input('DueDate'),
        ]);
    }

    //確認画面からホーム画面（DB保存）
    public function request(Request $request)
    {
        $application = new Application;
        //設定をNULLにしているからログイン実装後戻す
        $application->user_id = $request->user_id;
        $application->detail = $request->detail;
        $application->phone = $request->phone;
        $application->email = $request->email;
        $application->DueDate = $request->DueDate;
        $application->save();
        return redirect('/');
    }

    //新規登録確認画面へ遷移
    public function signcheck(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => 'required|string|max:10',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 画像のパスを保存するための変数を初期化
        $imagePath = null;
        // 画像が送信されているか確認し、存在する場合は保存
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images');
        }

        return view('signup', [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
            'image' => $imagePath, // 確認画面には保存された画像のパスを渡す
        ]);
    }

    //新規登録確認画面からホーム画面（DB保存）
    public function sign(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->image = $request->image;
        $user->save();
        return redirect('/');
    }

    //マイページへ
    public function mypage()
    {
        // ログインしていない場合はログインページにリダイレクト
        if (!Auth::check()) {
            return redirect()->route('logingo');
        }
        $user = Auth::user();
        $posts = Post::where('user_id', Auth::id())->get();
        // ビューにユーザー情報と投稿データを渡す
        return view('mypage', compact('user', 'posts'));
    }

    // ユーザーの編集・登録画面へ遷移
    public function useredit(Request $request)
    {
        $user = Auth::user();
        return view('useredit', compact('user'));
    }
    // ユーザー情報編集
    public function userupdate(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('mypage')->with('user', $user);
    }
    // ユーザー退会
    public function userdelete()
    {
        $user = Auth::user();
        // del_flgを1に設定して論理削除
        $user->del_flg = 1;
        $user->save();
        // ログアウトしてホーム画面にリダイレクト
        Auth::logout();
        return redirect('/');
    }

    //マイページから依頼投稿画面へ
    public function requestform1(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->amount = $request->amount;
        $post->detail = $request->detail;
        $post->image = $request->image;
        $post->user_id = Auth::id();
        $post->status = '掲載中';
        $post->save();
        // return redirect()->route('mypage');
        return redirect('/mypage');
    }
    //投稿詳細・編集
    public function requestformedit($id)
    {
        // 特定の投稿データを取得
        $post = Post::findOrFail($id);
        // 編集画面を返す
        return view('requestformedit', compact('post'));
    }

    //編集画面からマイページへ
    public function requestupdate(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title', $post->title);
        $post->amount = $request->input('amount', $post->amount);
        $post->detail = $request->input('detail', $post->detail);
        $post->status = $request->input('status', $post->status);
        $post->save();
        return redirect()->route('mypage');
    }


    //管理画面からユーザー一覧へ
    public function alluser(Request $request)
    {
        $users = User::all();
        $users->loadCount('posts');
        return view('alluser', compact('users'));
    }

    //管理画面からユーザー一覧へ
    public function allpost(Request $request)
    {
        // 投稿と関連ユーザー情報、および違反報告数を一緒に取得
        $posts = Post::with('users')->withCount('dangers')->get();
        return view('allpost', compact('posts'));
    }

    //ポスト詳細画面
    public function kanripostdetail(int $postID)
    {
        $post = Post::findOrFail($postID); // IDが存在しない場合は404を返す
        return view('kanripostdetail', compact('post'));
    }

    // 投稿一覧からユーザー詳細画面
    public function userdetail($userId)
    {
        $users = User::with('posts')->findOrFail($userId);

        return view('userdetail', compact('users'));
    }
}
